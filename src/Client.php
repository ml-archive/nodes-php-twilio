<?php
namespace Nodes\Service\Twilio;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Class Client
 *
 * @package Nodes\Service\Twilio
 */
class Client
{
    /**
     * Twilio API version
     *
     * @const
     * @var string
     */
    const VERSION = '2010-04-01';

    /**
     * Twilio API Base URL
     *
     * @const
     * @var string
     */
    const BASE_URL = 'https://api.twilio.com';

    /**
     * Authenticated account
     *
     * @var \Nodes\Service\Twilio\Account
     */
    protected $account;

    /**
     * Guzzle HTTP Client instance
     *
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * Client constructor
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @param  string $sid     Account SID
     * @param  string $token   Auth token
     * @param  string $url     Base API URL
     * @param  string $version API version
     */
    public function __construct($sid, $token, $url, $version)
    {
        // Initiate Guzzle as HTTP client
        $this->httpClient = new GuzzleClient([
            'base_uri' => sprintf('%s/%s/', $url, $version),
            'auth' => [$sid, $token]
        ]);

        // Set account
        $this->setAccount($sid);
    }

    /**
     * Retrieve http client instance
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
     * Set account by SID
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @param  string $sid
     * @return object
     */
    protected function setAccount($sid)
    {
        // Request account details
        $response = $this->getHttpClient()->get(sprintf('Accounts/%s.json', $sid));

        // Decode response
        $account = json_decode($response->getBody());

        return $this->account = new Account($account);
    }

    /**
     * Retrieve account details
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return \Nodes\Service\Twilio\Account
     */
    public function getAccount()
    {
        return $this->account;
    }
}