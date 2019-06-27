<?php

namespace FondOfSpryker\Zed\OrderApi\Business\Model\Validator;

use Generated\Shared\Transfer\ApiDataTransfer;

interface OrderApiValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @throws \Spryker\Zed\Api\Business\Exception\ApiValidationException
     *
     * @return array
     */
    public function validate(ApiDataTransfer $apiDataTransfer);
}
