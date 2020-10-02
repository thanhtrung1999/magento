<?php
namespace Thanhtrung1999\HelloWorld\Model;

class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'tbl_helloworld_post';

    protected $_cacheTag = 'tbl_helloworld_post';

    protected $_eventPrefix = 'tbl_helloworld_post';

    protected function _construct()
    {
        $this->_init('Thanhtrung1999\HelloWorld\Model\ResourceModel\Post');
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
