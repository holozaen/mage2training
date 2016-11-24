<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 22.11.16
 * Time: 12:24
 */

namespace Ovc\Customtags\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Relation extends AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('ovc_tag_relation','tag_relation_id');
    }
}