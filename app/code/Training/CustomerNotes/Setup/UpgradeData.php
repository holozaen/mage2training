<?php

namespace Training\CustomerNotes\Setup;


use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Config;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

/**
 * Class UpgradeData
 * @package Training\CustomerNotes\Setup
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var EavSetup
     */
    private $eavSetup;
    /**
     * @var Config
     */
    private $eavConfig;
    /**
     * @var AttributeSetFactory
     */
    private $attributeSetFactory;

    public function __construct(EavSetup $eavSetup, Config $eavConfig, AttributeSetFactory $attributeSetFactory)
    {

        $this->eavSetup = $eavSetup;
        $this->eavConfig = $eavConfig;
        $this->attributeSetFactory = $attributeSetFactory;
    }


    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $entityType = $this->eavConfig->getEntityType(Customer::ENTITY);
        $attributeSet = $this->attributeSetFactory->create();


        $this->eavSetup->addAttribute(
            Customer::ENTITY,
            'crm_notes',
            [
                'label'     => 'CRM Notes',
                'input'     => 'textarea',
                'position'  => 50,
                'required'  => 0,
                'user_defined' => 1,
                'system' =>0,
                'group' => $attributeSet->getDefaultGroupId($entityType->getDefaultAttributeSetId()),
            ]
        );

        $this->setAttributeToForm('crm_notes',['adminhtml_customer']);
    }

    /**
     * @param $attributeCode
     * @param array $usedInForms
     */
    private function setAttributeToForm($attributeCode, array $usedInForms)
    {
        $attribute = $this->eavConfig->getAttribute(Customer::ENTITY, $attributeCode);
        $attribute->setData('used_in_forms', $usedInForms);
        $attribute->save();
    }
}