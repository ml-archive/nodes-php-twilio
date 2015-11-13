<?php
namespace Nodes\Service\Twilio;

use Nodes\AbstractServiceProvider as NodesAbstractServiceProvider;

/**
 * Class ServiceProvider
 *
 * @package Nodes\Service\Twilio
 */
class ServiceProvider extends NodesAbstractServiceProvider
{
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
        parent::register();

        // Register and bind
        $this->registerClient();
        $this->setupBindings();
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

        $this->app->bind('Nodes\Service\Twilio\Client', function ($app) {
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
        $resources = scandir(sprintf('%s/Resource', __DIR__));
        $resources = array_slice($resources, 2);

        // Remove abstract resource from list
        unset($resources[array_search('AbstractResource.php', $resources)]);

        // Bind found resources with Twilio client
        foreach ($resources as $resource) {
            // Generate resource namespace
            $resource = sprintf('Nodes\Service\Twilio\Resource\%s', substr($resource, 0, strrpos($resource, '.')));

            // Bind resource with Twilio client
            $this->app->bind(sprintf('Nodes\Service\Twilio\Resource\%s', $resource), function($app) use ($resource) {
                return new $resource($app['nodes.services.twilio']);
            });
        }
    }

}