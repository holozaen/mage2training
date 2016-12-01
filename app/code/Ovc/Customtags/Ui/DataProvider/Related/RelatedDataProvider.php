<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 30.11.16
 * Time: 12:21
 */

namespace Ovc\Customtags\Ui\DataProvider\Related;


use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Catalog\Ui\DataProvider\Product\ProductDataProvider;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Store\Api\Data\StoreInterface;
use Magento\Store\Api\StoreRepositoryInterface;
use Ovc\Customtags\Api\TagRepositoryInterface;


class RelatedDataProvider extends ProductDataProvider
{

    protected $request;
    protected $productRepository;
    protected $storeRepository;
    protected $productLinkRepository;
    private $tag;
    private $store;

    /**
     * @var TagRepositoryInterface
     */
    private $tagRepositoryInterface;
    /**
     * @var StoreInterface
     */
    private $product;

    /**
     * RelatedDataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param RequestInterface $request
     * @param TagRepositoryInterface $tagRepositoryInterface
     * @param StoreRepositoryInterface $storeRepository
     * @param ProductRepositoryInterface $productRepository
     * @param array|\Magento\Ui\DataProvider\AddFieldToCollectionInterface[] $addFieldStrategies
     * @param array|\Magento\Ui\DataProvider\AddFilterToCollectionInterface[] $addFilterStrategies
     * @param array $meta
     * @param array $data
     * @internal param StoreInterface $storeInterface
     * @internal param TagRepository $tagRepository
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        RequestInterface $request,
        TagRepositoryInterface $tagRepositoryInterface,
        StoreRepositoryInterface $storeRepository,
        ProductRepositoryInterface $productRepository,
        $addFieldStrategies,
        $addFilterStrategies,
        array $meta = [],
        array $data = []
    )
    {
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $collectionFactory,
            $addFieldStrategies,
            $addFilterStrategies,
            $meta,
            $data
        );

        $this->request = $request;
        $this->name = $name;
        $this->tagRepositoryInterface = $tagRepositoryInterface;
        $this->storeRepository = $storeRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * {@inheritdoc}
     */
    protected function getLinkType()
    {
        return 'relation';
    }


    /**
     * {@inheritdoc}
     */
    public function getCollection()
    {
        /** @var Collection $collection */
        $collection = parent::getCollection();
        $collection->addAttributeToSelect('status');

        if ($this->getStore()) {
            $collection->setStore($this->getStore());
        }

        if (!$this->getProduct()) {
            return $collection;
        }

        $collection->addAttributeToFilter(
            $collection->getIdFieldName(),
            ['nin' => [$this->getProduct()->getId()]]
        );

        return $this->addCollectionFilters($collection);
    }

    /**
     * Retrieve tag
     *
     * @return TagRepositoryInterface
     */
    protected function getTag()
    {
        if (null !== $this->tag) {
            return $this->tag;
        }

        if (!($id = $this->request->getParam('current_tag_id'))) {
            return null;
        }

        return $this->tag = $this->tagRepositoryInterface->getById($id);
    }

    /**
     * Retrieve product
     *
     * @return ProductInterface|null
     */
    protected function getProduct()
    {
        if (null !== $this->product) {
            return $this->product;
        }

        if (!($id = $this->request->getParam('current_product_id'))) {
            return null;
        }

        return $this->product = $this->productRepository->getById($id);
    }

    /**
     * Retrieve store
     *
     * @return StoreInterface|null
     */
    protected function getStore()
    {
        if (null !== $this->store) {
            return $this->store;
        }

        if (!($storeId = $this->request->getParam('current_store_id'))) {
            return null;
        }

        return $this->store = $this->storeRepository->getById($storeId);
    }
}