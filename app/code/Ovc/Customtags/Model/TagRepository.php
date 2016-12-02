<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 25.11.16
 * Time: 09:50
 */

namespace Ovc\Customtags\Model;


use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Ovc\Customtags\Api\Data;
use Ovc\Customtags\Api\TagRepositoryInterface;
use Ovc\Customtags\Model\TagFactory;
use Ovc\Customtags\Model\ResourceModel\Tag as Resource;

class TagRepository implements TagRepositoryInterface
{


    /**
     * @var Resource
     */
    private $resource;
    /**
     * @var \Ovc\Customtags\Model\TagFactory
     */
    private $tagFactory;

    public function __construct(
        Resource $resource,
        TagFactory $tagFactory
    )
    {
        $this->resource = $resource;
        $this->tagFactory = $tagFactory;
    }



    /**
     * @param Data\TagInterface $tag
     * @return \Ovc\Customtags\Api\Data\TagInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\TagInterface $tag)
    {
        try{
            $this->resource->save($tag);
        } catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $tag;
    }

    public function getById($tagId)
    {
        $tag = $this->tagFactory->create();
        $this->resource->load($tag, $tagId);
        if (!$tag->getId()) {
            throw new NoSuchEntityException(__('Tag with id "%1" does not exist.', $tag));
        }
        return $tag;
    }
}