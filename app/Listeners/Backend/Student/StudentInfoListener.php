<?php

namespace App\Listeners\Backend\Student;

use App\Events\Backend\Student\studentInfo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class studentInfoListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  studentInfo  $event
     * @return void
     */
    public function handle(studentInfo $event)
    {
        //
    }
}
