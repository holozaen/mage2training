<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 07.04.16
 * Time: 16:32
 */

namespace Training\ExamplePlugin\Plugin;


use Magento\Catalog\Api\Data\ProductInterface;

class SwissProductPricePlugin
{
    public function afterGetPrice(ProductInterface $subject, $result){
        return $result *1.5;
    }

}