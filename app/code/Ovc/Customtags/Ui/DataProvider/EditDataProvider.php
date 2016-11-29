<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 24.11.16
 * Time: 17:37
 */

namespace Ovc\Customtags\Ui\DataProvider;


use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Ui\DataProvider\Modifier\ModifierInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use Ovc\Customtags\Model\ResourceModel\Tag\CollectionFactory;

class EditDataProvider extends AbstractDataProvider
{
    /**
     * @var array
     */
    protected $_loadedData;
    /**
     * @var PoolInterface
     */
    private $pool;


    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        PoolInterface $pool,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->pool = $pool;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {

        if (!isset($this->_loadedData)) {
            $items = $this->collection->getItems();
            foreach ($items as $item) {
                $this->_loadedData[$item->getId()] = $item->getData();
                foreach ($this->pool->getModifiersInstances() as $modifier) {
                    $this->_loadedData[$item->getId()] = $modifier->modifyData($this->_loadedData[$item->getId()]);
                }
            }
        }


        return $this->_loadedData;
    }

    /**
     * {@inheritdoc}
     */
    public function getMeta()
    {
        $meta = parent::getMeta();

        /** @var ModifierInterface $modifier */
        foreach ($this->pool->getModifiersInstances() as $modifier) {
            $meta = $modifier->modifyMeta($meta);
        }

        return $meta;
    }

}