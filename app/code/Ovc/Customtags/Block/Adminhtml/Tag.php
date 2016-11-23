<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 22.11.16
 * Time: 12:49
 */

namespace Ovc\Customtags\Block\Adminhtml;


use Magento\Backend\Block\Widget\Grid\Container;

class Tag extends Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_tag';
        $this->_blockGroup = 'Ovc_Customtags';
        $this->_headerText = __('Manage Tags');
        $this->_addButtonLabel = __('Add Tags');
        parent::_construct();
    }
}