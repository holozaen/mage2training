<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 30.11.16
 * Time: 12:29
 */

namespace Ovc\Customtags\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Ovc\Customtags\Model\RelationFactory;
use Ovc\Customtags\Api\Data;
use Ovc\Customtags\Api\TagRelationRepositoryInterface;
use Ovc\Customtags\Model\ResourceModel\Relation as Resource;


class TagRelationRepository implements TagRelationRepositoryInterface
{

    /**
     * @var \Ovc\Customtags\Model\RelationFactory
     */
    private $tagRelationFactory;

    /**
     * @var Resource
     */
    private $resource;

    public function __construct(
        Resource $resource,
        RelationFactory $tagRelationFactory
    )
    {
        $this->resource = $resource;
        $this->tagRelationFactory = $tagRelationFactory;
    }

    /**
     * @param Data\TagRelationInterface $tagrelation
     * @return \Ovc\Customtags\Api\Data\TagRelationInterface|null
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\TagRelationInterface $tagrelation)
    {
        try{
            $this->resource->save($tagrelation);
        } catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $tagrelation;
    }

    public function getById($tagrelationId)
    {
        $tagrelation = $this->tagRelationFactory->create();
        $this->resource->load($tagrelation, $tagrelationId);
        if (!$tagrelation->getId()) {
            throw new NoSuchEntityException(__('Tagrelation with id "%1" does not exist.', $tagrelation));
        }
        return $tagrelation;
    }
}