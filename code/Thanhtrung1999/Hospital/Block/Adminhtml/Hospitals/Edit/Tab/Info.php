<?php
namespace Thanhtrung1999\Hospital\Block\Adminhtml\Hospitals\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;
//use Thanhtrung1999\Hospital\Model\System\Config\Status;

class Info extends Generic implements TabInterface
{
    /**
     * @var Config
     */
    protected $_wysiwygConfig;

    /**
     * @var Status
     */
    protected $_status;

    /**
     * Info constructor.
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
        Config $wysiwygConfig,
        Status $status,
        array $data = []
    ) {
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_status = $status;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * @return Info
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('hospital_blog');

        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('hospital_');
        $form->setFieldNameSuffix('hospital');
        // new filed

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General')]
        );

        if ($model->getId()) {
            $fieldset->addField(
                'id',
                'hidden',
                ['name' => 'id']
            );
        }
        $fieldset->addField(
            'name',
            'text',
            [
                'name'      => 'name',
                'label'     => __('Hospital\'s Name'),
                'title' => __('Hospital\'s Name'),
                'required' => true
            ]
        );
        $fieldset->addField(
            'address',
            'text',
            [
                'name'      => 'address',
                'label'     => __('Hospital\'s Address'),
                'title' => __('Hospital\'s Address'),
                'required' => true
            ]
        );
        $fieldset->addField(
            'telephone',
            'text',
            [
                'name'      => 'telephone',
                'label'     => __('Telephone'),
                'title' => __('Telephone'),
                'required' => true
            ]
        );

        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|\Magento\Framework\Phrase|string|null
     */
    public function getTabLabel()
    {
        return __('Hospitals Info');
    }

    /**
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|\Magento\Framework\Phrase|string|null
     */
    public function getTabTitle()
    {
        return __('Hospitals Info');
    }

    /**
     * @return bool
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isHidden()
    {
        return false;
    }
}
