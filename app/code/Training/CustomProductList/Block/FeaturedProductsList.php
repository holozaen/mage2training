<?php

namespace Training\CustomProductList\Block;


use Magento\Catalog\Block\Product\AbstractProduct;
use Magento\Catalog\Block\Product\Context;
use Training\CustomProductList\Api\FeaturedProductsInterface;
use Training\CustomProductList\Model\FeaturedProducts as FeaturedProductsModel;

class FeaturedProductsList extends AbstractProduct
{
    /**
     * @var Context
     */
    private $context;
    /**
     * @var FeaturedProductsModel
     */
    private $featuredProductsModel;
    /**
     * @var array
     */
    private $data;
    /**
     * @var FeaturedProductsInterface
     */
    private $featuredProductsInterface;

    /**
     * FeaturedProductsList constructor.
     * @param Context $context
     * @param array $data
     * @param FeaturedProductsModel $featuredProductsModel
     * @param FeaturedProductsInterface $featuredProductsInterface
     * @internal param ProductCollectionFactory $productCollectionFactory
     * @internal param Visibility $catalogProductVisibility
     */
    public function __construct(Context $context, array $data, FeaturedProductsModel $featuredProductsModel, FeaturedProductsInterface $featuredProductsInterface)
    {
        parent::__construct($context, $data);
        $this->context = $context;

        $this->addColumnCountLayoutDepend('empty', 6)
            ->addColumnCountLayoutDepend('1column', 5)
            ->addColumnCountLayoutDepend('2columns-left', 4)
            ->addColumnCountLayoutDepend('2columns-right', 4)
            ->addColumnCountLayoutDepend('3columns', 3);
        $this->featuredProductsModel = $featuredProductsModel;
        $this->data = $data;
        $this->featuredProductsInterface = $featuredProductsInterface;
    }

    /**
     * @return mixed
     */
    public function getFeaturedProductsCollection()
    {
        $productCollection=$this->featuredProductsModel->getFeaturedProductsCollection();
        $this->_addProductAttributesAndPrices($productCollection);

        return $productCollection;
    }

    public function getFeaturedProductsViaProductRepositoryInterface()
    {
        $products=$this->featuredProductsInterface->getFeaturedProducts();

        return $products;
    }

}