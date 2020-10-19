<?php

namespace Thanhtrung1999\Hospital\Controller\Index;

use Magento\Framework\App\Action\Context;
use Thanhtrung1999\Hospital\Helper\Data;

class Config extends \Magento\Framework\App\Action\Action
{

    /**
     * @var Data
     */
    protected $_helperData;

    /**
     * Config constructor.
     * @param Context $context
     * @param Data $helperData
     */
    public function __construct(Context $context, Data $helperData)
    {
        $this->_helperData = $helperData;
        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        return $this->_helperData->getGeneralConfig('enable');
    }
}
