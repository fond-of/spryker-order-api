<?php

namespace FondOfSpryker\Zed\OrderApi\Business;

use FondOfSpryker\Zed\InvoiceApi\Business\Model\Validator\InvoiceApiValidator;
use FondOfSpryker\Zed\OrderApi\Business\Mapper\EntityMapper;
use FondOfSpryker\Zed\OrderApi\Business\Mapper\EntityMapperInterface;
use FondOfSpryker\Zed\OrderApi\Business\Mapper\TransferMapper;
use FondOfSpryker\Zed\OrderApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\OrderApi\Business\Model\OrderApi;
use FondOfSpryker\Zed\OrderApi\Business\Model\OrderApiInterface;
use FondOfSpryker\Zed\OrderApi\Business\Model\Validator\OrderApiValidator;
use FondOfSpryker\Zed\OrderApi\Business\Model\Validator\OrderApiValidatorInterface;
use FondOfSpryker\Zed\OrderApi\OrderApiDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\OrderApi\OrderApiConfig getConfig()
 */
class OrderApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\OrderApi\Business\Model\OrderApiInterface
     */
    public function createOrderApi(): OrderApiInterface
    {
        return new OrderApi(
            $this->getApiQueryContainer(),
            $this->createEntityMapper(),
            $this->createTransferMapper(),
            $this->getOrderFacade(),
            $this->getProductFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\OrderApi\Business\Mapper\EntityMapperInterface
     */
    public function createEntityMapper(): EntityMapperInterface
    {
        return new EntityMapper();
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

    protected function getApiQueryContainer()
    {
        return $this->getProvidedDependency(OrderApiDependencyProvider::QUERY_CONTAINER_API);
    }

    /**
     * @return \FondOfSpryker\Zed\InvoiceApi\Dependency\Facade\InvoiceApiToInvoiceInterface
     */
    protected function getOrderFacade()
    {
        return $this->getProvidedDependency(OrderApiDependencyProvider::FACADE_ORDER);
    }

    /**
     * @return \FondOfSpryker\Zed\InvoiceApi\Dependency\Facade\InvoiceApiToProductInterface
     */
    protected function getProductFacade()
    {
        return $this->getProvidedDependency(OrderApiDependencyProvider::FACADE_PRODUCT);
    }

    /**
     * @return \FondOfSpryker\Zed\ProductList\Dependency\Plugin\ProductListPostSaverPluginInterface[]
     */
    public function getOrderSaverPlugins(): array
    {
        return $this->getProvidedDependency(OrderApiDependencyProvider::ORDER_SAVER_PLUGINS);
    }
}
