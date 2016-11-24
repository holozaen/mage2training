<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 22.11.16
 * Time: 12:58
 */

namespace Ovc\Customtags\Controller\Adminhtml\Tag;

use Ovc\Customtags\Controller\Adminhtml\Tag;

class Index extends Tag
{

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $request=$this->getRequest();
        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return null;
        }

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Ovc_Customtags::tag');
        $resultPage->getConfig()->getTitle()->prepend(__('Custom Tags'));

        return $resultPage;
    }
}