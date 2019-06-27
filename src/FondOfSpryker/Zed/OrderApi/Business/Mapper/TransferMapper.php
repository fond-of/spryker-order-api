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
        $orderTransfer = new OrderTransfer();
        $orderTransfer->fromArray($data, true);

        return $orderTransfer;
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\OrderTransfer[]
     */
    public function toTransferCollection(array $data)
    {
        $transferList = [];
        foreach ($data as $itemData) {
            $transferList[] = $this->toTransfer($itemData);
        }

        return $transferList;
    }
}
