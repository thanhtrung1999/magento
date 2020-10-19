<?php
namespace Thanhtrung1999\Hospital\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Thanhtrung1999\Hospital\Model\HospitalsFactory;

class Hospitals extends Action
{
    protected $_coreRegistry;
    protected $_resultPageFactory;
    protected $_hospitalsFactory;

    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        HospitalsFactory $hospitalsFactory
    ) {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_hospitalsFactory = $hospitalsFactory;

    }
    public function execute()
    {

    }

    protected function _isAllowed()
    {
        return true;
    }
}
