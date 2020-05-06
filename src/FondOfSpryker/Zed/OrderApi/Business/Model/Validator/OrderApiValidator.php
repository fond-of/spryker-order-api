<?php

namespace FondOfSpryker\Zed\OrderApi\Business\Model\Validator;

use Generated\Shared\Transfer\ApiDataTransfer;

class OrderApiValidator implements OrderApiValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return array
     */
    public function validate(ApiDataTransfer $apiDataTransfer): array
    {
        return [];
    }
}
