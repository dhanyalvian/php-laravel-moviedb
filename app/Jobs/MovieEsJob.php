<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;

class MovieEsJob extends BaseJob implements ShouldQueue
{
    protected $queueTube = 'movie_es';

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
