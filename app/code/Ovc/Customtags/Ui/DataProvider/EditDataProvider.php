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
    const DATA_SOURCE_DEFAULT = 'tag';

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
     * {@inheritdoc}
     */
    public function getData()
    {
        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $this->data[$item->getId()][self::DATA_SOURCE_DEFAULT] = $item->getData();
        }
        /** @var ModifierInterface $modifier */
        foreach ($this->pool->getModifiersInstances() as $modifier) {
            $this->data = $modifier->modifyData($this->data);
        }

        return $this->data;
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