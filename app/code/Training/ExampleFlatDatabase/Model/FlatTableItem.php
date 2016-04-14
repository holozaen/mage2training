<?php

namespace Training\ExampleFlatDatabase\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Training\ExampleFlatDatabase\Api\FlatTableItemInterface;

class FlatTableItem extends AbstractModel implements FlatTableItemInterface, IdentityInterface
{

    const CACHE_TAG = 'training_exampleflatdatabase_flattableitem';

    /**
     * FlatTableItem constructor.
     */
    public function _construct()
    {
        $this->_init('Training\ExampleFlatDatabase\Model\ResourceModel\FlatTableItem');
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}