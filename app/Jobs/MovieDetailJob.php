<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable,
    Illuminate\Contracts\Queue\ShouldQueue,
    Illuminate\Foundation\Bus\Dispatchable,
    Illuminate\Queue\InteractsWithQueue,
    Illuminate\Queue\SerializesModels;

use App\Models\MovieModel as Model,
    App\Models\External\MovieModel as ModelExt;

class MovieDetailJob implements ShouldQueue
{
    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    const QUEUE_TUBE = 'movie_detail';

    protected $queueData;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->queue = self::QUEUE_TUBE;
        $this->queueData = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = $this->queueData;
        $movie = $this->getDetail($data['id']);
        
        if ($this->updateMovie($movie)) {
            $msg = sprintf("Movie `[%d] %s` successfully updated.", $movie['id'], $movie['title']);
        } else {
            $msg = sprintf("Movie `[%d] %s` failed updated.", $movie['id'], $movie['title']);
        }
        
        echo $msg . PHP_EOL;
    }

    private function getDetail(string $slug): array
    {
        return (new ModelExt())->getDetail($slug);
    }
    
    private function updateMovie(array $movie): bool
    {
        return (new Model())->updateMovieDetail($movie);
    }
}
