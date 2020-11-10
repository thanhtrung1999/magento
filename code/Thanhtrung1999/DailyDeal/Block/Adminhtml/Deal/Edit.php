<?php
namespace Thanhtrung1999\DailyDeal\Block\Adminhtml\Deal;

use Magento\Backend\Block\Widget\Form\Container;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;

class Edit extends Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Class constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'deal_id';
        $this->_controller = 'adminhtml_deal';
        $this->_blockGroup = 'Thanhtrung1999_DailyDeal';

        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save'));
        $this->buttonList->add(
            'saveandcontinue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => [
                            'event' => 'saveAndContinueEdit',
                            'target' => '#edit_form'
                        ]
                    ]
                ]
            ],
            -100
        );
        $this->buttonList->update('delete', 'label', __('Delete'));
    }

    /*
     * Thêm 2 function bên dưới
     */

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

    /**
     * Getter of url for "Save and Continue" button
     * tab_id will be replaced by desired by JS later
     *
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('tigren/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '']);
    }

    /**
     * Retrieve text for header element depending on loaded news
     *
     * @return string
     */
    public function getHeaderText()
    {
        $deal = $this->_coreRegistry->registry('deal_blog');
        if ($deal->getId()) {
            $dealTitle = $this->escapeHtml($deal->getTitle());
            return __("Edit News '%1'", $dealTitle);
        } else {
            return __('Add News');
        }
    }

    /**
     * Prepare layout
     *
     * @return \Magento\Framework\View\Element\AbstractBlock
     */
    protected function _prepareLayout()
    {
        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('deal_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'deal_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'deal_content');
                }
            };
        ";

        return parent::_prepareLayout();
    }
}
