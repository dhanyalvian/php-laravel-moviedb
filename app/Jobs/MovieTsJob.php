<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\MovieRecommendationModel,
    App\Models\Typesense\MovieModel;

class MovieTsJob extends BaseJob implements ShouldQueue
{
    protected $queueTube = 'movie_ts';

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $movie = $this->queueData;
        $id = $movie['id'];
        $title = $movie['title'];
        
        if ($this->updateMovie($movie, $id)) {
            $msg = sprintf("Movie `[%d] %s` successfully updated.", $id, $title);
        } else {
            $msg = sprintf("Movie `[%d] %s` failed updated.", $id, $title);
        }
        
        echo $msg . PHP_EOL;
    }
    
    private function updateMovie(array $movie, int $id): bool
    {
        $recommendationIds = $this->getRecommendationIds($id);
        (new MovieModel())->upsert($movie, $recommendationIds);
        
        return true;
    }
    
    private function getRecommendationIds(int $id): array
    {
        $result = [];
        $record = MovieRecommendationModel::where('movie_id', $id)->first();
        
        if ($record) {
            $result = json_decode($record->recommendation_ids, true);
        }
        
        return $result;
    }
}
