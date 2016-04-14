<?php

namespace Training\ExampleFlatDatabase\Block;


use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Training\ExampleFlatDatabase\Api\FlatTableItemInterface;

class ExampleFlatDatabaseCollectionView extends Template
{
    /**
     * @var FlatTableItemInterface
     */
    private $flatTableItemInterface;

    public function __construct(Context $context, array $data, FlatTableItemInterface $flatTableItemInterface)
    {
        parent::__construct($context, $data);
        $this->flatTableItemInterface = $flatTableItemInterface;
    }

    public function getFlatTableItemCollection()
    {
        $collection=$this->flatTableItemInterface->getCollection();
        return $collection;
    }

}