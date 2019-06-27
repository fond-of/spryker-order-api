<?php

namespace FondOfSpryker\Zed\OrderApi\Business\Model;

use Generated\Shared\Transfer\ApiDataTransfer;

interface OrderApiInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function add(ApiDataTransfer $apiDataTransfer);
}
