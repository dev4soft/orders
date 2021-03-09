<?php

namespace Orders\Controllers;

Class Login
{
    private $container;

    public function __construct($c)
    {
        $this->container = $c;
    }

    public function Check($request, $response)
    {
        $data = $request->getParsedBody();

        $users = new \Orders\Models\Users($this->container);

        if ($users->checkPass($data['login'], $data['password'])) {
            $this->container->session->auth = 1;
            $this->container->session->user_login = $data['login'];
        }

        return $response->withRedirect('/', 301);
    }

    public function Logout($request, $response)
    {
        $this->container->session->auth = '';
        $this->container->session->user_login = '';

        return $response->withRedirect('/', 301);
    }
}

