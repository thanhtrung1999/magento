<?php
namespace Thanhtrung1999\DailyDeal\Controller\Adminhtml\Deal;

use Magento\Backend\App\Action\Context;
use Thanhtrung1999\DailyDeal\Controller\Adminhtml\Deal;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Backend\Helper\Js
     */
    protected $_jsHelper;

    /**
     * @var \Thanhtrung1999\DailyDeal\Model\ResourceModel\Deal\CollectionFactory
     */
    protected $_dealCollectionFactory;

    /**
     * \Magento\Backend\Helper\Js $jsHelper
     * @param Context $context
     */
    public function __construct(
        Context $context,
        \Magento\Backend\Helper\Js $jsHelper,
        \Thanhtrung1999\DailyDeal\Model\ResourceModel\Deal\CollectionFactory $dealCollectionFactory
    ) {
        $this->_jsHelper = $jsHelper;
        $this->_dealCollectionFactory = $dealCollectionFactory;
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return true;
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /*echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;*/

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {

            /** @var \Thanhtrung1999\DailyDeal\Model\deal $model */
            $model = $this->_objectManager->create('Thanhtrung1999\DailyDeal\Model\Deal');

            $id = $this->getRequest()->getParam('deal_id');
            if ($id) {
                $model->load($id);
            }

            $dataDeal = $data['deal'];
            $model->setData($dataDeal);

            try {
                $model->save();
                $this->saveProducts($model, $data);

                $this->messageManager->addSuccess(__('You saved this deal.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['deal_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the deal.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['deal_id' => $this->getRequest()->getParam('deal_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    public function saveProducts($model, $post)
    {
        // Attach the attachments to deal
        if (isset($post['products'])) {
            $productIds = $this->_jsHelper->decodeGridSerializedInput($post['products']);
            try {
                $oldProducts = (array) $model->getProducts($model);
                $newProducts = (array) $productIds;

                $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\App\ResourceConnection');
                $connection = $this->_resources->getConnection();

                $table = $this->_resources->getTableName(\Thanhtrung1999\DailyDeal\Model\ResourceModel\Deal::TBL_ATT_PRODUCT);
                $insert = array_diff($newProducts, $oldProducts);
                $delete = array_diff($oldProducts, $newProducts);

                if ($delete) {
                    $where = ['deal_id = ?' => (int)$model->getId(), 'product_id IN (?)' => $delete];
                    $connection->delete($table, $where);
                }

                if ($insert) {
                    $data = [];
                    foreach ($insert as $product_id) {
                        $data[] = ['deal_id' => (int)$model->getId(), 'product_id' => (int)$product_id];
                    }
                    $connection->insertMultiple($table, $data);
                }
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the deal.'));
            }
        }

    }
}
