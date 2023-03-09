<?php

namespace FondOfSpryker\Zed\OrderApi\Business\Model\Validator;

use Generated\Shared\Transfer\ApiRequestTransfer;

interface OrderApiValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiRequestTransfer $apiRequestTransfer
     *
     * @return array
     */
    public function validate(ApiRequestTransfer $apiRequestTransfer): array;
}
