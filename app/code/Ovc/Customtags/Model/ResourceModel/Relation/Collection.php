<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 30.11.16
 * Time: 09:54
 */

namespace Ovc\Customtags\Model\ResourceModel\Relation;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Collection constructor.
     */
    public function _construct()
    {
        $this->_init('Ovc\Customtags\Model\Relation','Ovc\Customtags\Model\ResourceModel\Relation');
    }
}