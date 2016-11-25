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
use Ovc\Customtags\Api\Data\TagInterface;
use Ovc\Customtags\Model\System\Config\Status;

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

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function getStatus()
    {
        return $this->getData(self::STATUS);

    }
    /**
     * @return bool|null
     */
    public function isDisabled()
    {
        $currentStatus=$this->getStatus();
        if ($currentStatus == Status::STATUS_DISABLED) return true;
        return false;
    }

    /**
     * @return bool|null
     */
    public function isPending()
    {
        $currentStatus=$this->getStatus();
        if ($currentStatus == Status::STATUS_PENDING) return true;
        return false;
    }

    /**
     * @return bool|null
     */
    public function isApproved()
    {
        $currentStatus=$this->getStatus();
        if ($currentStatus == Status::STATUS_APPROVED) return true;
        return false;
    }

    /**
     * Get identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return (string)$this->getData(self::IDENTIFIER);
    }

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return TagInterface
     */
    public function setId($id)
    {
        return $this->setData(self::TAG_ID, $id);
    }

    /**
     * Set identifier
     *
     * @param string $identifier
     * @return TagInterface
     */
    public function setIdentifier($identifier)
    {
        return $this->setData(self::IDENTIFIER, $identifier);
    }

    /**
     * Set title
     *
     * @param string $name
     * @return TagInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return TagInterface
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return TagInterface
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }
}
