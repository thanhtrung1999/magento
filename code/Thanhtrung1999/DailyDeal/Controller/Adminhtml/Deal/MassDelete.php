<?php
namespace Thanhtrung1999\DailyDeal\Controller\Adminhtml\Deal;

use Thanhtrung1999\DailyDeal\Controller\Adminhtml\Deal;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Thanhtrung1999\DailyDeal\Model\DealFactory;
use Thanhtrung1999\DailyDeal\Model\ResourceModel\DealFactory as resDealFactory;

class MassDelete extends Deal
{
    protected $_resDealFactory;

    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        DealFactory $dealFactory,
        resDealFactory $resDealFactory
    )
    {
        parent::__construct($context, $coreRegistry, $resultPageFactory, $dealFactory);
        $this->_resDealFactory = $resDealFactory;
    }

    public function execute()
    {
        $dealIds = $this->getRequest()->getParam('deal', array());
        $model = $this->_dealFactory->create();
        $resModel = $this->_resDealFactory->create();
        if(count($dealIds))
        {
            $i = 0;
            foreach ($dealIds as $dealId) {
                try {
                    $resModel->load($model,$dealId);
                    $resModel->delete($model);
                    $i++;
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage($e->getMessage());
                }
            }
            if ($i > 0) {
                $this->messageManager->addSuccessMessage(
                    __('A total of %1 item(s) were deleted.', $i)
                );
            }
        }
        else
        {
            $this->messageManager->addErrorMessage(
                __('You can not delete item(s), Please check again %1')
            );
        }
        $this->_redirect('*/*/index');
    }
}
