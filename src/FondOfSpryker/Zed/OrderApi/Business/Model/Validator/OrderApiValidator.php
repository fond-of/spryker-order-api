<?php

namespace FondOfSpryker\Zed\OrderApi\Business\Model\Validator;

use Generated\Shared\Transfer\ApiRequestTransfer;

class OrderApiValidator implements OrderApiValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiRequestTransfer $apiRequestTransfer
     *
     * @return array
     */
    public function validate(ApiRequestTransfer $apiRequestTransfer): array
    {
        return [];
    }
}
