<?php
/**
 * This is an example on how to expose a product collection over the rest api
 *
 * see files:
 * - di.xml (assigns implementation to interface)
 * - webapi.xml (sets url for api and - if applicable - user permissions neede
 *
 * The interface defines in the PHPDoc comment, which parameter type is to be returned on api calls
 */

namespace Training\CustomProductList\Model;


use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Training\CustomProductList\Api\FeaturedProductsInterface;

class FeaturedFullproducts implements FeaturedProductsInterface
{
    /**
     * @var FilterBuilder
     */
    private $filterBuilder;
    /**
     * @var FilterGroupBuilder
     */
    private $filterGroupBuilder;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepositoryInterface;

    /**
     * FeaturedFullproducts constructor.
     * @param FilterBuilder $filterBuilder
     * @param FilterGroupBuilder $filterGroupBuilder
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param ProductRepositoryInterface $productRepositoryInterface
     */
    public function __construct(FilterBuilder $filterBuilder,FilterGroupBuilder $filterGroupBuilder, SearchCriteriaBuilder $searchCriteriaBuilder,ProductRepositoryInterface $productRepositoryInterface)
    {

        $this->filterBuilder = $filterBuilder;
        $this->filterGroupBuilder = $filterGroupBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->productRepositoryInterface = $productRepositoryInterface;
    }


    /**
     * {@inheritdoc}
     */
    public function getFeaturedProducts()
    {
        $filter=$this->filterBuilder
            ->setField('featured')
            ->setValue('1')
            ->create();
        $filterGroup=$this->filterGroupBuilder
            ->addFilter($filter)
            ->create();
        $searchCriteria=$this->searchCriteriaBuilder
            ->setFilterGroups([$filterGroup])
            ->create();

        $productlist=$this->productRepositoryInterface->getList($searchCriteria);
        return $productlist;
   }
}