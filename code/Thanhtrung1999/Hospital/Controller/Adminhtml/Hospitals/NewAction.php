<?php
namespace Thanhtrung1999\Hospital\Controller\Adminhtml\Hospitals;

use Thanhtrung1999\Hospital\Controller\Adminhtml\Hospitals;

class NewAction extends Hospitals
{
    /**
     * Create new news action
     *
     * @return void
     */
    public function execute()
    {
        $this->_forward('edit');
    }
}
