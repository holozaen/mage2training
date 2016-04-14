<?php

namespace Training\ExampleFlatDatabase\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Training\ExampleFlatDatabase\Api\FlatTableItemInterface;

class Index extends Action
{
    /**
     * @var FlatTableItemInterface
     */
    private $flatTableItemInterface;
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param FlatTableItemInterface $flatTableItemInterface
     */
    public function __construct(Context $context, FlatTableItemInterface $flatTableItemInterface, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->flatTableItemInterface = $flatTableItemInterface;
        $this->pageFactory = $pageFactory;
    }

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $page=$this->pageFactory->create();
        return $page;
        // TODO: Implement execute() method.
    }
}