<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable,
    Illuminate\Contracts\Queue\ShouldQueue,
    Illuminate\Foundation\Bus\Dispatchable,
    Illuminate\Queue\InteractsWithQueue,
    Illuminate\Queue\SerializesModels;

use App\Models\MovieRecommendationModel as Model,
    App\Models\External\MovieModel as ModelExt;

class MovieRecommendationJob implements ShouldQueue
{
    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    const QUEUE_TUBE = 'movie_recommendations';

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
        $id = $data['id'];
        $title = $data['title'];
        $movieRecommendations = $this->getRecommendations($data['slug']);
        
        if ($this->upsertRecommendations($id, $movieRecommendations)) {
            $msg = sprintf("Movie `[%d] %s` successfully updated.", $id, $title);
        } else {
            $msg = sprintf("Movie `[%d] %s` failed updated.", $id, $title);
        }
        
        echo $msg . PHP_EOL;
    }
    
    private function getRecommendations(string $slug): array
    {
        return (new ModelExt())->getRecommendation($slug);
    }
    
    private function upsertRecommendations(int $movieId, array $movieRecommendations): bool
    {
        $movieIds = [];
        
        foreach ($movieRecommendations['results'] as $movie) {
            $movieIds[] = $movie['id'];
        }
        
        return (new Model())->upsertMovieRecommendations($movieId, $movieIds);
    }
}
