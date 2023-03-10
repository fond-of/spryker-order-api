<?php

namespace FondOfSpryker\Zed\OrderApi\Business\Model;

use FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToApiFacadeInterface;
use FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToSalesFacadeInterface;
use FondOfSpryker\Zed\OrderApi\Persistence\OrderApiRepositoryInterface;
use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Spryker\Zed\Api\ApiConfig;
use Spryker\Zed\Api\Business\Exception\EntityNotFoundException;

class OrderApi implements OrderApiInterface
{
    /**
     * @var string
     */
    protected const KEY_ID_SALES_ORDER = 'id_sales_order';

    /**
     * @var \FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToSalesFacadeInterface
     */
    protected OrderApiToSalesFacadeInterface $salesFacade;

    /**
     * @var \FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToApiFacadeInterface
     */
    protected OrderApiToApiFacadeInterface $apiFacade;

    /**
     * @var \FondOfSpryker\Zed\OrderApi\Persistence\OrderApiRepositoryInterface
     */
    protected OrderApiRepositoryInterface $repository;

    /**
     * @param \FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToSalesFacadeInterface $salesFacade
     * @param \FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToApiFacadeInterface $apiFacade
     * @param \FondOfSpryker\Zed\OrderApi\Persistence\OrderApiRepositoryInterface $repository
     */
    public function __construct(
        OrderApiToSalesFacadeInterface $salesFacade,
        OrderApiToApiFacadeInterface $apiFacade,
        OrderApiRepositoryInterface $repository
    ) {
        $this->salesFacade = $salesFacade;
        $this->apiFacade = $apiFacade;
        $this->repository = $repository;
    }

    /**
     * @param \Generated\Shared\Transfer\ApiRequestTransfer $apiRequestTransfer
     *
     * @return \Generated\Shared\Transfer\ApiCollectionTransfer
     */
    public function find(ApiRequestTransfer $apiRequestTransfer): ApiCollectionTransfer
    {
        $apiCollectionTransfer = $this->repository->find($apiRequestTransfer);
        $data = [];

        foreach ($apiCollectionTransfer->getData() as $index => $item) {
            if (!isset($item[static::KEY_ID_SALES_ORDER])) {
                continue;
            }

            $data[$index] = $this->getByIdSalesOrder($item[static::KEY_ID_SALES_ORDER])->toArray();
        }

        return $apiCollectionTransfer->setData($data);
    }

    /**
     * @param int $idSalesOrder
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function get(int $idSalesOrder): ApiItemTransfer
    {
        $orderTransfer = $this->getByIdSalesOrder($idSalesOrder);

        return $this->apiFacade->createApiItem($orderTransfer, $orderTransfer->getIdSalesOrder());
    }

    /**
     * @param int $id
     *
     * @throws \Spryker\Zed\Api\Business\Exception\EntityNotFoundException
     *
     * @return \Generated\Shared\Transfer\OrderTransfer
     */
    protected function getByIdSalesOrder(int $id): OrderTransfer
    {
        $orderTransfer = $this->salesFacade->findOrderByIdSalesOrder($id);

        if ($orderTransfer === null) {
            throw new EntityNotFoundException(
                'Could not find order.',
                ApiConfig::HTTP_CODE_NOT_FOUND,
            );
        }

        return $orderTransfer;
    }
}
