<?php
namespace Thanhtrung1999\JScript\Block;

use Thanhtrung1999\HelloWorld\Model\PostFactory;
use Magento\Framework\View\Element\Template\Context;

class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * @var PostFactory
     */
    protected $_postFactory;

    /**
     * Display constructor.
     * @param Context $context
     * @param PostFactory $postFactory
     */
    public function __construct(Context $context, PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\Phrase
     */
    public function sayHello()
    {
        return __('Hello World');
    }

    /**
     * @return \Magento\Framework\Data\Collection\AbstractDb|\Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection|null
     */
    public function getPostCollection(){
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }
}
