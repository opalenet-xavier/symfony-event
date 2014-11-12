<?php
namespace Acme\DemoBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class ViewEvent extends Event
{
    const PAGE_VIEW = 'page.view';
}