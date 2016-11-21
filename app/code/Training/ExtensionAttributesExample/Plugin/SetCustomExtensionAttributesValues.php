<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 18.04.16
 * Time: 17:24
 */

namespace Training\ExtensionAttributesExample\Plugin;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\RequestInterface;

class SetCustomExtensionAttributesValues
{
    public function aroundSetExtensionAttributes(Action $subject, callable $proceed, RequestInterface $request)
    {
        $result = $proceed($request);
        return $result;
    }
}