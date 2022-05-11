<?php

namespace FondOfSpryker\Zed\OrderApi\Business\Mapper;

use Generated\Shared\Transfer\OrderTransfer;

class TransferMapper implements TransferMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\OrderTransfer
     */
    public function toTransfer(array $data): OrderTransfer
    {
        return (new OrderTransfer())->fromArray($data, true);
    }

    /**
     * @param array $data
     *
     * @return array<\Generated\Shared\Transfer\OrderTransfer>
     */
    public function toTransferCollection(array $data): array
    {
        $transferList = [];

        foreach ($data as $itemData) {
            $transferList[] = $this->toTransfer($itemData);
        }

        return $transferList;
    }
}
