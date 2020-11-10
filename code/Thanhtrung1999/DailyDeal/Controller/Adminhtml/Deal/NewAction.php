<?php
namespace Thanhtrung1999\DailyDeal\Controller\Adminhtml\Deal;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Thanhtrung1999\DailyDeal\Controller\Adminhtml\Deal;
use Thanhtrung1999\DailyDeal\Model\DealFactory;

class NewAction extends Deal
{
    /**
     * @var \Magento\Backend\Model\View\Result\Forward
     */
    protected $resultForwardFactory;

    /**
     * NewAction constructor.
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     * @param DealFactory $dealFactory
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        DealFactory $dealFactory,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory)
    {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context, $coreRegistry, $resultPageFactory, $dealFactory);
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return true;
        // return $this->_authorization->isAllowed('Webspeaks_Contact::attachment_save');
    }

    /**
     * Forward to edit
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Forward $resultForward */
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
