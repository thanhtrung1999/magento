<?php
namespace Thanhtrung1999\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\DataObject;

class Test extends Action
{

    public function execute()
    {
        $textDisplay = new DataObject([
            'text' => 'Tigren',
            'string' => 'Trung'
        ]);
        $this->_eventManager->dispatch('thanhtrung1999_helloworld_display_text', ['mp_text' => $textDisplay]);
        echo $textDisplay->getText() . "<br/>";
        echo $textDisplay->getString();
        exit;
    }
}
