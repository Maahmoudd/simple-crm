<?php

namespace Crm\Note\Events;

use Crm\Note\Models\Note;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NoteCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Note $note;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Note $note)
    {
        $this->setNote($note);
    }

    /**
     * @return Note
     */
    public function getNote(): Note
    {
        return $this->note;
    }

    /**
     * @param Note $note
     */
    public function setNote(Note $note): void
    {
        $this->note = $note;
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
