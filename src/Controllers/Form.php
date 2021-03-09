<?php

namespace Orders\Controllers;

Class Form
{
    private $container;

    public function __construct($c)
    {
        $this->container = $c;
    }

    public function Index($request, $response)
    {
        return $this
                ->container
                ->view
                ->render($response, 'index.php');
    }

}

