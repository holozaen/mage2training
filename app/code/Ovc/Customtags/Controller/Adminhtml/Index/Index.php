<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 24.11.16
 * Time: 13:24
 */

namespace Ovc\Customtags\Controller\Adminhtml\Index;


use Magento\Framework\App\ResponseInterface;

class Index extends \Ovc\Customtags\Controller\Adminhtml\Index
{

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return null;
        }

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();

        return $resultPage;
    }
}