<?php

namespace Exdeliver\Marketplace\Mail;

class FromConfiguration{

    public $email;

    public $name;

    public $address;

    public $zipcode;

    public $url;

    public $config;

    public function __construct()
    {
        $this->email = 'info@exdeliver.com';
        $this->name = 'EXdeliver';
        $this->url = 'http://exdeliver.nl';
        $this->address = 'Bentincklaan 57C';
        $this->zipcode = '3039KJ Rotterdam, Nederland';
        $this->config = ['address' => $this->email, 'name' => $this->name];
    }
}