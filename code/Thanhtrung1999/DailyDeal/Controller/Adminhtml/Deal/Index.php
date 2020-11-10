<?php
namespace Thanhtrung1999\DailyDeal\Controller\Adminhtml\Deal;

use Thanhtrung1999\DailyDeal\Controller\Adminhtml\Deal;
use Thanhtrung1999\DailyDeal\Model\DealFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Index extends Deal
{
    /**
     * Index constructor.
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
    )
    {
        parent::__construct($context, $coreRegistry, $resultPageFactory, $dealFactory);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Thanhtrung1999_DailyDeal::daily_deal');
        $resultPage->getConfig()->getTitle()->prepend(__('Deals'));

        return $resultPage;
    }
}
