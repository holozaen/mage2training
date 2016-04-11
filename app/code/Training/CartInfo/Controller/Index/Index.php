<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 08.04.16
 * Time: 10:33
 */

namespace Training\CartInfo\Controller\Index;


use Magento\Checkout\Model\Cart; //Interface hat nicht funktioniert (immer leer)
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Quote\Api\Data\CartItemInterface;
use Training\CartInfo\Helper\QuoteInfo;

class Index extends Action
{
    /**
     * @var JsonFactory
     */
    private $jsonFactory;
     /**
     * @var PageFactory
     */
    private $pageFactory;
    /**
     * @var QuoteInfo
     */
    private $quoteInfo;
    /**
     * @var Registry
     */
    private $registry;

    public function __construct(Context $context, QuoteInfo $quoteInfo, JsonFactory $jsonFactory, PageFactory $pageFactory, Registry $registry)
    {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->pageFactory = $pageFactory;
        $this->quoteInfo = $quoteInfo;
        $this->registry = $registry;
    }


    public function execute()
    {
        if ($this->getRequest()->getParam('json') == 1){

        $json=$this->jsonFactory->create();
        $json->setData($this->quoteInfo->forCurrentQuote());
        return $json;
        } else {
            $this->registry->register('quote_info',$this->quoteInfo->forCurrentQuote());
            $page=$this->pageFactory->create();
            return $page;
        }
    }

}