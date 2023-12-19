<?php

namespace Crm\Customer\Listeners;


use Crm\Project\Events\ProjectCreation;


class SendWelcomeEmail
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
     * @return void
     */
    public function handle(ProjectCreation $event)
    {
        //
    }
}
