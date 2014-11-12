<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Acme\DemoBundle\Event\ViewEvent;

class DemoController extends Controller
{
    /**
     * @Route("/", name="_demo")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/log/without", name="_demo_log_without_event")
     * @Template()
     */
    public function withoutEventAction()
    {
        $this->get('mylogger')->addView()->write();
        
        return new Response('OK');
    }
    
    /**
     * @Route("/log/with", name="_demo_log_with_event")
     * @Template()
     */
    public function withEventAction()
    {
        $this->get('event_dispatcher')->dispatch(ViewEvent::PAGE_VIEW, new ViewEvent());
        
        return new Response('OK');
    }
}
