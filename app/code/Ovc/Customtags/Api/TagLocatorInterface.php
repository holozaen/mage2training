<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 29.11.16
 * Time: 15:29
 */

namespace Ovc\Customtags\Api;


use Ovc\Customtags\Api\Data\TagInterface;

interface TagLocatorInterface
{

    /**
     * @return TagInterface
     */
    public function getTag();
}