<?php
namespace Thanhtrung1999\Hospital\Model\ResourceModel\Hospitals;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'model_hospital_collection';
    protected $_eventObject = 'hospital_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Thanhtrung1999\Hospital\Model\Hospitals', 'Thanhtrung1999\Hospital\Model\ResourceModel\Hospitals');
    }

}
