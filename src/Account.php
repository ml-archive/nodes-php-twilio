<?php
namespace Nodes\Services\Twilio;

use Carbon\Carbon;

/**
 * Class Account
 *
 * @package Nodes\Services\Twilio
 */
class Account
{
    /**
     * Account SID
     *
     * @var string
     */
    protected $sid;

    /**
     * Owner account SID
     *
     * @var string
     */
    protected $ownerSid;

    /**
     * Account name
     *
     * @var string
     */
    protected $name;

    /**
     * Auth token
     *
     * @var string
     */
    protected $token;

    /**
     * Account status
     *
     * @var string
     */
    protected $status;

    /**
     * Account created
     *
     * @var string
     */
    protected $dateCreated;

    /**
     * Account updated
     *
     * @var string
     */
    protected $dateUpdated;

    /**
     * Account type
     *
     * @var string
     */
    protected $type;

    /**
     * URI of account
     *
     * @var string
     */
    protected $uri;

    /**
     * Available subresources
     *
     * @var array
     */
    protected $subresources;

    /**
     * Account constructor
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @param  object $account
     */
    public function __construct($account)
    {
        foreach ($account as $key => $value) {
            $this->__set($key, $value);
        }
    }

    /**
     * Set account SID
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @param  string $sid
     * @return \Nodes\Services\Twilio\Account
     */
    protected function setSid($sid)
    {
        $this->sid = $sid;
        return $this;
    }

    /**
     * Retrieve account SID
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return string
     */
    public function getSid()
    {
        return $this->sid;
    }

    /**
     * Set account owner SID
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @param  string $ownerSid
     * @return \Nodes\Services\Twilio\Account
     */
    protected function setOwnerAccountSid($ownerSid)
    {
        $this->ownerSid = $ownerSid;
        return $this;
    }

    /**
     * Retrieve owner account SID
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return string
     */
    public function getOwnerAccountSid()
    {
        return $this->ownerSid;
    }

    /**
     * Set account name
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @param  string $name
     * @return \Nodes\Services\Twilio\Account
     */
    protected function setFriendlyName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Retrieve account name
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return string
     */
    public function getFriendlyName()
    {
        return $this->name;
    }

    /**
     * Set auth token
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @param  string $token
     * @return \Nodes\Services\Twilio\Account
     */
    protected function setAuthToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Retrieve auth token
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return string
     */
    public function getAuthToken()
    {
        return $this->token;
    }

    /**
     * Set account status
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @param  string $status
     * @return \Nodes\Services\Twilio\Account
     */
    protected function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Retrieve account status
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set creation date
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @param  string $dateCreated
     * @return \Nodes\Services\Twilio\Account
     */
    protected function setDateCreated($dateCreated)
    {
        $this->dateCreated = Carbon::parse($dateCreated);
        return $this;
    }

    /**
     * Retrieve creation date
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return \Carbon\Carbon
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set updated date
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @param  string $dateUpdated
     * @return \Nodes\Services\Twilio\Account
     */
    protected function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = Carbon::parse($dateUpdated);
        return $this;
    }

    /**
     * Retrieve updated date
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return \Carbon\Carbon
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * Set account type
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @param  string $type
     * @return \Nodes\Services\Twilio\Account
     */
    protected function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Retrieve account type
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set account URI
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @param  string $uri
     * @return \Nodes\Services\Twilio\Account
     */
    protected function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * Retrieve account URI
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set account subresources
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @param  array $subresources
     * @return \Nodes\Services\Twilio\Account
     */
    protected function setSubresourceUris($subresources)
    {
        $this->subresources = $subresources;
        return $this;
    }

    /**
     * Retrieve account subresources
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access public
     * @return array
     */
    public function getSubresourceUris()
    {
        return $this->subresources;
    }

    /**
     * __set
     *
     * @author Morten Rugaard <moru@nodes.dk>
     *
     * @access protected
     * @param  string $name
     * @param  string $value
     * @return void
     */
    public function __set($name, $value)
    {
        // Generate method name
        $methodName = sprintf('set%s', ucfirst(camel_case($name)));

        // Set account parameter
        if (!method_exists($this, $methodName)) {
            return;
        }

        // Set parameter with value
        $this->{$methodName}($value);
    }
}