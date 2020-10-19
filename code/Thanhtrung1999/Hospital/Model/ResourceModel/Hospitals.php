<?php
namespace Thanhtrung1999\Hospital\Model\ResourceModel;

class Hospitals extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context)
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('model_hospital', 'id');
    }

}
