<?php
namespace Thanhtrung1999\Hospital\Block;

use Thanhtrung1999\Hospital\Model\HospitalsFactory;
use Thanhtrung1999\Hospital\Helper\Data;
use Magento\Framework\View\Element\Template\Context;

class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * @var HospitalsFactory
     */
    protected $_hospitalsFactory;

    /**
     * @var Data
     */
    protected $_helperData;

    /**
     * Index constructor.
     * @param Context $context
     * @param HospitalsFactory $hospitalsFactory
     * @param Data $helperData
     */
    public function __construct(Context $context, HospitalsFactory $hospitalsFactory, Data $helperData)
    {
        $this->_hospitalsFactory = $hospitalsFactory;
        $this->_helperData = $helperData;
        parent::__construct($context);
    }

    /**
     * @return mixed
     */
    public function enableShowListHospitals() {
        return $this->_helperData->getGeneralConfig('enable');
    }

    /**
     * @return mixed
     */
    public function getHospitalsCollection(){
        $post = $this->_hospitalsFactory->create();
        return $post->getCollection();
    }
}
