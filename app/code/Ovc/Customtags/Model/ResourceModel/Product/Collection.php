<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 22.11.16
 * Time: 12:20
 */

namespace Ovc\Customtags\Model\ResourceModel\Product;


use Magento\Catalog\Model\ResourceModel\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Collection constructor.
     */
    public function _construct()
    {
        $this->_init('Ovc\Customtags\Model\Tag','Ovc\Customtags\Model\ResourceModel\Tag');
    }
}