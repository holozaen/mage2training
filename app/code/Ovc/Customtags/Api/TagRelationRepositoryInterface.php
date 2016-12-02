<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 30.11.16
 * Time: 12:26
 */

namespace Ovc\Customtags\Api;


interface TagRelationRepositoryInterface
{
    /**
     * @param Data\TagRelationInterface $tagrelation
     * @return \Ovc\Customtags\Api\Data\TagRelationInterface|null
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\TagRelationInterface $tagrelation);

    public function getById($tagrelationId);
}