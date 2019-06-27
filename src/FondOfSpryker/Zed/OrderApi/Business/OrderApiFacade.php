<?php

namespace FondOfSpryker\Zed\OrderApi\Business;

use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\OrderApi\Business\OrderApiBusinessFactory getFactory()
 */
class OrderApiFacade extends AbstractFacade implements OrderApiFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function addOrder(ApiDataTransfer $apiDataTransfer)
    {
         return $this->getFactory()
            ->createOrderApi()
            ->add($apiDataTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return array
     */
    public function validate(ApiDataTransfer $apiDataTransfer)
    {
        return $this->getFactory()
            ->createOrderApiValidator()
            ->validate($apiDataTransfer);
    }
}
