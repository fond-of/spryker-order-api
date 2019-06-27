<?php

namespace FondOfSpryker\Zed\OrderApi\Dependency\Facade;

use Generated\Shared\Transfer\OrderResponseTransfer;
use Generated\Shared\Transfer\OrderTransfer;

interface OrderApiToSalesInterface
{
    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return \Generated\Shared\Transfer\OrderResponseTransfer
     */
    public function addOrder(OrderTransfer $orderTransfer): OrderResponseTransfer;

    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return \Generated\Shared\Transfer\OrderTransfer
     */
    public function findOrderById(OrderTransfer $orderTransfer): OrderTransfer;
}
