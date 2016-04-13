<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 12.04.16
 * Time: 19:26
 */

namespace Training\CustomProductList\Model;

use Magento\Catalog\Model\Product\Visibility;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;


class FeaturedProducts

{
    /**
     * @var ProductCollectionFactory
     */
    private $productCollectionFactory;
    /**
     * @var Visibility
     */
    private $catalogProductVisibility;

    /**
     * FeaturedProducts constructor.
     * @param ProductCollectionFactory $productCollectionFactory
     * @param Visibility $catalogProductVisibility
     */
    public function __construct(ProductCollectionFactory $productCollectionFactory, Visibility $catalogProductVisibility)
    {

        $this->productCollectionFactory = $productCollectionFactory;
        $this->catalogProductVisibility = $catalogProductVisibility;
    }

    /**
     * {@inheritdoc}
     */
    public function getFeaturedProductsCollection()
    {
        $productCollection=$this->productCollectionFactory->create();
        $productCollection->addAttributeToFilter('featured',['eq'=>1]);
        $productCollection->setVisibility($this->catalogProductVisibility->getVisibleInCatalogIds());
        $productCollection->addStoreFilter();
        return $productCollection;
    }

    /**
     * Return collection of products with featured attribute set to 1
     *
     * @api
     * @return array
     */
    public function getFeaturedProductsArray()
    {
        $productCollection=$this->getFeaturedProductsCollection();
        $productsArray=[];
        /** @var  $product */
        foreach ($productCollection as $product) {
            $productsArray[]=$product->getData();
        }
        return $productsArray;
    }
}