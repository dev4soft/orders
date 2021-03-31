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
        $orders = new \Orders\Models\Orders($this->container);

        return $this
                ->container
                ->view
                ->render($response, 'index.php', ['list_orders' => $orders->getList()]);
    }

}

