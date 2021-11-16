<?php

namespace App\Listeners;

use App\Events\NewWebsitePost;
use App\Mail\SendSubscriptionMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPostToSubscribers
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
     * @param  NewWebsitePost  $event
     * @return void
     */
    public function handle(NewWebsitePost $event)
    {
        $subscribers = $event->subscribers;
        $subject = $event->subject;
        $body = $event->body;

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->queue(new SendSubscriptionMail($subject, $body));
        }
    }

    public function shouldQueue(NewWebsitePost $event)
    {
        return $event->queue;
    }
}
