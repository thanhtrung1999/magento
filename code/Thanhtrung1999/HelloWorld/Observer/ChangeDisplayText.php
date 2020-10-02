<?php
namespace Thanhtrung1999\HelloWorld\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class ChangeDisplayText implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $displayText = $observer->getData('mp_text');
        echo $displayText->getText() . " - Event </br>";
        $displayText->setText('Execute event successfully.');

        return $this;
    }
}
