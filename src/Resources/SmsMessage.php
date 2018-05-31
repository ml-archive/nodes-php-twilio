<?php
namespace Nodes\Services\Twilio\Resources;

use GuzzleHttp\Psr7\Request;

/**
 * Class SmsMessage
 *
 * @package Nodes\Services\Twilio\Resources
 */
class SmsMessage extends AbstractResource
{
    /**
     * Twilio resource name
     *
     * @const
     * @var string
     */
    const RESOURCE_NAME = 'messages';

    /**
     * Number of recipient
     *
     * @var string
     */
    protected $to;

    /**
     * Number of sender
     *
     * @var string
     */
    protected $from;

    /**
     * Message content
     *
     * @var string
     */
    protected $body;

    /**
     * Set number of recipient
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @param  string $to
     * @return \Nodes\Services\Twilio\Resources\SmsMessage
     */
    public function setToNumber($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * Retrieve number of recipient
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return string
     */
    public function getToNumber()
    {
        return $this->to;
    }

    /**
     * Set number of sender
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @param  string $from
     * @return \Nodes\Services\Twilio\Resources\SmsMessage
     */
    public function setFromNumber($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * Retrieve number of sender
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return string
     */
    public function getFromNumber()
    {
        if (empty($this->from)) {
            return config('nodes.services.twilio.defaults.sms.from');
        }

        return $this->from;
    }

    /**
     * Set message content
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @param  string $body
     * @return \Nodes\Services\Twilio\Resources\SmsMessage
     */
    public function setMessage($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Retrieve message content
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return string
     */
    public function getMessage()
    {
        return $this->body;
    }

    /**
     * Send the message
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return boolean
     * @throws \Nodes\Services\Twilio\Exceptions\Exception
     * @throws \GuzzleHttp\Exception\ClientException
     */
    public function send()
    {
        // Retrieve resource URL
        $resourceUrl = $this->getResourceUrl(self::RESOURCE_NAME);

        // Generate request instance
        $request = new Request('POST', $resourceUrl);

        // Send request with parameters
        $response = $this->sendResource($request, [
            'form_params' => [
                'To' => $this->getToNumber(),
                'From' => $this->getFromNumber(),
                'Body' => $this->getMessage(),
            ]
        ]);

        return $response->getStatusCode() == 201;
    }
}
