<?php
namespace Thanhtrung1999\Hospital\Model;

class Hospitals extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'model_hospital';

    protected $_cacheTag = 'model_hospital';

    protected $_eventPrefix = 'model_hospital';

    protected function _construct()
    {
        $this->_init('Thanhtrung1999\Hospital\Model\ResourceModel\Hospitals');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
