<?php

namespace FondOfSpryker\Zed\OrderApi\Dependency\Facade;

use Generated\Shared\Transfer\OrderTransfer;

interface OrderApiToSalesFacadeInterface
{
    /**
     * @param int $idSalesOrder
     *
     * @return \Generated\Shared\Transfer\OrderTransfer|null
     */
    public function findOrderByIdSalesOrder(int $idSalesOrder): ?OrderTransfer;
}
