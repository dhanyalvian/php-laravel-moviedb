<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MovieModel as Model,
    App\Models\External\MovieModel as ModelExt,
    App\Jobs\MovieDetailJob;

class MovieCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:crawler {type} {limit} {loop}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $total = 0;
        $type = $this->argument('type');
        $limit = $this->argument('limit');
        $loop = $this->argument('loop');
        $this->info(sprintf("Start crawling `%s` movies.", $type));

        $start = 1;
        $end = $limit * $loop;

        if ($loop > 1) {
            $start = (($loop - $start) * $limit) + 1;
        }

        $modelInt = new Model();
        $modelExt = new ModelExt();

        for ($i = $start; $i <= $end; $i++) {
            $movies = $this->getMovies($modelExt, $type, $i);

            if (!$movies) {
                break;
            }

            foreach ($movies['results'] as $movie) {
                $movieTitle = $movie['title'];
                $saved = $modelInt->saveMovie($movie);
                
                if ($saved) {
                    $msg = sprintf("Movie `%s` saved successfully.", $movieTitle);
                    $this->info($msg);
                    $this->putIntoQueue($movie);
                    $total++;
                } else {
                    $msg = sprintf("Movie `%s` saved failed.", $movieTitle);
                    $this->info($msg);
                }
            }
        }

        $this->info(sprintf("End crawling `%s` movies.", $type));
        $this->info(sprintf("Total movie saved: %d.", $total));
    }

    protected function getMovies($model, string $type, int $page): array
    {
        $result = [];

        switch ($type) {
            case 'popular':
                $result = $model->getPopular($page);
                break;

            case 'now-playing':
                $result = $model->getNowPlaying($page);
                break;

            case 'upcoming':
                $result = $model->getUpcoming($page);
                break;

            case 'top-rated':
                $result = $model->getTopRated($page);
                break;

            default:
                info('Type not allowed');
                break;
        }

        return $result;
    }

    private function putIntoQueue(array $queueData)
    {
        MovieDetailJob::dispatch($queueData);
        // MovieDetailJob::dispatch($queueData)->delay(now()->addSeconds(5));
        $msg = sprintf("Movie `%s` put into queue successfully.", $queueData['title']);
        $this->info($msg);
    }
}
