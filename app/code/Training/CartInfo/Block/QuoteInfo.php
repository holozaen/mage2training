<?php

namespace Training\CartInfo\Block;


use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Training\CartInfo\Helper\QuoteInfo as QuoteInfoHelper;

class QuoteInfo extends Template
{
    /**
     * @var QuoteInfoHelper
     */
    private $quoteInfo;
    /**
     * @var Registry
     */
    private $registry;

    public function __construct(Context $context, array $data, QuoteInfoHelper $quoteInfo, Registry $registry )
    {
        parent::__construct($context, $data);
        $this->quoteInfo = $quoteInfo;
        $this->registry = $registry;
    }

    public function getQuoteInfo()
    {
        return $this->registry->registry('quote_info');
    }

}