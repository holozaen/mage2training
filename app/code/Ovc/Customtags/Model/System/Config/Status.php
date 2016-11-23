<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 22.11.16
 * Time: 12:44
 */

namespace Ovc\Customtags\Model\System\Config;


use Magento\Framework\Option\ArrayInterface;

class Status implements ArrayInterface
{
    const STATUS_DISABLED = -1;
    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        $options = [
            self::STATUS_DISABLED => __('Disabled'),
            self::STATUS_PENDING => __('Pending'),
            self::STATUS_APPROVED => __('Approved'),
        ];

        return $options;
    }
}