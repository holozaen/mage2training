<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 25.11.16
 * Time: 16:16
 */

namespace Ovc\Customtags\Model\System\Source;


use Magento\Framework\Option\ArrayInterface;
use Ovc\Customtags\Model\System\Config\Status as ConfigStatus;

class Status implements ArrayInterface
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        $options = [
            ['value' => ConfigStatus::STATUS_DISABLED, 'label' => __('Disabled')],
            ['value' => ConfigStatus::STATUS_PENDING, 'label' => __('Pending')],
            ['value' => ConfigStatus::STATUS_APPROVED, 'label' => __('Approved')]
        ];

        return $options;
    }
}