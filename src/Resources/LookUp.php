<?php
namespace Nodes\Services\Twilio\Resources;

use GuzzleHttp\Psr7\Request;
use Nodes\Services\Twilio\Exceptions\Exception;

/**
 * Class LookUp
 *
 * @package Nodes\Services\Twilio\Resources
 */
class LookUp extends AbstractResource
{
    /**
     * validate
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @param        $phoneNumber
     * @param string $type
     * @return bool
     * @throws \Nodes\Services\Twilio\Exceptions\Exception
     */
    public function validate($phoneNumber, $type = 'all')
    {
        if (!in_array($type, ['all', 'mobile', 'landline'])) {
            throw new Exception(sprintf('Type [%s] is not supported', $type));
        }

        $url = sprintf('https://lookups.twilio.com/v1/PhoneNumbers/%s?Type=carrier', $phoneNumber);

        // Generate request instance
        $request = new Request('GET', $url);

        // Send request with parameters
        $response = $this->sendResource($request, [
            'http_errors' => false,
        ]);

        // Check status code
        if ($response->getStatusCode() != 200) {
            return false;
        }

        $responseBody = json_decode($response->getBody()->getContents(), true);

        if ($type != 'all' && $responseBody['carrier']['type'] != $type) {
            return false;
        }

        return true;
    }
}