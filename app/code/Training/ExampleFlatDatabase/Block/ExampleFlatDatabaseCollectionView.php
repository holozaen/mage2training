<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 14.04.16
 * Time: 10:57
 */

namespace Training\ExampleFlatDatabase\Block;


use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Training\ExampleFlatDatabase\Api\FlatTableItemInterface;

class ExampleFlatDatabaseCollectionView extends Template
{
    /**
     * @var Collection
     */
    private $collection;
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