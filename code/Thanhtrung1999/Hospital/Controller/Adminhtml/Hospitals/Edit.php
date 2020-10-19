<?php
namespace Thanhtrung1999\Hospital\Controller\Adminhtml\Hospitals;

use Thanhtrung1999\Hospital\Controller\Adminhtml\Hospitals;

class Edit extends Hospitals
{
    /**
     * @return void
     */
    public function execute()
    {
        $hospitalId = $this->getRequest()->getParam('id');

        $model = $this->_hospitalsFactory->create();

        if ($hospitalId) {
            $model->load($hospitalId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This news no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        // Restore previously entered form data from session
        $data = $this->_session->getNewsData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('hospital_blog', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Thanhtrung1999::hospitals');
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Hospital Info'));

        return $resultPage;
    }
}
