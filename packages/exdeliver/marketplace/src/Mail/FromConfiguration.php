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
        $this->email = 'info@grafi-fix.nl';
        $this->name = 'Grafi Fix';
        $this->url = 'http://grafi-fix.nl';
        $this->address = 'Nieuwe klif 3';
        $this->zipcode = '8321 DM Urk, Nederland';
        $this->config = ['address' => $this->email, 'name' => $this->name];
    }
}