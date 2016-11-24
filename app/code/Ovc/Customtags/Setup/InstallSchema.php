<?php

namespace Ovc\Customtags\Setup;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

        /**
         * Install Table ovc_tag_tag
         */

        $tableName=$setup->getTable('ovc_tag');

        /** drop existing Table (we are in installSchema, so should start clean) */
        if ($setup->getConnection()->isTableExists($tableName)){
            $setup->getConnection()->dropTable($tableName);
        }

        /** prepairing the Table */
        $table=$setup->getConnection()->newTable($tableName);
        $table->addColumn(
            'tag_id',
            Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'nullable' => false,
                'primary'  => true,
                'unsigned' => true
            ],
            'Tag Id'
        );
        $table->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            [
                'nullable' => true
            ],
            'Name'

        );
        $table->addColumn(
            'status',
            Table::TYPE_SMALLINT,
            6,
            [
                'nullable' => false,
                'default' => 0
            ],
            'Status'

        );
        $table->addColumn(
            'first_customer_id',
            Table::TYPE_INTEGER,
            10,
            [
                'nullable' => true,
                'unsigned' => true
            ],
            'First Customer Id'

        );
        $table->addColumn(
            'first_store_id',
            Table::TYPE_SMALLINT,
            5,
            [
                'nullable' => true,
                'unsigned' => true
            ],
            'First Store Id'

        );
        $table->addColumn(
            'description',
            Table::TYPE_TEXT,
            null,
            [
                'nullable' => true
            ],
            'Description'

        );
        $table->addColumn(
            'meta_title',
            Table::TYPE_TEXT,
            255,
            [
                'nullable' => true
            ],
            'Meta Title'

        );
        $table->addColumn(
            'meta_description',
            Table::TYPE_TEXT,
            null,
            [
                'nullable' => true
            ],
            'Meta Description'

        );
        $table->addIndex('FK_TAG_FIRST_CUSTOMER_ID_CUSTOMER_ENTITY_ENTITY_ID','first_customer_id');
        $table->addIndex('FK_TAG_FIRST_STORE_ID_CORE_STORE_STORE_ID','first_store_id');

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
        $table->setComment('Tag');
        $table->setOption('type', 'InnoDB');
        $table->setOption('charset', 'utf8');

        /** Now create the table */
        $setup->getConnection()->createTable($table);



        /**
         * Install Table ovc_tag_properties
         */

        $tableName=$setup->getTable('ovc_tag_properties');

        /** drop existing Table (we are in installSchema, so should start clean) */
        if ($setup->getConnection()->isTableExists($tableName)){
            $setup->getConnection()->dropTable($tableName);
        }

        /** prepairing the Table */
        $table=$setup->getConnection()->newTable($tableName);
        $table->addColumn(
            'tag_id',
            Table::TYPE_INTEGER,
            10,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 0
            ],
            'Tag Id'
        );
        $table->addColumn(
            'store_id',
            Table::TYPE_SMALLINT,
            5,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 0
            ],
            'Store Id'
        );
        $table->addColumn(
            'base_popularity',
            Table::TYPE_INTEGER,
            10,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 0
            ],
            'Base Popularity'
        );

        $table->addIndex('SOMENAME',['tag_id','store_id'],['type'=>AdapterInterface::INDEX_TYPE_PRIMARY]);
        $table->addIndex('IDX_TAG_PROPERTIES_STORE_ID','store_id');

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
        $table->setComment('Tag Properties');
        $table->setOption('type', 'InnoDB');
        $table->setOption('charset', 'utf8');

        /** Now create the table */
        $setup->getConnection()->createTable($table);

        /**
         * Install Table ovc_tag_relation
         */

        $tableName=$setup->getTable('ovc_tag_relation');

        /** drop existing Table (we are in installSchema, so should start clean) */
        if ($setup->getConnection()->isTableExists($tableName)){
            $setup->getConnection()->dropTable($tableName);
        }

        /** prepairing the Table */
        $table=$setup->getConnection()->newTable($tableName);
        $table->addColumn(
            'tag_relation_id',
            Table::TYPE_INTEGER,
            10,
            [
                'identity' => true,
                'nullable' => false,
                'primary'  => true,
                'unsigned' => true
            ],
            'Tag Relation Id'
        );
        $table->addColumn(
            'tag_id',
            Table::TYPE_INTEGER,
            10,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 0
            ],
            'Tag Id'
        );
        $table->addColumn(
            'customer_id',
            Table::TYPE_INTEGER,
            10,
            [
                'nullable' => true,
                'unsigned' => true,
            ],
            'Customer Id'
        );
        $table->addColumn(
            'product_id',
            Table::TYPE_INTEGER,
            10,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 0
            ],
            'Product Id'
        );
        $table->addColumn(
            'store_id',
            Table::TYPE_SMALLINT,
            5,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 1
            ],
            'Store Id'
        );
        $table->addColumn(
            'active',
            Table::TYPE_SMALLINT,
            5,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 1
            ],
            'Store Id'
        );

        $table->addIndex('UNQ_TAG_RELATION_TAG_ID_CUSTOMER_ID_PRODUCT_ID_STORE_ID',['tag_id','customer_id','product_id','store_id'],['type'=>AdapterInterface::INDEX_TYPE_UNIQUE]);
        $table->addIndex('IDX_TAG_RELATION_PRODUCT_ID','product_id');
        $table->addIndex('IDX_TAG_RELATION_TAG_ID','tag_id');
        $table->addIndex('IDX_TAG_RELATION_CUSTOMER_ID','customer_id');
        $table->addIndex('IDX_TAG_RELATION_STORE_ID','store_id');

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
        $table->setComment('Tag Relation');
        $table->setOption('type', 'InnoDB');
        $table->setOption('charset', 'utf8');

        /** Now create the table */
        $setup->getConnection()->createTable($table);

        /**
         * Install Table ovc_tag_summary
         */

        $tableName=$setup->getTable('ovc_tag_summary');

        /** drop existing Table (we are in installSchema, so should start clean) */
        if ($setup->getConnection()->isTableExists($tableName)){
            $setup->getConnection()->dropTable($tableName);
        }

        /** prepairing the Table */
        $table=$setup->getConnection()->newTable($tableName);
        $table->addColumn(
            'tag_id',
            Table::TYPE_INTEGER,
            10,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 0
            ],
            'Tag Id'
        );
        $table->addColumn(
            'store_id',
            Table::TYPE_SMALLINT,
            5,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 0
            ],
            'Store Id'
        );
        $table->addColumn(
            'customers',
            Table::TYPE_INTEGER,
            10,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 0
            ],
            'Customers'
        );
        $table->addColumn(
            'products',
            Table::TYPE_INTEGER,
            10,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 0
            ],
            'Products'
        );
        $table->addColumn(
            'uses',
            Table::TYPE_INTEGER,
            10,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 0
            ],
            'Uses'
        );
        $table->addColumn(
            'historical_uses',
            Table::TYPE_INTEGER,
            10,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 0
            ],
            'Historical Uses'
        );
        $table->addColumn(
            'popularity',
            Table::TYPE_INTEGER,
            10,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 0
            ],
            'Popularity'
        );
        $table->addColumn(
            'base_popularity',
            Table::TYPE_INTEGER,
            10,
            [
                'nullable' => false,
                'unsigned' => true,
                'default'  => 0
            ],
            'Base Popularity'
        );


        $table->addIndex('SOMENAME',['tag_id','store_id'],['type'=>AdapterInterface::INDEX_TYPE_PRIMARY]);
        $table->addIndex('IDX_TAG_SUMMARY_STORE_ID','tag_id');
        $table->addIndex('IDX_TAG_SUMMARY_TAG_ID','store_id');

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
        $table->setComment('Tag Summary');
        $table->setOption('type', 'InnoDB');
        $table->setOption('charset', 'utf8');

        /** Now create the table */
        $setup->getConnection()->createTable($table);

    }
}