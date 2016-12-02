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
use Ovc\Customtags\Api\Data\TagRelationInterface;

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
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get Tag ID
     *
     * @return int|null
     */
    public function getTagId()
    {
        return $this->getData(self::TAG_ID);
    }

    /**
     * Get Customer ID
     *
     * @return int|null
     */
    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    /**
     * Get Product ID
     *
     * @return int|null
     */
    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * Get Store ID
     *
     * @return int|null
     */
    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    /**
     * Get Creation Time
     *
     * @return string|null
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * Get Update Time
     *
     * @return string|null
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Get Is Active
     *
     * @return bool|null
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * Get Identifier
     *
     * @return string|null
     */
    public function getIdentifier()
    {
        return $this->getData(self::IDENTIFIER);
    }

    /**
     * Set Tag ID
     * @param int $tagId
     * @return TagRelationInterface
     */
    public function setTagId($tagId)
    {
        return $this->setData(self::TAG_ID, $tagId);
    }

    /**
     * Set Customer ID
     * @param int $customerId
     * @return TagRelationInterface
     */
    public function setCustomerId($customerId)
    {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }

    /**
     * Set Product ID
     * @param int $productId
     * @return TagRelationInterface
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * Set Store ID
     * @param int $storeId
     * @return TagRelationInterface
     */
    public function setStoreId($storeId)
    {
        return $this->setData(self::STORE_ID, $storeId);
    }

    /**
     * Set Creation Time
     * @param string $creationTime
     * @return TagRelationInterface
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * Set Update Time
     * @param string $updateTime
     * @return TagRelationInterface
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * Set is Active
     * @param bool $isActive
     * @return TagRelationInterface
     */
    public function setIsActive($isActive = true)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * Set Identifier
     * @param string $identifier
     * @return TagRelationInterface
     */
    public function setIdentifier($identifier)
    {
        return $this->setData(self::IDENTIFIER, $identifier);
    }
}