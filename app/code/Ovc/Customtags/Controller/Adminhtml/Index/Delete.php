<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 25.11.16
 * Time: 11:46
 */

namespace Ovc\Customtags\Controller\Adminhtml\Index;


class Delete extends Index
{
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('tag_id');
        if ($id) {
            try{
                // init model and delete
                /** @var \Ovc\Customtags\Model\Tag $model */
                $model = $this->_objectManager->create('Ovc\Customtags\Model\Tag');
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the tag.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e)
            {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['tag_id' => $id]);

            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a tag to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}