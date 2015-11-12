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
     * UnknownException constructor
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @param  string  $message
     * @param  integer $statusCode
     * @param  string  $statusMessage
     * @param  boolean $report
     */
    public function __construct($message = 'Unknown resource', $statusCode = 400, $statusMessage = null, $report = false)
    {
        parent::__construct($message, $statusCode, $statusMessage, $report);
    }
}