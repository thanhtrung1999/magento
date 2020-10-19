<?php

namespace Thanhtrung1999\Hospital\Controller\Adminhtml\Hospitals;

use Thanhtrung1999\Hospital\Controller\Adminhtml\Hospitals;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Thanhtrung1999\Hospital\Model\HospitalsFactory;
use Thanhtrung1999\Hospital\Model\ResourceModel\HospitalsFactory as resHospitalsFactory;

class MassDelete extends Hospitals
{
    protected $_resPostsFactory;

    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        HospitalsFactory $hospitalsFactory,
        resHospitalsFactory $resHospitalsFactory
    )
    {
        parent::__construct($context, $coreRegistry, $resultPageFactory, $hospitalsFactory);
        $this->_resPostsFactory = $resHospitalsFactory;
    }

    public function execute()
    {
        $hospitalIds = $this->getRequest()->getParam('ids', array());
        $model = $this->_hospitalsFactory->create();
        $resModel = $this->_resPostsFactory->create();
        if (count($hospitalIds)) {
            $i = 0;
            foreach ($hospitalIds as $hospitalId) {
                try {
                    $resModel->load($model, $hospitalId);
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
        } else {
            $this->messageManager->addErrorMessage(
                __('You can not delete item(s), Please check again %1')
            );
        }
        $this->_redirect('*/*/index');
    }
}

