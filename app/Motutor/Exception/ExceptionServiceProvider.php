<?php namespace Motutor\Exception;

use Illuminate\Support\ServiceProvider;

class ExceptionServiceProvider extends ServiceProvider
{

    public function register()
    {
        $app = $this->app;

        $app['motutor.exception'] = $app->singleton( NotifyHandler::class,function($app)
        {
            return new NotifyHandler( $app['motutor.notifier'] );
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $app = $this->app;

        $app->singleton(MotutorException::class,function($app)
        {
            $e = new MotutorException;
            $app['motutor.exception']->handle($e);
        });
    }
}