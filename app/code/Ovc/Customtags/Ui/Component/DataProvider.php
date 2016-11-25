<?php
namespace Ovc\Customtags\Ui\Component;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Ovc\Customtags\Model\ResourceModel\Tag\CollectionFactory;

class DataProvider extends AbstractDataProvider
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
