<?php

namespace Thanhtrung1999\Hospital\Controller\Adminhtml\Hospitals;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;

    public function __construct(Context $context, PageFactory $resultPageFactory) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute() {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Thanhtrung1999_Hospital::hospitals');
        $resultPage->getConfig()->getTitle()->prepend((__('Hospitals')));

        return $resultPage;
    }


}
