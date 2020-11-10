<?php
namespace Thanhtrung1999\DailyDeal\Block\Adminhtml\Deal\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId('deal_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Deal Information'));

        /*$this->addTab(
            'deal_info',
            [
                'label' => __('General'),
                'content' => $this->getLayout()->createBlock('Thanhtrung1999\DailyDeal\Block\Adminhtml\Deal\Edit\Tab\Info')->toHtml()
            ]
        );
        $this->addTab(
            'attachment_products',
            [
                'label' => __('Select Products'),
                'content' => $this->getLayout()->createBlock('Thanhtrung1999\DailyDeal\Block\Adminhtml\Deal\Edit\Tab\Products')->toHtml()
            ]
        );*/
    }
}
