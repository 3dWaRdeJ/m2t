<?php

namespace Training\Test\Observer;

use Magento\Framework\Event\Observer;

class LogPageHtml implements \Magento\Framework\Event\ObserverInterface
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;
    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $response = $observer->getEvent()->getData('response');
        $this->logger->debug($response->getBody());
    }
}
