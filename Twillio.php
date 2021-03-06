<?php
/**
 * @author Bryan Tan <bryantan16@gmail.com>
 */

namespace SteveSimpson\twillio;

use yii\base\Component;
use yii\base\InvalidConfigException;

class Twillio extends Component
{
    public $sid;
    public $token;
    public $from;
    public $area;

    private $_client = null;
    private $_clientCapability = null;

    public function init()
    {
        if (!$this->sid) {
            throw new InvalidConfigException('SID is required');
        }
        if (!$this->token) {
            throw new InvalidConfigException('Token is required');
        }
    }

    public function getClient()
    {
        if ($this->_client === null) {
            $client = new \Services_Twilio($this->sid, $this->token);

            $this->_client = $client;
        }

        return $this->_client;
    }

    public function getClientCapability()
    {
        if ($this->_clientCapability === null) {
            $client = new \Services_Twilio_Capability($this->sid, $this->token);

            $this->_clientCapability = $client;
        }

        return $this->_clientCapability;
    }
} 
