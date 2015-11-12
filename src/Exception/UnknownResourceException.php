<?php
namespace Nodes\Service\Twilio\Exception;

use Nodes\Exception\Exception as NodesException;

/**
 * Class UnknownResourceException
 *
 * @package Nodes\Service\Twilio\Exception
 */
class UnknownResourceException extends NodesException
{
    /**
     * UnknownResourceException constructor
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @param  string  $message        Error message
     * @param  integer $statusCode     Status code
     * @param  string  $statusMessage  Status code message
     * @param  array   $headers        List of headers
     * @param  boolean $report         Wether or not exception should be reported
     */
    public function __construct($message = 'Unknown resource', $statusCode = 400, $statusMessage = null, $headers = [], $report = false)
    {
        parent::__construct($message, $statusCode, $statusMessage, $report);
    }
}