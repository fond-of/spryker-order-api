<?php

namespace FondOfSpryker\Zed\OrderApi\Communication\Plugin\Api;

use FondOfSpryker\Zed\OrderApi\OrderApiConfig;
use Generated\Shared\Transfer\ApiDataTransfer;
use Spryker\Zed\Api\Dependency\Plugin\ApiValidatorPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\OrderApi\Business\OrderApiFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\OrderApi\Business\OrderApiBusinessFactory getFactory()
 */
class OrderApiValidatorPlugin extends AbstractPlugin implements ApiValidatorPluginInterface
{
    /**
     * @api
     *
     * @return string
     */
    public function getResourceName()
    {
        return OrderApiConfig::RESOURCE_ORDER;
    }

    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiValidationErrorTransfer[]
     */
    public function validate(ApiDataTransfer $apiDataTransfer)
    {
        return $this->getFacade()->validate($apiDataTransfer);
    }
}
