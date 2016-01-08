<?php
if (!function_exists('twilio_sms')) {
    /**
     * Send a SMS message with Twilio
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @param  string $to
     * @param  string $body
     * @param  string $from
     * @return boolean
     * @throws \Nodes\Services\Twilio\Exception\Exception
     * @throws \GuzzleHttp\Exception\ClientException
     */
    function twilio_sms($to, $body, $from = null)
    {
        // Twilio SMS Message
        $sms = app('Nodes\Services\Twilio\Resources\SmsMessage');

        // Set 'to' and 'body' of SMS message
        $sms->setToNumber($to)
            ->setMessage($body);

        // Add 'from' number if provided
        if (!empty($from)) {
            $sms->setFromNumber($from);
        }

        // Send SMS message
        return $sms->send();
    }
}