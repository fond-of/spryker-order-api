<?php

namespace FondOfSpryker\Zed\OrderApi\Business\Mapper;

interface TransferMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\OrderTransfer
     */
    public function toTransfer(array $data);

    /**
     * @param array $orderEntityCollection
     *
     * @return \Generated\Shared\Transfer\OrderTransfer[]
     */
    public function toTransferCollection(array $orderEntityCollection);
}
