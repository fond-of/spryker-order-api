<?php

namespace FondOfSpryker\Zed\OrderApi\Dependency\Facade;

use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;

interface OrderApiToApiFacadeInterface
{
    /**
     * @param array<\Spryker\Shared\Kernel\Transfer\AbstractTransfer> $transfers
     *
     * @return \Generated\Shared\Transfer\ApiCollectionTransfer
     */
    public function createApiCollection(array $transfers): ApiCollectionTransfer;

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|null $transfer
     * @param string|null $id
     *
     * @return \Generated\Shared\Transfer\ApiItemTransfer
     */
    public function createApiItem(?AbstractTransfer $transfer = null, ?string $id = null): ApiItemTransfer;
}
