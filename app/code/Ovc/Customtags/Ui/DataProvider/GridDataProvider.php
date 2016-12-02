<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 24.11.16
 * Time: 17:36
 */

namespace Ovc\Customtags\Ui\DataProvider;


use Magento\Ui\DataProvider\AbstractDataProvider;
use Ovc\Customtags\Model\ResourceModel\Tag\CollectionFactory;

class GridDataProvider extends AbstractDataProvider
{
    /**
     * @var array
     */
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }


}