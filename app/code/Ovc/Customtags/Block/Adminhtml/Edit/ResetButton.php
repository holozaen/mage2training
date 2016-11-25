<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 25.11.16
 * Time: 09:25
 */

namespace Ovc\Customtags\Block\Adminhtml\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class ResetButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Reset'),
            'class' => 'reset',
            'on_click' => 'location.reload();',
            'sort_order' => 30
        ];
    }
}