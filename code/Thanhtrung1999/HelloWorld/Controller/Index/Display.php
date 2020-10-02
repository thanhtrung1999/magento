<?php
namespace Thanhtrung1999\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Thanhtrung1999\HelloWorld\Model\PostFactory;

class Display extends Action
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;
    /**
     * @var
     */
    protected $_postFactory;

    /**
     * Display constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param PostFactory $postFactory
     */
    public function __construct(Context $context, PageFactory $pageFactory, PostFactory $postFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }

    public function create(){
       $data = [
           'name'         => "AAA",
           'post_content' => "Content A",
           'status'       => 1
       ];
       $postModel = $this->_postFactory->create();
       $postModel->addData($data)->save();
    }

    public function update(){
        $postModel = $this->_postFactory->create();
        $item = $postModel->load(2);
        $data_setting = [
            'name' => "FFF",
            'post_content' => "Content F",
        ];
        foreach ($data_setting as $key => $value){
            $item->setData($key, $value);
        }
//        $content = "For a particular page, its layout is defined by two major layout components: page layout file and page configuration file. <br/>
//                    A page layout file defines the page wireframe, for example, one-column layout. Technically page layout is an .xml file defining the structure inside the " . htmlentities("<body/>; ") . "section of the HTML page markup. Page layouts feature only containers. All page layouts used for page rendering should be declared in the page layout declaration file. <br/>
//                    Page configuration is also an .xml file. It defines the detailed structure (page header, footer, etc.), contents and page meta information, including the page layout used. Page configuration features both main elements, blocks and containers. </br>
//                    We also distinguish the third type of layout files, generic layouts. They are .xml files which define the contents and detailed structure inside the " . htmlentities("<body/>; ") . "section of the HTML page markup. These files are used for pages returned by AJAX requests, emails, HTML snippets and so on. <br/>
//                    This article gives a comprehensive description of each layout file type.";
//        $item->setData('post_content',$content);
        $postModel->save();
    }

    public function delete(){
        $postModel = $this->_postFactory->create();
        $item_1 = $postModel->load(4);
        $item_1->delete();
        $postModel->save();
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
//        $this->create();
//        $this->update();
//        $this->delete();
        return $this->_pageFactory->create();
    }
}
