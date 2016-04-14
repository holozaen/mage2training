<?php

namespace Training\CustomProductList\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Boolean;
use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class upgradeSchema implements UpgradeSchemaInterface
{

    /**
     * @var EavSetup
     */
    private $eavSetup;

    public function __construct(EavSetup $eavSetup)
    {
        $this->eavSetup = $eavSetup;
    }
 
    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $this->eavSetup->addAttribute(Product::ENTITY,'featured',[
            'label' => 'Featured',
            'global' => ScopedAttributeInterface::SCOPE_STORE,
            'input' => 'select',
            'source' => Boolean::class,
            'is_filterable'=> 1,
            'filterable_in_search' => 1,
            'used_in_product_listing' =>1,
            'used_for_promo_rules' => 1,
            'is_used_in_grid' => 1,
            'is_visible_in_grid' => 1,
            'is_filterable_in_grid' => 1,
            'required' => 0,
            'user_defined' => 1,
            'note' => 'Select if product is marked as featured in lists',
            'position' => 0,
            'group' => 'Product Details'
        ]);
        
    }


}