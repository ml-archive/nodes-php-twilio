<?php
namespace Nodes\Services\Twilio;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

/**
 * Class ServiceProvider
 *
 * @package Nodes\Services\Twilio
 */
class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Boot the service provider
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return void
     */
    public function boot()
    {
        $this->publishGroups();
    }

    /**
     * Register the service provider.
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return void
     */
    public function register()
    {
        $this->registerClient();
        $this->setupBindings();
    }

    /**
     * Register publish groups
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @return void
     */
    protected function publishGroups()
    {
        // Config files
        $this->publishes([
            __DIR__ . '/../config/twilio.php' => config_path('nodes/services/twilio.php'),
        ], 'config');
    }

    /**
     * Register client
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @return void
     */
    protected function registerClient()
    {
        $this->app->singleton('nodes.services.twilio', function ($app) {
            return new Client(
                config('nodes.services.twilio.credentials.sid'),
                config('nodes.services.twilio.credentials.token'),
                config('nodes.services.twilio.url', 'https://api.twilio.com'),
                config('nodes.services.twilio.version', '2010-04-01')
            );
        });

        $this->app->bind('Nodes\Services\Twilio\Client', function ($app) {
            return $app['nodes.services.twilio'];
        });
    }

    /**
     * Setup binding for Twilio resources
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return void
     */
    public function setupBindings()
    {
        // Scan resource directory
        $resources = scandir(sprintf('%s/Resources', __DIR__));
        $resources = array_slice($resources, 2);

        // Remove abstract resource from list
        unset($resources[array_search('AbstractResource.php', $resources)]);

        // Bind found resources with Twilio client
        foreach ($resources as $resource) {
            // Generate resource namespace
            $resource = sprintf('Nodes\Services\Twilio\Resources\%s', substr($resource, 0, strrpos($resource, '.')));

            // Bind resource with Twilio client
            $this->app->bind(sprintf('Nodes\Services\Twilio\Resources\%s', $resource), function($app) use ($resource) {
                return new $resource($app['nodes.services.twilio']);
            });
        }
    }
    /**
     * Get the services provided by the provider
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return array
     */
    public function provides()
    {
        return ['nodes.services.twilio'];
    }
}
