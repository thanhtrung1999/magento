<?php
namespace Thanhtrung1999\DailyDeal\Controller\Adminhtml\Deal;

use Thanhtrung1999\DailyDeal\Controller\Adminhtml\Deal;

class Edit extends Deal
{
    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $dealId = $this->getRequest()->getParam('deal_id');
//        $model = $this->_dealFactory->create();
        $model = $this->_objectManager->create('Thanhtrung1999\DailyDeal\Model\Deal');

        if ($dealId) {
            $model->load($dealId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This deals no longer exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
//                $this->_redirect('*/*/');
//                return;
            }
        }

//        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        $data = $this->_session->getNewsData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('deal_blog', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $dealId ? __('Edit Deal') : __('New Deal'),
            $dealId ? __('Edit Deal') : __('New Deal')
        );
        $resultPage->setActiveMenu('Thanhtrung1999_DailyDeal::daily_deal');
        $resultPage->getConfig()->getTitle()->prepend(__('Deal'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getTitle() : __('New Deal'));

        return $resultPage;
    }
}
