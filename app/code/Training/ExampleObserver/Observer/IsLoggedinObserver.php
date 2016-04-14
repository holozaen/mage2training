<?php

namespace Training\ExampleObserver\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Message\ManagerInterface as MessageManager;

class IsLoggedinObserver implements ObserverInterface
{
    /**
     * @var MessageManager
     */
    private $messageManager;


    /**
     * IsLoggedinObserver constructor.
     * @param MessageManager $messageManager
     */
    public function __construct(MessageManager $messageManager)
    {
        $this->messageManager = $messageManager;
    }

    public function execute(Observer $observer)
    {
        //Add PhpDoc-definitions for variables for getting auto-completion
        /** @var \Magento\Customer\Model\Customer $customer */
        $customer = $observer->getData('customer');
        $customerName = $customer->getName();
        $message=__("Welcome back %1",$customerName);
        $this->messageManager->addSuccess($message);
    }
}