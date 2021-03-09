<?php

namespace Orders\Models;

Class Users
{
    private $container;

    public function __construct($c)
    {
        $this->container = $c;
    }

    public function getList()
    {
        $query = 'select uid, login from admin_users order by login';
    
        return $this
                ->container
                ->db
                ->getList($query);
    }

    public function checkPass($login, $pass)
    {
        $query = 'select uid, login, password from admin_users where login = :login';

        $info = $this
                    ->container
                    ->db
                    ->getRow($query, ['login' => $login]);

        if (!$info) {

            return false;
        }

        return $info['password'] === sha1(md5($pass));
    }
}

