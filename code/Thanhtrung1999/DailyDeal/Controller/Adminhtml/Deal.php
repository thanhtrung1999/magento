<?php
namespace Thanhtrung1999\DailyDeal\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Thanhtrung1999\DailyDeal\Model\DealFactory;

class Deal extends Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var \Thanhtrung1999\DailyDeal\Model\DealFactory
     */
    protected $_dealFactory;

    /**
     * Deal constructor.
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     * @param DealFactory $dealFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        DealFactory $dealFactory
    ) {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_dealFactory = $dealFactory;

    }
    public function execute()
    {

    }

    protected function _isAllowed()
    {
        return true;
    }
}
