<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Typesense\MovieModel;

class MovieTsJob extends BaseJob implements ShouldQueue
{
    protected $queueTube = 'movie_ts';

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $movie = $this->queueData;
        
        if ($this->updateMovie($movie)) {
            $msg = sprintf("Movie `[%d] %s` successfully updated.", $movie['id'], $movie['title']);
        } else {
            $msg = sprintf("Movie `[%d] %s` failed updated.", $movie['id'], $movie['title']);
        }
        
        echo $msg . PHP_EOL;
    }
    
    private function updateMovie(array $movie): bool
    {
        $result = (new MovieModel())->upsert($movie);
        
        return true;
    }
}
