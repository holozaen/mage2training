<?php
/**
 * Created by PhpStorm.
 * User: ovc
 * Date: 18.04.16
 * Time: 11:11
 *
 * Creates Table for saving product extension attributes values
 */

namespace Training\ExtensionAttributesExample\Setup;


use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $tableName=$setup->getTable('training_extensionattributes_values');
        /** drop existing Table (we are in installSchema, so should start clean) */
        if ($setup->getConnection()->isTableExists($tableName)){
            $setup->getConnection()->dropTable($tableName);
        }
        $table=$setup->getConnection()->newTable($tableName);
        $table->addColumn(
            'entity_id',
            Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'nullable' => false,
                'primary'  => true,
                'unsigned' => true
            ],
            'Entity id'
        );
        $table->addColumn(
            'product_id',
            Table::TYPE_INTEGER,
            null,
            [
                'nullable' => false,
                'unsigned' => true,
            ],
            'Product id'
        );
        $table->addColumn(
            'extensionattribute1',
            Table::TYPE_TEXT,
            255,
            [
                'nullable' => true,
                'default' => null
            ],
            'Extension Attribute 1 Value'
        );
        $table->addColumn(
            'extensionattribute2',
            Table::TYPE_TEXT,
            255,
            [
                'nullable' => true,
                'default' => null
            ],
            'Extension Attribute 2 Value'
        );
        $table->addIndex(
            $setup->getIdxName(
                'training_extensionattributes_values',
                [
                    'product_id'
                ],
                AdapterInterface::INDEX_TYPE_UNIQUE
            ),
            [
                'product_id'
            ],
            ['type' => AdapterInterface::INDEX_TYPE_UNIQUE]
        );
        $table->addForeignKey(
            $setup->getFkName(
                'training_extensionattributes_values',
                'product_id',
                'catalog_product_entity',
                'entity_id'
            ),
            'product_id',
            $setup->getTable('catalog_product_entity'),
            'entity_id',
            Table::ACTION_CASCADE
        );

        /** Optionally set some options such as table type and charset */
        $table->setComment('Training Extension Attributes Table');
        $table->setOption('type', 'InnoDB');
        $table->setOption('charset', 'utf8');

        /** Now create the table */
        $setup->getConnection()->createTable($table);

        $setup->endSetup();

    }
}