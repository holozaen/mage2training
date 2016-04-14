<?php

namespace Training\FpcTest\Block;


use Magento\Framework\View\Element\AbstractBlock;

class Datetime extends AbstractBlock
{
    /**
     * @return mixed
     */
    protected function _toHtml()
    {
        return sprintf('<div>%s</div>',date('Y:m:d H:i:s'));
    }

}