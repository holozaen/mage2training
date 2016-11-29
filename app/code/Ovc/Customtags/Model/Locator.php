<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 29.11.16
 * Time: 15:33
 */

namespace Ovc\Customtags\Model;


use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\Registry;
use Ovc\Customtags\Api\Data\TagInterface;
use Ovc\Customtags\Api\TagLocatorInterface;

class Locator implements TagLocatorInterface
{
    /**
     * @var TagInterface
     */
    private $tag;
    private $registry;

    /**
     * @param Registry $registry
     */
    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @return TagInterface
     * @throws NotFoundException
     */
    public function getTag()
    {
        if (null !== $this->tag) {
            return $this->tag;
        }

        if ($tag = $this->registry->registry('current_tag')) {
            return $this->tag = $tag;
        }

        throw new NotFoundException(__('Tag was not registered'));
    }
}