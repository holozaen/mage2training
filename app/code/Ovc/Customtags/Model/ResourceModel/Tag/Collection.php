<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 21.11.16
 * Time: 13:36
 */

namespace Ovc\Customtags\Model\ResourceModel\Tag;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

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