<?php
namespace Thanhtrung1999\Catalog\Setup;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Cms\Api\Data\BlockInterfaceFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallData implements \Magento\Framework\Setup\InstallDataInterface {
    protected $searchCriteriaBuilder;
    protected $blockRepository;
    protected $blockFactory;

    public function __construct(SearchCriteriaBuilder $searchCriteriaBuilder,
                                BlockRepositoryInterface $blockRepository,
                                BlockInterfaceFactory $blockFactory) {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->blockRepository = $blockRepository;
        $this->blockFactory = $blockFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('identifier', 'size-guide', 'eq')
            ->create();
        $blocks = $this->blockRepository->getList($searchCriteria)->getItems();
        if (empty($blocks)) {
            /* @var \Magento\Cms\Api\Data\BlockInterface $block */
            $block = $this->blockFactory->create();
            $block->setIdentifier('size-guide');
            $block->setTitle('Size Guide');
            $block->setContent('Size guide!');
            $this->blockRepository->save($block);
        }
        $setup->endSetup();
    }
}
