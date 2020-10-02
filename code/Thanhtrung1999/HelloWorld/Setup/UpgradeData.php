<?php

namespace Thanhtrung1999\HelloWorld\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Thanhtrung1999\HelloWorld\Model\PostFactory;

class UpgradeData implements UpgradeDataInterface
{
    protected $_postFactory;

    public function __construct(PostFactory $postFactory)
    {
        $this->_postFactory = $postFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.3.3', '<')) {
            $post_content = htmlentities("For a particular page, its layout is defined by two major layout components: page layout file and page configuration file.
                                    A page layout file defines the page wireframe, for example, one-column layout. Technically page layout is an .xml file defining the structure inside the <body/>; section of the HTML page markup. Page layouts feature only containers. All page layouts used for page rendering should be declared in the page layout declaration file.
                                    Page configuration is also an .xml file. It defines the detailed structure (page header, footer, etc.), contents and page meta information, including the page layout used. Page configuration features both main elements, blocks and containers.
                                    We also distinguish the third type of layout files, generic layouts. They are .xml files which define the contents and detailed structure inside the <body/>; section of the HTML page markup. These files are used for pages returned by AJAX requests, emails, HTML snippets and so on.
                                    This article gives a comprehensive description of each layout file type.");
            $data = [
                [
                    'name'         => "Magento 2.3 Layout Docs",
                    'post_content' => "In Magento, the basic components of page design are layouts, containers, and blocks. A layout represents the structure of a web page (1). Containers represent the placeholders within that web page structure (2). And blocks represent the UI controls or components within the container placeholders (3). These terms are illustrated and defined below. The objective is to create a structured, common set of layout instructions to render pages. Most pages on a website can be categorized as a 1 column, 2 column, or 3 column layout.
                                   <br/> These page layouts can applied to a page from within the admin panel.",
                    'url_key'      => '/guides/v2.3/frontend-dev-guide/layouts/layout-overview.html',
                    'tags'         => 'magento 2.3,mageplaza helloworld',
                    'status'       => 1
                ],
                [
                    'name'         => "Magento 2.3 Layout file types Docs",
                    'post_content' => $post_content,
                    'url_key'      => 'guides/v2.3/frontend-dev-guide/layouts/layout-types.html?itm_source=devdocs&itm_medium=search_page&itm_campaign=federated_search&itm_term=layout',
                    'tags'         => 'magento 2.3,mageplaza helloworld',
                    'status'       => 1
                ]
            ];
            $post = $this->_postFactory->create();
            foreach ($data as $item) {
                $post->addData($item)->save();
            }
        }
    }
}
