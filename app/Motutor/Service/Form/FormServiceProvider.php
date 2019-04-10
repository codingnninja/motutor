<?php namespace Motutor\Service\Form;

use Illuminate\Support\ServiceProvider;
use Motutor\Service\Form\School\SchoolForm;
use Motutor\Service\Form\School\SchoolFormLaravelValidator;
use Motutor\Service\Form\Subscription\SubscriptionForm;
use Motutor\Service\Form\Subscription\SubscriptionFormLaravelValidator;


class FormServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app->bind('Motutor\Service\Form\School\SchoolForm', function($app)
        {
            return new SchoolForm(
                new SchoolFormLaravelValidator( $app['validator'] ),
                $app->make('Motutor\Repo\School\SchoolInterface')
            );
        });

        $app->bind('Motutor\Service\Form\Subscription\SubscriptionForm', function($app)
        {
            return new SubscriptionForm(
                new SubscriptionFormLaravelValidator( $app['validator'] ),
                $app->make('Motutor\Repo\Subscription\SubscriptionInterface')
            );
        });
    }

}