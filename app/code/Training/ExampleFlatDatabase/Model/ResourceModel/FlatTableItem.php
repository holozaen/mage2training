<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 13.04.16
 * Time: 17:31
 */

namespace Training\ExampleFlatDatabase\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class FlatTableItem extends AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('training_exampleflatdatabase_flattable','entity_id');
    }
}