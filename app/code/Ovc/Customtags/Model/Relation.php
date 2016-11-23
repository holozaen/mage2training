<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 22.11.16
 * Time: 12:22
 */

namespace Ovc\Customtags\Model;


use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Ovc\Customtags\Api\TagRelationInterface;

class Relation extends AbstractModel implements  TagRelationInterface  , IdentityInterface
{
    const CACHE_TAG = 'ovc_customtags_relation';



    public function _construct()
    {
        $this->_init('Ovc\Customtags\Model\ResourceModel\Relation');
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        // TODO: Implement getIdentities() method.
    }
}