<?php

namespace FondOfSpryker\Zed\OrderApi\Business\Mapper;

interface EntityMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrder
     */
    public function toEntity(array $data);

    /**
     * @param array $orderApiDataCollection
     *
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrder[]
     */
    public function toEntityCollection(array $orderApiDataCollection);
}
