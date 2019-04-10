<?php namespace Motutor\Exception;

interface HandlerInterface {

    /**
     * Handle Motutor Exceptions
     *
     * @param \Motutor\Exception\MotutorException
     * @return void
     */
    public function handle(MotutorException $exception);

}