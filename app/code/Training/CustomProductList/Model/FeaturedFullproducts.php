<?php
/**
 * Beispiel, wie eine bestimmte Produktcollection über die Rest API bereitgestellt werden kann
 *
 * Siehe auch die Dateien
 * - di.xml (Zuweisung der Implementation zum Interface),
 * - webapi.xml (Url, über die der Webservice bereitgestellt wird, allfällige Zugangsbeschränkungen)
 *
 * Im Interface wird schliesslich definiert (im Doc), welcher Typ über die Api übergeben wird
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