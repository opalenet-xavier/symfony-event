<?php

namespace Acme\DemoBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Acme\DemoBundle\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;

class DemoListener implements EventSubscriberInterface
{
    protected $logger;
    
    public function __construct(\Acme\DemoBundle\Services\Logger $logger)
    {
        $this->logger = $logger;
    }

    public function onPageView(ViewEvent $event)
    {
       $this->logger->addView(); 
    }
    
    public function onKernelTerminate(PostResponseEvent $event)
    {
        $this->logger->write();
    }
    
    public static function getSubscribedEvents()
    {
        return array(
            ViewEvent::PAGE_VIEW     => array('onPageView', 0),
            KernelEvents::TERMINATE => array('onKernelTerminate')
        );
    }
}
