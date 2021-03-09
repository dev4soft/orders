<?php

namespace Orders;

class Auth 
{
    private $container;

    public function __construct($c)
    {
        $this->container = $c;
    }

    /**
     * Example middleware invokable class
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {
        if ($this->isAuthorized()) {
            $response = $next($request, $response);

            return $response;
        }

        $users = new \Orders\Models\Users($this->container);

        return $this
                ->container
                ->view
                ->render($response, 'login.php', ['list_users' => $users->getList()]);
    }

    public function isAuthorized()
    {
        
        return (int)$this->container->session->auth === 1;
    }
}
