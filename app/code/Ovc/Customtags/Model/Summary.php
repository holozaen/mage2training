<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 21.11.16
 * Time: 13:30
 */

namespace Ovc\Customtags\Model;


use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Ovc\Customtags\Api\TagSummaryInterface;

class Summary extends AbstractModel implements  TagSummaryInterface , IdentityInterface{

    const CACHE_TAG = 'ovc_customtags_summary';



    public function _construct()
    {
        $this->_init('Ovc\Customtags\Model\ResourceModel\Summary');
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        // TODO: Implement getIdentities() method.
        return [self::CACHE_TAG . '_' . $this->getId()];

    }
}
{

}