<?php

namespace FondOfSpryker\Zed\OrderApi\Communication\Plugin\Api;

use FondOfSpryker\Zed\OrderApi\OrderApiConfig;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;
use Spryker\Zed\Api\ApiConfig;
use Spryker\Zed\Api\Dependency\Plugin\ApiResourcePluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\OrderApi\Business\OrderApiFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\OrderApi\Business\OrderApiBusinessFactory getFactory()
 */
class OrderApiResourcePlugin extends AbstractPlugin implements ApiResourcePluginInterface
{
    /**
     * @param int $id
     *
     * @throws \RuntimeException
     *
     * @return void
     */
    public function get($id)
    {
        throw new RuntimeException('Add action not implemented on core level', ApiConfig::HTTP_CODE_NOT_FOUND);
    }

    /**
     * @param int $idStock
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function update($idStock, ApiDataTransfer $apiDataTransfer)
    {
        throw new RuntimeException('Update action not implemented on core level', ApiConfig::HTTP_CODE_NOT_FOUND);
    }

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @throws \RuntimeException
     *
     * @return void
     */
    public function add(ApiDataTransfer $apiDataTransfer)
    {
        return $this->getFacade()->addOrder($apiDataTransfer);
    }

    /**
     * @param int $idSalesOrder
     *
     * @throws \RuntimeException
     *
     * @return void
     */
    public function remove($idSalesOrder)
    {
        throw new RuntimeException('Remove action not implemented on core level', ApiConfig::HTTP_CODE_NOT_FOUND);
    }

    /**
     * @param \Generated\Shared\Transfer\ApiRequestTransfer $apiRequestTransfer
     *
     * @throws \RuntimeException
     *
     * @return void
     */
    public function find(ApiRequestTransfer $apiRequestTransfer)
    {
        throw new RuntimeException('Find action not implemented on core level', ApiConfig::HTTP_CODE_NOT_FOUND);
    }

    /**
     * @api
     *
     * @return string
     */
    public function getResourceName()
    {
        return OrderApiConfig::RESOURCE_ORDER;
    }
}
