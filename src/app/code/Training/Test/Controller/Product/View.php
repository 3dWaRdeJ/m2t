<?php

namespace Training\Test\Controller\Product;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Design;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Json\Helper\Data;
use Magento\Framework\View\Result\PageFactory;
use Magento\Store\Model\StoreManagerInterface;
use Psr\Log\LoggerInterface;

class View extends \Magento\Catalog\Controller\Product\View
{
    /** @var \Magento\Customer\Model\Session $customerSession */
    private $customerSession;
    /** @var RawFactory $rawFactory */
    private $rawFactory;

    public function __construct(
        Context $context,
        \Magento\Catalog\Helper\Product\View $viewHelper,
        PageFactory $resultPageFactory,
        RawFactory $rawFactory,
        ForwardFactory $resultForwardFactory,
        \Magento\Customer\Model\Session $customerSession,
        ?LoggerInterface $logger = null,
        ?Data $jsonHelper = null,
        ?Design $catalogDesign = null,
        ?ProductRepositoryInterface $productRepository = null,
        ?StoreManagerInterface $storeManager = null
    ) {
        $this->customerSession = $customerSession;
        $this->rawFactory = $rawFactory;
        parent::__construct($context, $viewHelper, $resultForwardFactory, $resultPageFactory, $logger, $jsonHelper, $catalogDesign, $productRepository, $storeManager);
    }

    public function execute()
    {
        parent::execute();
        $result = $this->rawFactory->create();
        $result->setContents($this->_view->getLayout()->getUpdate()->asSimplexml()->asXML());
        $result->setHeader('Content-Type', 'text/xml');
        return $result;
    }
}
