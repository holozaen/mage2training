<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 25.11.16
 * Time: 09:20
 */

namespace Ovc\Customtags\Block\Adminhtml\Edit;


use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Ovc\Customtags\Api\TagInterface;
use Ovc\Customtags\Api\TagRepositoryInterface;

class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var TagInterface
     */
    private $tagInterface;
    /**
     * @var TagRepositoryInterface
     */
    private $tagRepositoryInterface;

    /**
     * @param Context $context
     * @param TagRepositoryInterface $tagRepositoryInterface
     */
    public function __construct(
        Context $context,
        TagRepositoryInterface $tagRepositoryInterface
    ) {
        $this->context = $context;
        $this->tagRepositoryInterface = $tagRepositoryInterface;
    }

    /**
     * Return Tag ID
     *
     * @return int|null
     */
    public function getTagId()
    {
        try {
            $request=$this->context->getRequest();
            $idToCheck=$request->getParam('id');
            return $this->tagRepositoryInterface->getById($idToCheck)->getId();
        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}