<?php

namespace Thanhtrung1999\DailyDeal\Setup;

use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements \Magento\Framework\Setup\UpgradeSchemaInterface
{
    public function upgrade(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $setup->startSetup();
        if(version_compare($context->getVersion(), '1.2.4', '<')) {
            if (!$setup->tableExists('tigren_dailydeal')) {
                $table = $setup->getConnection()->newTable(
                    $setup->getTable('tigren_dailydeal')
                )
                    ->addColumn(
                        'deal_id',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        10,
                        [
                            'identity' => true,
                            'nullable' => false,
                            'primary' => true,
                            'unsigned' => true,
                        ],
                        'ID'
                    )
                    ->addColumn(
                        'deal_status',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        10,
                        ['default' => 0],
                        "Deal Status"
                    )
                    ->addColumn(
                        'deal_price',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        10,
                        [],
                        'Deal Price'
                    )
                    ->addColumn(
                        'deal_quantity',
                        \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                        10,
                        [],
                        'Deal Price'
                    )
                    ->addColumn(
                        'deal_time_start',
                        \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                        null,
                        [],
                        'Deal time start'
                    )
                    ->addColumn(
                        'deal_time_end',
                        \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                        null,
                        [],
                        'Deal time end'
                    )
                    ->addColumn(
                        'created_at',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                        'Created At'
                    )->addColumn(
                        'updated_at',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                        'Updated At')
                    ->setComment('Daily Deal Table');
                $setup->getConnection()->createTable($table);

                $setup->getConnection()->addIndex(
                    $setup->getTable('tigren_dailydeal'),
                    $setup->getIdxName(
                        $setup->getTable('tigren_dailydeal'),
                        ['deal_status', 'deal_price', 'deal_quantity', 'deal_time_start', 'deal_time_end']
                    ),
                    ['deal_status', 'deal_price', 'deal_quantity', 'deal_time_start', 'deal_time_end']
                );
            }
            if (!$setup->tableExists('tigren_dailydeal_product_attachment_rel')) {
                $table = $setup->getConnection()
                    ->newTable($setup->getTable('tigren_dailydeal_product_attachment_rel'))
                    ->addColumn('deal_id', Table::TYPE_INTEGER, 10, ['nullable' => false, 'unsigned' => true])
                    ->addColumn('product_id', Table::TYPE_INTEGER, 10, ['nullable' => false, 'unsigned' => true], 'Magento Product Id')
                    ->addForeignKey(
                        $setup->getFkName(
                            'tigren_dailydeal',
                            'deal_id',
                            'tigren_dailydeal_product_attachment_rel',
                            'deal_id'
                        ),
                        'deal_id',
                        $setup->getTable('tigren_dailydeal'),
                        'deal_id',
                        Table::ACTION_CASCADE
                    )
                    ->addForeignKey(
                        $setup->getFkName(
                            'tigren_dailydeal_product_attachment_rel',
                            'deal_id',
                            'catalog_product_entity',
                            'entity_id'
                        ),
                        'product_id',
                        $setup->getTable('catalog_product_entity'),
                        'entity_id',
                        Table::ACTION_CASCADE
                    )
                    ->setComment('DailyDeal Product Attachment relation table');

                $setup->getConnection()->createTable($table);
            }
        }
        $setup->endSetup();
    }
}
