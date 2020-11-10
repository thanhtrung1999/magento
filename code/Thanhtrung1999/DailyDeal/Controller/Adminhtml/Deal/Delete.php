<?php
namespace Thanhtrung1999\DailyDeal\Controller\Adminhtml\Deal;

use Magento\TestFramework\ErrorLog\Logger;
use Thanhtrung1999\DailyDeal\Controller\Adminhtml\Deal;

class Delete extends Deal
{
    public function execute()
    {
        $dealId = (int) $this->getRequest()->getParam('deal_id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($dealId){
            try {
                $model = $this->_objectManager->create('Thanhtrung1999\DailyDeal\Model\Deal');
                $model->load($dealId);
                $model->delete();
                $this->messageManager->addSuccess(__('The deal has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e){
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['deal_id' => $dealId]);
            }
        }
        $this->messageManager->addError(__('We can\'t find a deal to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
