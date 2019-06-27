<?php

namespace FondOfSpryker\Zed\OrderApi\Business\Mapper;

use Orm\Zed\Sales\Persistence\SpySalesOrder;

class EntityMapper implements EntityMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrder
     */
    public function toEntity(array $data)
    {
        $salesOrderEntity = new SpySalesOrder();
        $salesOrderEntity->fromArray($data);

        return $salesOrderEntity;
    }

    /**
     * @param array $data
     *
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrder[]
     */
    public function toEntityCollection(array $data)
    {
        $entityList = [];
        foreach ($data as $itemData) {
            $entityList[] = $this->toEntity($itemData);
        }

        return $entityList;
    }
}
