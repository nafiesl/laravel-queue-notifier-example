<?php

namespace App\Jobs;

use App\Events\LongRunJobDone;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LongRunJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $seconds = 5;
        sleep($seconds);

        $link = '<a href="'.route('home').'">here</a>';
        event(new LongRunJobDone('Long run job done after '.$seconds.' seconds. Please check '.$link.'.'));
        info('Long run job done after '.$seconds.' seconds. Please check '.$link.'.');
    }
}
