<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 08.04.16
 * Time: 16:50
 */

namespace Training\FpcTest\Controller;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class FpcTestAbstractController extends Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }


    public function execute()
    {
        return $this->pageFactory->create();
    }
}