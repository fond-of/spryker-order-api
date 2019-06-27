<?php

namespace FondOfSpryker\Zed\OrderApi\Dependency\Facade;

use Generated\Shared\Transfer\OrderResponseTransfer;
use Generated\Shared\Transfer\OrderTransfer;

class OrderApiToSalesBridge implements OrderApiToSalesInterface
{
    /**
     * @var \Spryker\Zed\Sales\Business\SalesFacadeInterface
     */
    protected $salesFacade;

    /**
     * @param \Spryker\Zed\Sales\Business\SalesFacadeInterface $salesFacade
     */
    public function __construct($salesFacade)
    {
        $this->salesFacade = $salesFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return \Generated\Shared\Transfer\OrderResponseTransfer
     */
    public function addOrder(OrderTransfer $orderTransfer): OrderResponseTransfer
    {
        return $this->salesFacade->addOrder($orderTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\InvoiceTransfer $invoiceTransfer
     * 
     * @return \Generated\Shared\Transfer\InvoiceTransfer
     */
    public function findOrderById(OrderTransfer $orderTransfer): OrderTransfer
    {
        return $this->salesFacade->findOrderByIdSalesOrder($orderTransfer->getIdSalesOrder());
    }
}
