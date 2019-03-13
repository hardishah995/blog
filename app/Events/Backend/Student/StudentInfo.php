<?php

namespace App\Events\Backend\Student;

use Illuminate\Queue\SerializesModels;

class studentInfo
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $student;
     
    public function __construct($student)
    {
        $this->student = $student;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
