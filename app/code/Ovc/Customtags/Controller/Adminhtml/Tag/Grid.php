<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 22.11.16
 * Time: 13:01
 */

namespace Ovc\Customtags\Controller\Adminhtml\Tag;


use Ovc\Customtags\Controller\Adminhtml\Tag;

class Grid extends Tag
{

    public function execute()
    {
        return $this->_resultPageFactory->create();
    }
}