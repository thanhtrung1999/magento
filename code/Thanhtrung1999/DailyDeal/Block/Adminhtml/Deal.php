<?php
namespace Thanhtrung1999\DailyDeal\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;

class Deal extends Container
{
    /*protected function _construct()
    {
        $this->_controller = 'adminhtml_deal';
        $this->_blockGroup = 'Thanhtrung1999_DailyDeal';
        $this->_headerText = __('Deals');
        $this->_addButtonLabel = __('Add New Deal');
        parent::_construct();
    }*/

    /*
     * Hàm _construct sửa lại
     */
    protected function _construct()
    {
        parent::__construct($context, $data); // TODO: Change the autogenerated stub
    }

    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}