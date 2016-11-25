<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 25.11.16
 * Time: 14:55
 */

namespace Ovc\Customtags\Controller\Adminhtml\Index;

use Magento\Framework\Exception\LocalizedException;

class Save extends Index
{

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('tag_id');

            if (empty($data['tag_id'])) {
                $data['tag_id'] = null;
            }

            /** @var \Ovc\Customtags\Model\ResourceModel\Tag $model */
            $model = $this->_objectManager->create('Ovc\Customtags\Model\Tag')->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This tag no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $model->setData($data);

            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the tag.'));
                $this->_dataPersistor->clear('tag_details');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['tag_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the tag.'));
            }

            $this->_dataPersistor->set('tag_details', $data);
            return $resultRedirect->setPath('*/*/edit', ['tag_id' => $this->getRequest()->getParam('tag_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
