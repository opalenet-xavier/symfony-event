<?php
namespace Acme\DemoBundle\Services;

use Psr\Log\LoggerInterface;

class Logger
{
    protected $logger;
    protected $events = [];
    
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    
    public function addView()
    {
        $this->events[] = 'a view at '.date("Y-m-d H:i:s");
        
        return $this;
    }
    
    public function write()
    {
        if(empty($this->events)){
            return;
        }
        
        sleep(5);
        foreach($this->events as $event){
            $this->logger->info($event);
        }
        
        $this->events = [];
    }
}
