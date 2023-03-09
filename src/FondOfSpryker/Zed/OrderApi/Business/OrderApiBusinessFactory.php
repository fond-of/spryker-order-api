<?php

namespace FondOfSpryker\Zed\OrderApi\Business;

use FondOfSpryker\Zed\OrderApi\Business\Model\OrderApi;
use FondOfSpryker\Zed\OrderApi\Business\Model\OrderApiInterface;
use FondOfSpryker\Zed\OrderApi\Business\Model\Validator\OrderApiValidator;
use FondOfSpryker\Zed\OrderApi\Business\Model\Validator\OrderApiValidatorInterface;
use FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToApiFacadeInterface;
use FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToSalesFacadeInterface;
use FondOfSpryker\Zed\OrderApi\OrderApiDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\OrderApi\OrderApiConfig getConfig()
 * @method \FondOfSpryker\Zed\OrderApi\Persistence\OrderApiRepository getRepository()
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
            $this->getApiFacade(),
            $this->getRepository(),
        );
    }

    /**
     * @return \FondOfSpryker\Zed\OrderApi\Business\Model\Validator\OrderApiValidatorInterface
     */
    public function createOrderApiValidator(): OrderApiValidatorInterface
    {
        return new OrderApiValidator();
    }

    /**
     * @return \FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToApiFacadeInterface
     */
    protected function getApiFacade(): OrderApiToApiFacadeInterface
    {
        return $this->getProvidedDependency(OrderApiDependencyProvider::FACADE_API);
    }

    /**
     * @return \FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToSalesFacadeInterface
     */
    protected function getSalesFacade(): OrderApiToSalesFacadeInterface
    {
        return $this->getProvidedDependency(OrderApiDependencyProvider::FACADE_SALES);
    }
}
