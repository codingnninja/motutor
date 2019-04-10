<?php namespace Motutor\Repo;

use App\Models\Tag;
use App\Models\Status;
use App\Models\School;
use App\Models\Subscription;
use Motutor\Repo\Tag\EloquentTag;
use Motutor\Service\Cache\LaravelCache;
use Motutor\Repo\Status\EloquentStatus;
use Motutor\Repo\School\SchoolCacheDecorator;
use Motutor\Repo\School\EloquentSchool;
use Motutor\Repo\Subscription\EloquentSubscription;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;
        $app->bind('Motutor\Repo\School\SchoolInterface', function($app)
        {
            $school =  new EloquentSchool(
                new School,
                $app->make('Motutor\Repo\Tag\TagInterface'),
                $app->make('Motutor\Repo\Status\StatusInterface'),
                new Tag
            );

            if( $app['config']->get('is_admin', false) == false )
            {
                $school = new SchoolCacheDecorator(
                    $school,
                    new LaravelCache($app['cache'], 'schools', 20)
                ); 
            }

            return $school;

        });

        $app->bind('Motutor\Repo\Tag\TagInterface', function($app)
        {
            return new EloquentTag(
                new Tag,
                new LaravelCache($app['cache'], 'tags', 20)
            );
        });

        $app->bind('Motutor\Repo\Status\StatusInterface', function($app)
        {
            return new EloquentStatus(
                new Status
            );
        });

        $app->bind('Motutor\Repo\Subscription\SubscriptionInterface', function($app)
        {
            return new EloquentSubscription(
                new Subscription,
                $app->make('Motutor\Repo\Status\StatusInterface')
            );
        });
    }

}