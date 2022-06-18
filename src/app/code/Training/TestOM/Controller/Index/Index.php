<?php

namespace Training\TestOm\Controller\Index;

class Index implements \Magento\Framework\App\Action\HttpGetActionInterface
{
    /** @var \Magento\Framework\Controller\Result\RawFactory $_pageFactory */
    protected $_rawFactory;
    /** @var \Training\TestOM\Model\PlayWithTest $_playWithTest */
    protected $_playWithTest;

    /**
     * @param \Magento\Framework\Controller\Result\RawFactory $pageFactory
     * @param \Training\TestOM\Model\PlayWithTest $playWithTest
     */
    public function __construct(
        \Magento\Framework\Controller\Result\RawFactory $pageFactory,
        \Training\TestOM\Model\PlayWithTest $playWithTest
    ) {
        $this->_rawFactory = $pageFactory;
        $this->_playWithTest = $playWithTest;
    }

    public function execute()
    {
        $result = $this->_rawFactory->create();
        $result->setContents($this->_playWithTest->run());
        return $result;
    }
}
