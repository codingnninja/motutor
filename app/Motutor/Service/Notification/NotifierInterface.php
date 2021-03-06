<?php namespace Motutor\Service\Notification;

interface NotifierInterface {

    /**
     * Recipients of notification
     * @param  string $to The recipient
     * @return Motutor\Service\Notification\NotifierInterface  $this  Return self for chainability
     */
    public function to($to);

    /**
     * Sender of notification
     * @param  string $from The sender
     * @return Motutor\Service\Notification\NotifierInterface  $this  Return self for chainability
     */
    public function from($from);

    /**
     * Send notification
     * @param  string $subject Subject of notification
     * @param  string $message Notification content
     * @return void
     */
    public function notify($subject, $message);

}