<?php

namespace FondOfSpryker\Zed\OrderApi\Persistence;

use Orm\Zed\Sales\Persistence\SpySalesOrderQuery;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * @method \FondOfSpryker\Zed\OrderApi\Persistence\OrderApiPersistenceFactory getFactory()
 */
class OrderApiQueryContainer extends AbstractQueryContainer implements OrderApiQueryContainerInterface
{
    /**
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrderQuery
     */
    public function queryFind(): SpySalesOrderQuery
    {
        return $this->getFactory()->getSalesOrderQuery();
    }
}
