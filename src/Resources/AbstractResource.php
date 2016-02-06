<?php
namespace Nodes\Services\Twilio\Resources;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use Nodes\Services\Twilio\Client;
use Nodes\Services\Twilio\Exceptions\Exception as TwilioException;
use Nodes\Services\Twilio\Exceptions\UnknownResourceException;

/**
 * Class AbstractResource
 *
 * @abstract
 * @package Nodes\Services\Twilio\Resources
 */
abstract class AbstractResource
{
    /**
     * Authenticated account
     *
     * @var \Nodes\Services\Twilio\Account
     */
    protected $account;

    /**
     * Guzzle HTTP client instnace
     *
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * AbstractProvider constructor
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @param \Nodes\Services\Twilio\Client $client
     */
    public function __construct(Client $client)
    {
        // Set account
        $this->account = $client->getAccount();

        // Set http client
        $this->httpClient = $client->getHttpClient();
    }

    /**
     * Retrieve authenticated account
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return \Nodes\Services\Twilio\Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Retrieve HTTP client instance
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return \GuzzleHttp\Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * Retrieve resource URL
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @param  string $resource
     * @return string
     * @throws \Nodes\Services\Twilio\Exception\UnknownResourceException
     */
    public function getResourceUrl($resource)
    {
        // Account resources
        $resources = $this->getAccount()->getSubresourceUris();

        // Validate resource
        if (empty($resources->{$resource})) {
            throw (new UnknownResourceException(sprintf('Unknown resource: %s', $resource)))->setStatusCode(400);
        }

        return $resources->{$resource};
    }

    /**
     * Send resource request
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @param  \GuzzleHttp\Psr7\Request $request
     * @param  array                    $parameters
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Nodes\Services\Twilio\Exception\Exception
     * @throws \GuzzleHttp\Exception\ClientException
     */
    public function sendResource(Request $request, array $parameters = [])
    {
        try {
            // Fire request!
            $response = $this->getHttpClient()->send($request, $parameters);
        } catch (ClientException $e) {
            // Retrieve response body and try to JSON decode it.
            // Are we're successful, we'll assume it's a Twilio error.
            //
            // If not, then we'll throw the original exception.
            $twilioError = json_decode($e->getResponse()->getBody());
            if (json_last_error() == JSON_ERROR_NONE) {
                throw new TwilioException($twilioError);
            }

            // Throw original exception
            throw new $e;
        }

        return $response;
    }
}