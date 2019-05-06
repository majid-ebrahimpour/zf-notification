<?php

/**
 * @author Majid Ebrahimpour <majid@ebrahimpour.me>
 */
namespace ZFNotification\Adapter\Factory;

use Interop\Container\ContainerInterface;
use InvalidArgumentException;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Config\Config;

class ZFNotificationAdapterFactory implements FactoryInterface
{
    
    /**
     * @var Config
     */
    private $config;

    /**
     * @param Config $config
     * @return $this
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * @param ServiceLocatorInterface $services
     * @return ZFNotification\Adapter\ZFNotificationAdapter
     */
    public function createService(ServiceLocatorInterface $services)
    {
        return $this->create($services);
    }

	/**
	 * Create service
	 *
	 * @param ServiceLocatorInterface $serviceLocator
	 * @return mixed
	 */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->create($container);
    }

    /**
     * @param ContainerInterface | ServiceLocatorInterface $container
     * @return ZFNotificationAdapter
     * @throws InvalidArgumentException
     */
    protected function create($container)
    {
        if (! $container instanceof ContainerInterface && ! $container instanceof ServiceLocatorInterface) {
            throw new InvalidArgumentException('Invalid container');
        }

        $adapter = $container->get('ZFNotification\Adapter\ZFNotificationAdapter');
        $adapter->setConfig($this->config);
        return $adapter;
    }
}
