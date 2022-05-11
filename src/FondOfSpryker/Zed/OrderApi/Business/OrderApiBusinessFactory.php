<?php

namespace FondOfSpryker\Zed\OrderApi\Business;

use FondOfSpryker\Zed\OrderApi\Business\Mapper\TransferMapper;
use FondOfSpryker\Zed\OrderApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\OrderApi\Business\Model\OrderApi;
use FondOfSpryker\Zed\OrderApi\Business\Model\OrderApiInterface;
use FondOfSpryker\Zed\OrderApi\Business\Model\Validator\OrderApiValidator;
use FondOfSpryker\Zed\OrderApi\Business\Model\Validator\OrderApiValidatorInterface;
use FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToSalesFacadeInterface;
use FondOfSpryker\Zed\OrderApi\Dependency\QueryContainer\OrderApiToApiQueryBuilderQueryContainerInterface;
use FondOfSpryker\Zed\OrderApi\Dependency\QueryContainer\OrderApiToApiQueryContainerInterface;
use FondOfSpryker\Zed\OrderApi\OrderApiDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\OrderApi\OrderApiConfig getConfig()
 * @method \FondOfSpryker\Zed\OrderApi\Persistence\OrderApiQueryContainer getQueryContainer()
 */
class OrderApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\OrderApi\Business\Model\OrderApiInterface
     */
    public function createOrderApi(): OrderApiInterface
    {
        return new OrderApi(
            $this->getSalesFacade(),
            $this->getApiQueryContainer(),
            $this->getApiQueryBuilderQueryContainer(),
            $this->getQueryContainer(),
            $this->createTransferMapper(),
        );
    }

    /**
     * @return \FondOfSpryker\Zed\OrderApi\Business\Mapper\TransferMapperInterface
     */
    public function createTransferMapper(): TransferMapperInterface
    {
        return new TransferMapper();
    }

    /**
     * @return \FondOfSpryker\Zed\OrderApi\Business\Model\Validator\OrderApiValidatorInterface
     */
    public function createOrderApiValidator(): OrderApiValidatorInterface
    {
        return new OrderApiValidator();
    }

    /**
     * @return \FondOfSpryker\Zed\OrderApi\Dependency\QueryContainer\OrderApiToApiQueryContainerInterface
     */
    protected function getApiQueryContainer(): OrderApiToApiQueryContainerInterface
    {
        return $this->getProvidedDependency(OrderApiDependencyProvider::QUERY_CONTAINER_API);
    }

    /**
     * @return \FondOfSpryker\Zed\OrderApi\Dependency\QueryContainer\OrderApiToApiQueryBuilderQueryContainerInterface
     */
    protected function getApiQueryBuilderQueryContainer(): OrderApiToApiQueryBuilderQueryContainerInterface
    {
        return $this->getProvidedDependency(OrderApiDependencyProvider::QUERY_CONTAINER_API_QUERY_BUILDER);
    }

    /**
     * @return \FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToSalesFacadeInterface
     */
    protected function getSalesFacade(): OrderApiToSalesFacadeInterface
    {
        return $this->getProvidedDependency(OrderApiDependencyProvider::FACADE_SALES);
    }
}
