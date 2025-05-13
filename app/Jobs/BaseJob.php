<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable,
    Illuminate\Contracts\Queue\ShouldQueue,
    Illuminate\Foundation\Bus\Dispatchable,
    Illuminate\Queue\InteractsWithQueue,
    Illuminate\Queue\SerializesModels;

class BaseJob implements ShouldQueue
{
    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;
    
    protected $queueTube = 'default';
    protected $queueData;

    /**
     * Create a new job instance.
     */
    public function __construct(array $queueData)
    {
        $this->queue = $this->queueTube;
        $this->queueData = $queueData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
