<?php

namespace Orders\Models;

Class Orders
{
    private $container;

    public function __construct($c)
    {
        $this->container = $c;
    }

    public function getList()
    {
        $query = '
            select
                id, prefix, customer, date_to, session
            from
                store_orders
            order by
                date_to desc
            limit 100';
    
        return $this
                ->container
                ->db
                ->getList($query);
    }
}

