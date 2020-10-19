<?php
namespace Thanhtrung1999\Hospital\Controller\Adminhtml\Hospitals;

use Thanhtrung1999\Hospital\Controller\Adminhtml\Hospitals;

class Delete extends Hospitals
{
    public function execute()
    {
        $hospitalId = (int) $this->getRequest()->getParam('id');

        if ($hospitalId) {
            /** @var $hospitalModel \Thanhtrung1999\Hospital\Model\Hospitals */
            $hospitalModel = $this->_hospitalsFactory->create();
            $hospitalModel->load($hospitalId);

            // Check this news exists or not
            if (!$hospitalModel->getId()) {
                $this->messageManager->addError(__('This news no longer exists.'));
            } else {
                try {
                    // Delete news
                    $hospitalModel->delete();
                    $this->messageManager->addSuccess(__('The news has been deleted.'));

                    // Redirect to grid page
                    $this->_redirect('*/*/');
                    return;
                } catch (\Exception $e) {
                    $this->messageManager->addError($e->getMessage());
                    $this->_redirect('*/*/edit', ['id' => $hospitalModel->getId()]);
                }
            }
        }
    }
}
