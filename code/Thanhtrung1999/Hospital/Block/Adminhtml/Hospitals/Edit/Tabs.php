<?php
namespace Thanhtrung1999\Hospital\Block\Adminhtml\Hospitals\Edit;

use Magento\Backend\Block\Widget\Tabs as WidgetTabs;

class Tabs extends WidgetTabs
{
    /**
     * Class constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('hospital_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Hospital Information'));
    }

    /**
     * @return $this
     */
    protected function _beforeToHtml()
    {
        $this->addTab(
            'hospital_info',
            [
                'label' => __('General'),
                'title' => __('General'),
                'content' => $this->getLayout()->createBlock(
                    'Thanhtrung1999\Hospital\Block\Adminhtml\Hospitals\Edit\Tab\Info'
                )->toHtml(),
                'active' => true
            ]
        );

        return parent::_beforeToHtml();
    }
}
