<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 21.11.16
 * Time: 13:30
 */

namespace Ovc\Customtags\Model;


use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Ovc\Customtags\Api\TagInterface;

class Tag extends AbstractModel implements  TagInterface, IdentityInterface{

    const CACHE_TAG = 'ovc_customtags_tag';



    // statuses for tag relation add
    const ADD_STATUS_SUCCESS = 'success';
    const ADD_STATUS_NEW = 'new';
    const ADD_STATUS_EXIST = 'exist';
    const ADD_STATUS_REJECTED = 'rejected';

    /**
     * Entity code.
     * Can be used as part of method name for entity processing
     */
    const ENTITY = 'tag';

    /**
     * Event prefix for observer
     *
     * @var string
     */
    protected $_eventPrefix = 'tag';

    /**
     * This flag means should we or not add base popularity on tag load
     *
     * @var bool
     */
    protected $_addBasePopularity = false;

    public function _construct()
    {
        $this->_init('Ovc\Customtags\Model\ResourceModel\Tag');
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        // TODO: Implement getIdentities() method.
        return [self::CACHE_TAG . '_' . $this->getId()];

    }
}
{

}