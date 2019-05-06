<?php

namespace ZFNotification\Adapter;

use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZF\OAuth2\Doctrine\EventListener\DynamicMappingSubscriber;
use Doctrine\ORM\Mapping\Driver\XmlDriver;
use Zend\Config\Config;
use ZFNotification\Job\SmsJob;
use ZFNotification\Mapper\ChannelTypeMapper;

/**
 * @author Majid Ebrahimpour <majid@ebrahimpour.me>
 */
class ZFNotificationAdapter
{
    /**
     * @var array
     */
    protected $config = [];
    
    /**
     * @var integer
     */
    protected $channel = ChannelTypeMapper::EMAIL;

    protected $queueManager = null;
    
    protected $jobManager = null;
    
    /**
     * Set the config for the entities implementing the interfaces
     *
     * @param Config $config
     * @return $this
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Set the $channel
     *
     * @param $channel
     * @return $this
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    
        return $this;
    }
    
    /**
     * return Channel
     */
    public function getChannel()
    {
        return $this->channel;
    }
    
    
    /**
     * Because the DoctrineAdapter is not created when added to the service
     * manager it must be bootstrapped specifically in the onBootstrap event
     *
     * @param MvcEvent $e
     */
    public function bootstrap(MvcEvent $e)
    {
        /** @var ServiceLocatorInterface $serviceManager */
        $serviceManager = $e->getParam('application')->getServiceManager();
                
        // Enable queue manager
        if (isset($this->getConfig()->enable_queue_manager) && $this->getConfig()->enable_queue_manager) {
            $this->queueManager = $serviceManager->get($this->getConfig()->queue_manager);
        }
        
        if (isset($this->getConfig()->enable_job_manager) && $this->getConfig()->enable_job_manager) {
            $this->jobManager = $serviceManager->get($this->getConfig()->job_manager);
        }

    }
    
    public function Send() 
    {
        $smsJob = $this->jobManager->get(SmsJob::class);
        $payload = [
            'number' => '09128246520',
            'text' => 'HIIIII'
        ];
        $smsJob->setContent($payload);
        
        $smsQueue = $this->queueManager->get($this->getConfig()->sms_handler);
        $smsQueue->push($smsJob);
    }

}
