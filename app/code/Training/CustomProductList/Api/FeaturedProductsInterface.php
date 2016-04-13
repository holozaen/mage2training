<?php

namespace Training\CustomProductList\Api;


interface FeaturedProductsInterface
{
    /**
     * Return collection of products with featured attribute set to 1
     *
     * @api
     * @return \Magento\Catalog\Api\Data\ProductSearchResultsInterface
     */

    public function getFeaturedProducts();
}