<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 21.11.16
 * Time: 13:30
 */

namespace Ovc\Customtags\Api\Data;


interface TagRelationInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const TAG_RELATION_ID      = 'tag_relation_id';
    const TAG_ID      = 'tag_id';
    const CUSTOMER_ID = 'customer_id';
    const PRODUCT_ID = 'product_id';
    const STORE_ID = 'store_id';
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME   = 'update_time';
    const IS_ACTIVE = 'is_active';
    const IDENTIFIER  = 'identifier';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get Tag ID
     *
     * @return int|null
     */
    public function getTagId();

    /**
     * Get Customer ID
     *
     * @return int|null
     */
    public function getCustomerId();

    /**
     * Get Product ID
     *
     * @return int|null
     */
    public function getProductId();

    /**
     * Get Store ID
     *
     * @return int|null
     */
    public function getStoreId();

    /**
     * Get Creation Time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Get Update Time
     *
     * @return string|null
     */
    public function getUpdateTime();

    /**
     * Get Is Active
     *
     * @return bool|null
     */
    public function getIsActive();

    /**
     * Get Identifier
     *
     * @return string|null
     */
    public function getIdentifier();

    /**
     * Set ID
     * @param int $id
     * @return TagRelationInterface
     */
    public function setId($id);

    /**
     * Set Tag ID
     * @param int $tagId
     * @return TagRelationInterface
     */
    public function setTagId($tagId);

    /**
     * Set Customer ID
     * @param int $customerId
     * @return TagRelationInterface
     */
    public function setCustomerId($customerId);

    /**
     * Set Product ID
     * @param int $productId
     * @return TagRelationInterface
     */
    public function setProductId($productId);

    /**
     * Set Store ID
     * @param int $storeId
     * @return TagRelationInterface
     */
    public function setStoreId($storeId);

    /**
     * Set Creation Time
     * @param string $creationTime
     * @return TagRelationInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set Update Time
     * @param string $updateTime
     * @return TagRelationInterface
     */
    public function setUpdateTime($updateTime);

    /**
     * Set is Active
     * @param bool $isActive
     * @return TagRelationInterface
     */
    public function setIsActive($isActive);

    /**
     * Set Identifier
     * @param string $identifier
     * @return TagRelationInterface
     */
    public function setIdentifier($identifier);

}