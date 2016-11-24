<?php
/**
* Copyright © Pulse Storm LLC 2016
* All rights reserved
*/
namespace Peterbaettig\Commercebug\Plugins;
class Observers
{
    public function beforeDispatch($subject,array $configuration, \Magento\Framework\Event\Observer $observer)
    {
        \Peterbaettig\Commercebug\Model\All::addTo('invoked_observers', $configuration);
        
        //return the original arguments unchanged
        $args = func_get_args();
        array_shift($args);
        return $args;
    }
}