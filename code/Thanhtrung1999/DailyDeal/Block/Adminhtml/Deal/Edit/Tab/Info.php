<?php
namespace Thanhtrung1999\DailyDeal\Block\Adminhtml\Deal\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;
use Thanhtrung1999\DailyDeal\Model\System\Config\Status;
use Thanhtrung1999\DailyDeal\Helper\Data;

class Info extends Generic implements TabInterface
{
    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    protected $_wysiwygConfig;

    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $store;

    /**
     * @var \Thanhtrung1999\DailyDeal\Helper\Data $helper
     */
    protected $helper;

    /**
     * @var \Thanhtrung1999\DailyDeal\Model\System\Config\Status
     */
    protected $_status;

    /**
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param Config $wysiwygConfig
     * @param Status $status
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Data $helper,
        Config $wysiwygConfig,
        Status $status,
        array $data = []
    ) {
        $this->helper = $helper;
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_status = $status;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form fields
     *
     * @return \Magento\Backend\Block\Widget\Form
     */
    protected function _prepareForm()
    {
        /** @var $model \Thanhtrung1999\DailyDeal\Model\Deal */
        $model = $this->_coreRegistry->registry('deal_blog');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('deal_');
        $form->setFieldNameSuffix('deal');
        // new filed

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General')]
        );

        if ($model->getId()) {
            $fieldset->addField(
                'deal_id',
                'hidden',
                ['name' => 'deal_id']
            );
        }
        $fieldset->addField(
            'deal-status',
            'select',
            [
                'name'      => 'deal_status',
                'label'     => __('Deal status'),
                'options'   => $this->_status->toOptionArray()
            ]
        );
        $fieldset->addField(
            'deal-price',
            'text',
            [
                'name'      => 'deal_price',
                'label'     => __('Deal price'),
                'title' => __('Deal price'),
                'class' => 'validate-number',
                'required' => true
            ]
        );
        $fieldset->addField(
            'deal-quantity',
            'text',
            [
                'name'      => 'deal_quantity',
                'label'     => __('Deal quantity'),
                'title' => __('Deal quantity'),
                'class' => 'validate-number',
                'required' => true
            ]
        );
        $fieldset->addField(
            'deal-start',
            'date',
            array(
                'name'      => 'deal_time_start',
                'label'     => __('Deal start'),
                'title' => __('Deal start'),
                'input_format' => \Magento\Framework\Stdlib\DateTime::DATETIME_INTERNAL_FORMAT,
                'date_format' => 'dd-MM-yyyy',
                'time_format' => 'HH:mm:ss',
                'required' => true
            )
        );
        $fieldset->addField(
            'deal-end',
            'date',
            array(
                'name'      => 'deal_time_end',
                'label'     => __('Deal end'),
                'title' => __('Deal end'),
                'input_format' => \Magento\Framework\Stdlib\DateTime::DATETIME_INTERNAL_FORMAT,
                'date_format' => 'dd-MM-yyyy',
                'time_format' => 'HH:mm:ss',
                'required' => true
            )
        );
        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();
    }
    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Deal Info');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Deal Info');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
