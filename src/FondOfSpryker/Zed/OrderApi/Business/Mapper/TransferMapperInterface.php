<?php

namespace FondOfSpryker\Zed\OrderApi\Business\Mapper;

use Generated\Shared\Transfer\OrderTransfer;

interface TransferMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\OrderTransfer
     */
    public function toTransfer(array $data): OrderTransfer;

    /**
     * @param array $data
     *
     * @return array<\Generated\Shared\Transfer\OrderTransfer>
     */
    public function toTransferCollection(array $data): array;
}
