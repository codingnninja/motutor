<?php namespace Motutor\Exception;

use Motutor\Service\Notification\NotifierInterface;

class NotifyHandler implements HandlerInterface {

    protected $notifier;

    public function __construct(NotifierInterface $notifier)
    {
        $this->notifier = $notifier;
    }

    /**
     * Handle Motutor Exceptions
     *
     * @param \Motutor\Exception\MotutorException
     * @return void
     */
    public function handle(MotutorException $exception)
    {
        $this->sendException($exception);
    }

    /**
     * Send Exception to notifier
     * @param  \Exception $exception Send notification of exception
     * @return void
     */
    protected function sendException(\Exception $e)
    {
        $this->notifier->notify('Error: '.get_class($e), $e->getMessage());
    }

}
