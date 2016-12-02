<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 24.11.16
 * Time: 13:00
 */

namespace Ovc\Customtags\Controller\Adminhtml\Index;


use Ovc\Customtags\Controller\Adminhtml\Index;

class Edit extends Index
{

    private function _setCurrentStoreId()
    {
        $request = $this->getRequest();
        $store = $this->storeFactory->create();
        $store->load($request->getParam('store', 0));
        $this->_coreRegistry->register('current_store', $store);
        return $store->getId();
    }

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $storeId=$this->_setCurrentStoreId();
        $id = $this->getRequest()->getParam('tag_id');
        $model = $this->_objectManager->create('Ovc\Customtags\Model\Tag');
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This tag no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->_coreRegistry->register('current_tag', $model);

        // 5. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Tag') : __('New Tag'),
            $id ? __('Edit Tag') : __('New Tag')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Tags'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getTitle() : __('New Tag'));
        return $resultPage;
    }
}