<?php
namespace Thanhtrung1999\Catalog\Block;

use Magento\Framework\View\Element\Context;
use Magento\Cms\Model\Template\FilterProvider;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Cms\Model\BlockFactory;
use Magento\Framework\Registry;

class SizeGuide extends \Magento\Cms\Block\Block implements \Magento\Framework\DataObject\IdentityInterface {
    protected $product;
    protected $coreRegistry;

    public function __construct(Context $context, FilterProvider $filterProvider, StoreManagerInterface $storeManager,
                                BlockFactory $blockFactory, Registry $coreRegistry, array $data = []) {
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context, $filterProvider, $storeManager, $blockFactory, $data);
    }

//    public function _toHtml() { /* ... */ }
    protected function _toHtml()
    {
        if ($this->getProduct()->getTypeId() == \Magento\ConfigurableProduct\Model\Product\Type\Configurable::TYPE_CODE) {
            $configurableAttributes = $this->getProduct()->getTypeInstance()->getConfigurableAttributesAsArray($this->getProduct());
            foreach ($configurableAttributes as $attribute) {
                if (isset($attribute['attribute_code']) && $attribute['attribute_code'] == 'size') {
//                    return "aaaaaaaaaaaaaaaaa";
                    return parent::_toHtml();
                }
            }
        }
        return '';
    }

    public function getProduct() {
        if (!$this->product) {
            $this->product = $this->coreRegistry->registry('product');
        }
        return $this->product;
    }
}
