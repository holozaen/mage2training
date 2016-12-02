<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 22.11.16
 * Time: 12:58
 */

namespace Ovc\Customtags\Controller\Adminhtml;


use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Store\Model\StoreFactory;
use Magento\Ui\Component\MassAction\Filter;
use Ovc\Customtags\Model\ResourceModel\Tag\CollectionFactory as CollectionFactory;

abstract class Index extends Action
{

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * Result page factory
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var Context
     */
    protected $_context;
    /**
     * @var Filter
     */
    protected $_filter;
    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;
    /**
     * @var DataPersistorInterface
     */
    protected $_dataPersistor;
    /**
     * @var StoreFactory
     */
    protected $storeFactory;

    /**
     * @param Context $_context
     * @param Registry $_coreRegistry
     * @param PageFactory $_resultPageFactory
     * @param CollectionFactory $_collectionFactory
     * @param Filter $_filter
     * @param DataPersistorInterface $_dataPersistor
     * @param StoreFactory $storeFactory
     * @internal param Context $context
     * @internal param Registry $coreRegistry
     * @internal param PageFactory $resultPageFactory
     * @internal param CollectionFactory $collectionFactory
     * @internal param TagFactory $tagFactory
     */
    public function __construct(
        Context $_context,
        Registry $_coreRegistry,
        PageFactory $_resultPageFactory,
        CollectionFactory $_collectionFactory,
        Filter $_filter,
        DataPersistorInterface $_dataPersistor,
        StoreFactory $storeFactory
    ) {
        $this->_coreRegistry = $_coreRegistry;
        $this->_resultPageFactory = $_resultPageFactory;
        $this->_context = $_context;
        $this->_filter = $_filter;
        $this->_collectionFactory = $_collectionFactory;
        $this->_dataPersistor = $_dataPersistor;
        $this->storeFactory = $storeFactory;
        parent::__construct($_context);
    }

    /**
     * access rights checking
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Ovc_Customtags::manage_tags');
    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function initPage($resultPage)
    {
        $resultPage->setActiveMenu('Ovc_Customtags::tag')
            ->addBreadcrumb(__('Custom Tags'), __('Custom Tags'));
        return $resultPage;
    }

}