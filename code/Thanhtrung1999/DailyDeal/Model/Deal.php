<?php
namespace Thanhtrung1999\DailyDeal\Model;

class Deal extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'tigren_dailydeal_grid';

    /**
     * @var string
     */
    protected $_cacheTag = 'tigren_dailydeal_grid';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'tigren_dailydeal_grid';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Thanhtrung1999\DailyDeal\Model\ResourceModel\Deal');
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

    public function getProducts(\Thanhtrung1999\DailyDeal\Model\Deal $object)
    {
        $tbl = $this->getResource()->getTable(\Thanhtrung1999\DailyDeal\Model\ResourceModel\Deal::TBL_ATT_PRODUCT);
        $select = $this->getResource()->getConnection()->select()->from(
            $tbl,
            ['product_id']
        )
            ->where(
                'deal_id = ?',
                (int)$object->getId()
            );
        return $this->getResource()->getConnection()->fetchCol($select);
    }
}
