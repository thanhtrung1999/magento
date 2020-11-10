<?php

namespace Thanhtrung1999\DailyDeal\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

    const XML_PATH_HOSPITAL = 'dailydeal/';

    /**
     * @var \Magento\Backend\Model\UrlInterface
     */
    protected $_backendUrl;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    protected $storeManager;

    /**
     * @param \Magento\Framework\App\Helper\Context   $context
     * @param \Magento\Backend\Model\UrlInterface $backendUrl
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Backend\Model\UrlInterface $backendUrl,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        parent::__construct($context);
        $this->_backendUrl = $backendUrl;
        $this->storeManager = $storeManager;
    }

    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field, ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    public function getGeneralConfig($code, $storeId = null)
    {

        return $this->getConfigValue(self::XML_PATH_HOSPITAL .'general/'. $code, $storeId);
    }

    /**
     * get products tab Url in admin
     * @return string
     */
    public function getProductsGridUrl()
    {
        /*return $this->_getUrl('tigren/deal/products', ['_current' => true]);*/
        return $this->_backendUrl->getUrl('tigren/deal/products', ['_current' => true]);
    }

}
