<?php

namespace Training\ExampleFlatDatabase\Model\ResourceModel\FlatTableItem;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * Collection constructor.
     */
    public function _construct()
    {
        $this->_init('Training\ExampleFlatDatabase\Model\FlatTableItem','Training\ExampleFlatDatabase\Model\ResourceModel\FlatTableItem');
    }
}