<?php

namespace FondOfSpryker\Zed\OrderApi\Persistence;

use Orm\Zed\Sales\Persistence\SpySalesOrderQuery;

interface OrderApiQueryContainerInterface
{
    /**
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrderQuery
     */
    public function queryFind(): SpySalesOrderQuery;
}
