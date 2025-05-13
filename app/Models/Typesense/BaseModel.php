<?php

namespace App\Models\Typesense;

use Typesense\Client;
use Symfony\Component\HttpClient\HttplugClient;

class BaseModel
{
    protected $ts;
    protected $tsCollection = 'default';
    
    public function __construct()
    {
        $this->ts = $this->initConnection();
    }

    protected function initConnection(): Client
    {
        $nodes = [];
        $protocol = env('TYPESENSE_PROTOCOL', 'http');
        $host = env('TYPESENSE_HOST', 'localhost');
        $ports = explode(',', env('TYPESENSE_PORT', '8108'));
        
        foreach ($ports as $port) {
            $nodes[] = [
                'protocol' => $protocol,
                'host' => $host,
                'port' => $port,
            ];
        }
        
        return new Client([
            'api_key' => env('TYPESENSE_API_KEY', 'xyz'),
            'nodes' => $nodes,
            'client' => new HttplugClient(),
        ]);
    }
    
    protected function getTsCollection(): string
    {
        return $this->tsCollection;
    }
}
