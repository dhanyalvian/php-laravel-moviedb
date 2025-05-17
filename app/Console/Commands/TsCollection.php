<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Typesense\MovieModel;

class TsCollection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * {type} movie|tv|people
     */
    protected $signature = 'ts:collection {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create collection in Typesense';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $type = strtolower($this->argument('type'));
        $this->info(sprintf("Start create collection `%s` in Typesense.", $type));
        $this->create($type);
        $this->info(sprintf("End create collection `%s` in Typesense.", $type));
    }

    private function create(string $type)
    {
        switch($type) {
            case 'movie':
                $result = $this->createMovie();
                break;
            
            case 'tv':
                $result = $this->createTv();
                break;
            
            case 'people':
                $result = $this->createPeople();
                break;
            
            default:
                break;
        }
        
        if ($result) {
            $this->info(sprintf("Success create collection `%s`.", $type));
        } else {
            $this->info(sprintf("Failed create collection `%s`.", $type));
        }
    }
    
    private function createMovie()
    {
        $model = new MovieModel();
        $client = $model->getClient();
        $schema = $this->getSchemaMovie($model);
        
        return $client->collections->create($schema);
    }
    
    private function createTv()
    {
        $model = new MovieModel();
        $client = $model->getClient();
        $schema = $this->getSchemaTv($model);
        
        return [];
    }
    
    private function createPeople()
    {
        $model = new MovieModel();
        $client = $model->getClient();
        $schema = $this->getSchemaPeople($model);
        
        return [];
    }

    private function getSchemaMovie(MovieModel $model): array
    {
        return [
            'name' => $model->getTsCollection(),
            'enable_nested_fields' => true,
            'fields' => [
                [
                    'name' => 'id',
                    'type' => 'string',
                    "sort" => true,
                ],
                [
                    'name' => 'slug',
                    'type' => 'string',
                    "sort" => false,
                ],
                [
                    'name' => 'title',
                    'type' => 'string',
                    "sort" => true,
                ],
                [
                    'name' => 'original_title',
                    'type' => 'string',
                    'index' => false,
                    "sort" => false,
                ],
                [
                    'name' => 'original_language',
                    'type' => 'string',
                    'index' => false,
                    "sort" => false,
                ],
                [
                    'name' => 'poster_path',
                    'type' => 'string',
                    'index' => false,
                    "sort" => false,
                ],
                [
                    'name' => 'genre_ids',
                    'type' => 'int32[]',
                    "sort" => false,
                ],
                [
                    'name' => 'release_date',
                    'type' => 'int64',
                    "sort" => true,
                ],
                [
                    'name' => 'status',
                    'type' => 'string',
                    "sort" => false,
                    'facet' => true,
                ],
                [
                    'name' => 'vote_average',
                    'type' => 'float',
                    "sort" => true,
                ],
                [
                    'name' => 'vote_count',
                    'type' => 'int32',
                    'index' => false,
                    "sort" => true,
                ],
                [
                    'name' => 'popularity',
                    'type' => 'float',
                    "sort" => true,
                ],
                [
                    'name' => 'recommendation_ids',
                    'type' => 'int32[]',
                    'index' => false,
                    "sort" => false,
                ],
            ],
            'default_sorting_field' => 'title',
        ];
    }
    
    private function getSchemaTv(MovieModel $model): array
    {
        return [];
    }
    
    private function getSchemaPeople(MovieModel $model): array
    {
        return [];
    }
}
