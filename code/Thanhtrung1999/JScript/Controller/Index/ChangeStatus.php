<?php
namespace Thanhtrung1999\JScript\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Thanhtrung1999\HelloWorld\Model\PostFactory;

class ChangeStatus extends Action
{
    /**
     * @var PageFactory $pageFactory
     */
    protected $_pageFactory;

    /**
     * @var JsonFactory
     */
    protected $jsonFactory;

    /**
     * @var PostFactory
     */
    protected $_postFactory;

    /**
     * @var \Thanhtrung1999\HelloWorld\Model\ResourceModel\PostFactory
     */
    protected $_resPostsFactory;

    /**
     * HelloWorld constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param JsonFactory $jsonFactory
     * @param PostFactory $postFactory
     * @param \Thanhtrung1999\HelloWorld\Model\ResourceModel\PostFactory $resPostsFactory
     */
    public function __construct
    (    Context $context,
         PageFactory $pageFactory,
         JsonFactory $jsonFactory,
         PostFactory $postFactory,
         \Thanhtrung1999\HelloWorld\Model\ResourceModel\PostFactory $resPostsFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->jsonFactory = $jsonFactory;
        $this->_postFactory = $postFactory;
        $this->_resPostsFactory = $resPostsFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $postId = $this->getRequest()->getParam('post_id',0);
        $response = [
            'status'=>'error',
            'message'=>'error',
            'new_status'=>1
        ];
        if((int)$postId > 0)
        {
            $postModel = $this->_postFactory->create();
            $resPostModel = $this->_resPostsFactory->create();

            $resPostModel->load($postModel,$postId);
            if($postModel && $postModel->getId())
            {
                $currentChange = $postModel->getData('status');
                if($currentChange == 0){
                    $currentChange = 1;
                } else {
                    $currentChange = 0;
                }
                $postModel->setData('status',$currentChange);
                try {
                    $resPostModel->save($postModel);
                    $response['status'] = 'success';
                    $response['message'] = 'success';
                    $response['new_status'] = $currentChange;
                }
                catch (\Exception $exception)
                {

                }
            }
        }
        return $this->jsonFactory->create()->setData($response);
    }
}
