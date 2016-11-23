<?php
namespace Peterbaettig\Commercebug\Plugin\Magento\Framework\View;
class Layout
{
    function beforeGenerateElements($subject){
        \Peterbaettig\Commercebug\Model\All::addTo(
            'request_layout_xml', $subject->getNode()->asXml());
    }
}
