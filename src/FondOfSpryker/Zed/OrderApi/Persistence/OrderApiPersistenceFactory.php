<?php

namespace FondOfSpryker\Zed\OrderApi\Persistence;

use FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToApiFacadeInterface;
use FondOfSpryker\Zed\OrderApi\Dependency\QueryContainer\OrderApiToApiQueryBuilderQueryContainerInterface;
use FondOfSpryker\Zed\OrderApi\OrderApiDependencyProvider;
use Orm\Zed\Sales\Persistence\SpySalesOrderQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfSpryker\Zed\OrderApi\OrderApiConfig getConfig()
 * @method \FondOfSpryker\Zed\OrderApi\Persistence\OrderApiQueryContainer getQueryContainer()
 */
class OrderApiPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrderQuery
     */
    public function getSalesOrderQuery(): SpySalesOrderQuery
    {
        return $this->getProvidedDependency(OrderApiDependencyProvider::PROPEL_QUERY_SALES_ORDER);
    }

    /**
     * @return \FondOfSpryker\Zed\OrderApi\Dependency\QueryContainer\OrderApiToApiQueryBuilderQueryContainerInterface
     */
    public function getApiQueryBuilderQueryContainer(): OrderApiToApiQueryBuilderQueryContainerInterface
    {
        return $this->getProvidedDependency(OrderApiDependencyProvider::QUERY_CONTAINER_API_QUERY_BUILDER);
    }

    /**
     * @return \FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToApiFacadeInterface
     */
    public function getApiFacade(): OrderApiToApiFacadeInterface
    {
        return $this->getProvidedDependency(OrderApiDependencyProvider::FACADE_API);
    }
}
