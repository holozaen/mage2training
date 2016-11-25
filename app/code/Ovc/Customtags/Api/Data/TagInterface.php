<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 25.11.16
 * Time: 09:53
 */

namespace Ovc\Customtags\Api\Data;


interface TagInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const TAG_ID      = 'tag_id';
    const IDENTIFIER  = 'identifier';
    const NAME        = 'name';
    const STATUS      = 'status';
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME   = 'update_time';


    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get identifier
     *
     * @return string
     */
    public function getIdentifier();

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName();
    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime();
    /**
     * Set ID
     *
     * @param int $id
     * @return TagInterface
     */
    public function setId($id);

    /**
     * Set identifier
     *
     * @param string $identifier
     * @return TagInterface
     */
    public function setIdentifier($identifier);

    /**
     * Set title
     *
     * @param string $name
     * @return TagInterface
     */
    public function setName($name);

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return TagInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return TagInterface
     */
    public function setUpdateTime($updateTime);

    /**
     * @return int
     */
    public function getStatus();

    /**
     * @return bool|null
     */
    public function isDisabled();

    /**
     * @return bool|null
     */
    public function isPending();

    /**
     * @return bool|null
     */
    public function isApproved();
}