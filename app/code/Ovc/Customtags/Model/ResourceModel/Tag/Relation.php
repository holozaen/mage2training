<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 22.11.16
 * Time: 12:21
 */

namespace Ovc\Customtags\Model\ResourceModel\Tag;


use Magento\Catalog\Model\ResourceModel\Collection\AbstractCollection;

class Relation extends AbstractCollection
{
    /**
     * Collection constructor.
     */
    public function _construct()
    {
        $this->_init('Ovc\Customtags\Model\Relation','Ovc\Customtags\Model\ResourceModel\Relation');
    }
}