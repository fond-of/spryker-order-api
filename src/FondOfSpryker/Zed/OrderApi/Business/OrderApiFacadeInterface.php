<?php

namespace FondOfSpryker\Zed\OrderApi\Business;

use Generated\Shared\Transfer\ApiDataTransfer;

/**
 * @method \FondOfSpryker\Zed\OrderApi\Business\OrderApiBusinessFactory getFactory()
 */
interface OrderApiFacadeInterface
{
    /**
     * Specification:
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function addOrder(ApiDataTransfer $apiDataTransfer);

    /**
     * Specification:
     * - Validates the given API data and returns an array of errors if necessary.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return array
     */
    public function validate(ApiDataTransfer $apiDataTransfer);
}
