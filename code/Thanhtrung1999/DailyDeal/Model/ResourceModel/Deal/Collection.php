<?php
namespace Thanhtrung1999\DailyDeal\Model\ResourceModel\Deal;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'deal_id';
//    protected $_eventPrefix = 'tigren_dailydeal_model_collection';
//    protected $_eventObject = 'tigren_dailydeal_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Thanhtrung1999\DailyDeal\Model\Deal', 'Thanhtrung1999\DailyDeal\Model\ResourceModel\Deal');
    }

}
