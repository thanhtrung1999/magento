<?php
namespace Thanhtrung1999\HelloWorld\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'post_id';
    protected $_eventPrefix = 'tbl_helloworld_post_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Thanhtrung1999\HelloWorld\Model\Post', 'Thanhtrung1999\HelloWorld\Model\ResourceModel\Post');
    }

}
