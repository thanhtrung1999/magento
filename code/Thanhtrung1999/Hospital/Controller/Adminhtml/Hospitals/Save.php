<?php
namespace Thanhtrung1999\Hospital\Controller\Adminhtml\Hospitals;

use Thanhtrung1999\Hospital\Controller\Adminhtml\Hospitals;

class Save extends Hospitals
{
    /**
     * @return void
     */
    public function execute()
    {
        $isPost = $this->getRequest()->getPost();

        if ($isPost) {
            $hospitalsModel = $this->_hospitalsFactory->create();
            $hospitalsId = $this->getRequest()->getParam('id');

            if ($hospitalsId) {
                $hospitalsModel->load($hospitalsId);
            }
            $formData = $this->getRequest()->getParam('hospitals');
            $hospitalsModel->setData($formData);

            try {
                // Save news
                $hospitalsModel->save();

                // Display success message
                $this->messageManager->addSuccess(__('The news has been saved.'));

                // Check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', ['id' => $hospitalsModel->getId(), '_current' => true]);
                    return;
                }

                // Go to grid page
                $this->_redirect('*/*/');
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }

            $this->_getSession()->setFormData($formData);
            $this->_redirect('*/*/edit', ['id' => $hospitalsId]);
        }
    }
}
