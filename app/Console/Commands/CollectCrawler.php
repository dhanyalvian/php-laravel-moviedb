<?php

namespace App\Console\Commands;

use App\Jobs\MovieEsJob;
use App\Jobs\MovieRecommendationJob;
use App\Jobs\MovieTsJob;
use Illuminate\Console\Command;
use App\Models\MovieModel;

class CollectCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * {type} db|ts|es
     */
    protected $signature = 'collect:movie {type}';

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
        $total = 1;
        $this->info("Start collect movies.");
        $type = strtolower($this->argument('type'));
        $movies = MovieModel::all();
        
        foreach ($movies as $movie) {
            $this->putIntoQueue($type, $movie->toArray());
            $total++;
        }
        
        $this->info("End collect movies.");
        $this->info(sprintf("Total collect: %d movies.", $total));
    }
    
    private function putIntoQueue(string $type, array $queueData)
    {
        $status = false;
        
        switch ($type) {
            case 'ts':
                MovieTsJob::dispatch($queueData);
                $status = true;
                break;
            
            case 'es':
                MovieEsJob::dispatch($queueData);
                $status = true;
                break;
            
            case 'recommendation':
                MovieRecommendationJob::dispatch($queueData);
                $status = true;
                break;
            
            default:
                break;
        }
        
        if ($status) {
            $msg = sprintf("Movie `%s` put into queue successfully.", $queueData['title']);
        } else {
            $msg = sprintf("Movie `%s` put into queue failed.", $queueData['title']);
        }
        
        $this->info($msg);
    }
}
