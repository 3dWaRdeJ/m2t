<?php

namespace Training\Test\Controller\Block;

use Magento\Framework\App\ResponseInterface;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\LayoutFactory
     */
    private $layoutFactory;
    /** @var \Magento\Framework\Controller\Result\RawFactory $rawFactory */
    private $rawFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\LayoutFactory $layoutFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\LayoutFactory $layoutFactory,
        \Magento\Framework\Controller\Result\RawFactory $rawFactory
    ) {
        $this->layoutFactory = $layoutFactory;
        $this->rawFactory = $rawFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $result = $this->rawFactory->create();
        $layout = $this->layoutFactory->create();
        $block = $layout->createBlock(\Training\Test\Block\Test::class);
        $result->setContents($block->toHtml());
        return $result;
    }
}
