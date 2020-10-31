<?php

namespace App\Jobs;

use App\Events\LongRunPrivateJobDone;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LongRunPrivateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle()
    {
        $seconds = 5;
        sleep($seconds);

        $link = '<a href="'.route('home').'">here</a>';
        event(new LongRunPrivateJobDone(
            $this->id,
            'Long run private job (for '.$this->id.') done after '.$seconds.' seconds. Please check '.$link.'.')
        );
        info('Long run private job (for '.$this->id.') done after '.$seconds.' seconds. Please check '.$link.'.');
    }
}
