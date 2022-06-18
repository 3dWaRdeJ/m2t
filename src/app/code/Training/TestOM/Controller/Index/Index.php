<?php

namespace Training\TestOm\Controller\Index;

class Index implements \Magento\Framework\App\Action\HttpGetActionInterface
{
    /** @var \Training\TestOm\Model\Test  $_test*/
    protected $_test;
    /** @var \Magento\Framework\Controller\Result\RawFactory $_pageFactory */
    protected $_rawFactory;

    /**
     * @param \Magento\Framework\View\Result\RawFactory $pageFactory
     * @param \Training\TestOm\Model\Test $test
     */
    public function __construct(
        \Magento\Framework\Controller\Result\RawFactory $pageFactory,
        \Training\TestOm\Model\Test $test
    ) {
        $this->_rawFactory = $pageFactory;
        $this->_test = $test;
    }

    public function execute()
    {
        $result = $this->_rawFactory->create();
        $result->setContents($this->_test->log());
        return $result;
    }
}
