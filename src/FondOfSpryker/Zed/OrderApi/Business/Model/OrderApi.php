<?php

namespace FondOfSpryker\Zed\OrderApi\Business\Model;

use FondOfSpryker\Zed\InvoiceApi\Dependency\Facade\OrderApiToInvoiceInterface;
use FondOfSpryker\Zed\OrderApi\Business\Mapper\EntityMapperInterface;
use FondOfSpryker\Zed\OrderApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToProductInterface;
use FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToSalesInterface;
use FondOfSpryker\Zed\OrderApi\Dependency\QueryContainer\OrderApiToApiInterface;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\OrderItemsTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Spryker\Zed\Api\Business\Exception\EntityNotFoundException;
use Spryker\Zed\Availability\Persistence\AvailabilityQueryContainerInterface;

class OrderApi implements OrderApiInterface
{
    /**
     * @var \FondOfSpryker\Zed\OrderApi\Dependency\QueryContainer\OrderApiToApiInterface
     */
    protected $apiQueryContainer;

    /**
     * @var \FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToSalesInterface
     */
    protected $salesFacade;

    /**
     * @var \FondOfSpryker\Zed\OrderApi\Business\Mapper\TransferMapperInterface
     */
    protected $transferMapper;

    /**
     * @var \FondOfSpryker\Zed\OrderApi\Business\Mapper\EntityMapperInterface
     */
    protected $entityMapper;

    /**
     * @var \FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToProductInterface
     */
    protected $productFacade;

    /**
     * OrderApi constructor.
     *
     * @param \FondOfSpryker\Zed\OrderApi\Dependency\QueryContainer\OrderApiToApiInterface $apiQueryContainer
     * @param \FondOfSpryker\Zed\OrderApi\Business\Mapper\EntityMapperInterface $entityMapper
     * @param \FondOfSpryker\Zed\OrderApi\Business\Mapper\TransferMapperInterface $transferMapper
     * @param \FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToSalesInterface $salesFacade
     * @param \FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToProductInterface $productFacade
     */
    public function __construct(
        OrderApiToApiInterface $apiQueryContainer,
        EntityMapperInterface $entityMapper,
        TransferMapperInterface $transferMapper,
        OrderApiToSalesInterface $salesFacade,
        OrderApiToProductInterface $productFacade
    ) {
        $this->apiQueryContainer = $apiQueryContainer;
        $this->salesFacade = $salesFacade;
        $this->entityMapper = $entityMapper;
        $this->transferMapper = $transferMapper;
        $this->productFacade = $productFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function add(ApiDataTransfer $apiDataTransfer): ApiItemTransfer
    {
        $data = (array)$apiDataTransfer->getData();

        $orderTransfer = new OrderTransfer();
        $orderTransfer->fromArray($data, true);

        $orderResponseTransfer = $this->salesFacade->addOrder($orderTransfer);

        $orderTransfer = $this->getOrderFromResponse($invoiceResponseTransfer);

        return $this->apiQueryContainer->createApiItem($invoiceTransfer, $invoiceTransfer->getIdInvoice());
    }

    /**
     * @param \Generated\Shared\Transfer\InvoiceResponseTransfer $invoiceResponseTransfer
     *
     * @return \Generated\Shared\Transfer\InvoiceTransfer
     */
    protected function getInvoiceFromResponse(InvoiceResponseTransfer $invoiceResponseTransfer): InvoiceTransfer
    {
        $invoiceTransfer = $invoiceResponseTransfer->getInvoiceTransfer();

        if (!$invoiceTransfer) {
            $errors = [];
            foreach ($invoiceResponseTransfer->getErrors() as $error) {
                $errors[] = $error->getMessage();
            }

            throw new EntityNotSavedException('Could not save creditmemo: ' . implode(',', $errors));
        }

        return $this->invoiceFacade->findInvoiceById($invoiceTransfer);
    }
}
