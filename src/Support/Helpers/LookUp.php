<?php

use Nodes\Services\Twilio\Resources\LookUp;

if (!function_exists('twilio_look_up')) {
    /**
     * twilio_look_up
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @param        string $phoneNumber
     * @param string        $type
     * @return bool
     * @throws \Nodes\Services\Twilio\Exceptions\Exception
     */
    function twilio_look_up($phoneNumber, $type = 'all')
    {
        /** @var LookUp $phone */
        $lookUp = app(LookUp::class);

        return $lookUp->validate($phoneNumber, $type);
    }
}
