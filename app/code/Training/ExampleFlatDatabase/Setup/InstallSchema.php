<?php

namespace Training\ExampleFlatDatabase\Setup;

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

        /**
         * Do we need $start->startSetup() and $start->endSetup()?
         * No. We need them only if we want to switch off foreign key constraints)
         */

        $tableName=$setup->getTable('training_exampleflatdatabase_flattable');

        /** Drop existing Table (we are in installSchema, so should start clean) */
        if ($setup->getConnection()->isTableExists($tableName)){
            $setup->getConnection()->dropTable($tableName);
        }

        /** Prepair the Table */
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
            'name',
            Table::TYPE_TEXT,
            255,
            [
                'nullable' => true
            ]
        );
        /** The following columns should be present in all
         *  Model Resource Tables (see http://alanstorm.com/magento_2_crud_models_for_database_access)
         ** */
        $table->addColumn(
            'creation_time',
            Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => Table::TIMESTAMP_INIT
            ],
            'Creation Time'
        );
        $table->addColumn(
            'update_time',
            Table::TYPE_TIMESTAMP,
            null,
            [
                'nullable' => false,
                'default' => Table::TIMESTAMP_INIT_UPDATE
            ],
            'Modification Time'
        );
        $table->addColumn(
            'is_active',
            Table::TYPE_SMALLINT,
            null,
            [
                'nullable' => false,
                'default' => 1
            ],
            'Is Active'
        );
        /** Optionally set some options such as table type and charset */
        $table->setComment('Training Flat Database Table');
        $table->setOption('type', 'InnoDB');
        $table->setOption('charset', 'utf8');

        /** Now create the table */
        $setup->getConnection()->createTable($table);
    }
}