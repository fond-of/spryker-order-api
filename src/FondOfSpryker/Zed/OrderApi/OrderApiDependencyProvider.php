<?php

namespace FondOfSpryker\Zed\OrderApi;

use FondOfSpryker\Zed\InvoiceApi\Dependency\Facade\InvoiceApiToInvoiceBridge;
use FondOfSpryker\Zed\InvoiceApi\Dependency\Facade\InvoiceApiToProductBridge;
use FondOfSpryker\Zed\InvoiceApi\Dependency\QueryContainer\InvoiceApiToApiBridge;
use FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToProductBridge;
use FondOfSpryker\Zed\OrderApi\Dependency\Facade\OrderApiToSalesBridge;
use FondOfSpryker\Zed\OrderApi\Dependency\QueryContainer\OrderApiToApiBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class OrderApiDependencyProvider extends AbstractBundleDependencyProvider
{
    const QUERY_CONTAINER_API = 'QUERY_CONTAINER_API';
    const QUERY_CONTAINER = 'QUERY_CONTAINER';

    const FACADE_PRODUCT = 'FACADE_PRODUCT';
    const FACADE_ORDER = 'FACADE_ORDER';

    const ORDER_SAVER_PLUGINS = 'ORDER_SAVER_PLUGINS';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->provideApiQueryContainer($container);
        $container = $this->provideQueryContainer($container);
        $container = $this->provideOrderFacade($container);
        $container = $this->provideProductFacade($container);
        $container = $this->provideOrderSaverPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function provideApiQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER_API] = function (Container $container) {
            return new OrderApiToApiBridge($container->getLocator()->api()->queryContainer());
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function provideQueryContainer(Container $container)
    {
        $container[static::QUERY_CONTAINER] = function (Container $container) {
            return $container->getLocator()->sales()->queryContainer();
        };
        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function provideOrderFacade(Container $container)
    {
        $container[static::FACADE_ORDER] = function (Container $container) {
            return new OrderApiToSalesBridge($container->getLocator()->sales()->facade());
        };
        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function provideProductFacade(Container $container)
    {
        $container[static::FACADE_PRODUCT] = function (Container $container) {
            return new OrderApiToProductBridge($container->getLocator()->product()->facade());
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function provideOrderSaverPlugins(Container $container)
    {
        $container[self::ORDER_SAVER_PLUGINS] = function (Container $container) {
            return $this->getOrderSaversPlugins($container);
        };

    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Checkout\Dependency\Plugin\CheckoutSaveOrderInterface[]
     */
    protected function getOrderSaverPlugins(Container $container)
    {
        return [];
    }
}
