<?php
namespace Thanhtrung1999\Hospital\Block\Adminhtml;

class Hospitals extends \Magento\Backend\Block\Widget\Grid\Container
{

    protected function _construct()
    {
        $this->_controller = 'adminhtml_hospitals';
        $this->_blockGroup = 'Thanhtrung1999_Hospital';
        $this->_headerText = __('Manage Hospitals');
        $this->_addButtonLabel = __('Create New Hospital');
        parent::_construct();
    }
}
