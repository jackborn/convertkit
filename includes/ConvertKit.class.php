<?php

if ( (!defined("CONVERTKIT_PUBLIC_KEY")) || (!defined("CONVERTKIT_SECRET_KEY")) ) {
    include(dirname(__FILE__) . "/config.php");
}


require_once("Connector.class.php");


class ConvertKit extends CK_Connector {


    public $url_base;
    public $url;
    public $api_key;
    public $api_secret_key;
    public $track_email;
    public $track_actid;
    public $track_key;
    public $version = 1;
    public $debug = false;
    public $curl_response_error = "";

    function __construct($api_key, $api_secret_key) {

        $this->setApiKey($api_key);
        $this->setApiSecretKey($api_secret_key);

        parent::__construct($api_key, $api_secret_key);
    }


    public function setApiKey($api_key = null)
    {
        if($api_key) $this->api_key = $api_key;
    }

    public function setApiSecretKey($api_secret_key = null)
    {
        if($api_secret_key) $this->api_secret_key = $api_secret_key;
    }


    public function subscriber($id=null) {

        $class = new CK_Subscriber($this->base_url, $this->api_key, $this->api_secret_key);
        if(! $id) return $class;

        $class->setSubscriberId($id);
        return $class;
    }

    public function sequence($id=null) {

        $class = new CK_Sequence($this->base_url, $this->api_key, $this->api_secret_key);
        if(! $id) return $class;

        $class->setSequenceId($id);
        return $class;
    }


    public function webhook() {
        $class = new CK_Webhook($this->base_url, $this->api_key, $this->api_secret_key);
        return $class;
    }


    public function form($id=null) {
        $class = new CK_Form($this->base_url, $this->api_key, $this->api_secret_key);
        if(! $id) return $class;

        $class->setFormId($id);
        return $class;
    }


    public function tag($id=null) {
        $class = new CK_Tag($this->base_url, $this->api_key, $this->api_secret_key);
        if(! $id) return $class;

        $class->setTagId($id);
        return $class;
    }

    public function customfield($id=null) {
        $class = new CK_CustomField($this->base_url, $this->api_key, $this->api_secret_key);
        if(! $id) return $class;

        $class->setCustomFieldId($id);
        return $class;
    }

}

require_once ('Tag.class.php');
require_once ('Webhook.class.php');
require_once ('Sequence.class.php');
require_once ('Subscriber.class.php');
require_once ('Form.class.php');
require_once ('CustomField.class.php');



