<?php

namespace Ovc\Customtags\Api;


interface TagRepositoryInterface
{
    /**
     * @param Data\TagInterface $tag
     * @return \Ovc\Customtags\Api\Data\TagInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\TagInterface $tag);

    public function getById($tagId);

}