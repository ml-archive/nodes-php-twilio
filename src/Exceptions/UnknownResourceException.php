<?php
namespace Nodes\Service\Twilio\Exception;

use Nodes\Exceptions\Exception as NodesException;

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
     * @param  string  $message  Error message
     * @param  integer $code     Error code
     * @param  array   $headers  List of headers
     * @param  boolean $report   Whether or not exception should be reported
     */
    public function __construct($message = 'Unknown resource', $code = 400, $headers = [], $report = false)
    {
        parent::__construct($message, $code, $headers, $report);
    }
}