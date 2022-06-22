<?php

namespace Training\Test\Observer;

use Magento\Framework\Event\Observer;

class RedirectToLogin implements \Magento\Framework\Event\ObserverInterface
{
    /** @var \Magento\Framework\App\Response\RedirectInterface $_redirect */
    private $_redirect;
    /** @var \Magento\Framework\App\ActionFlag $_actionFlag */
    private $_actionFlag;
    /**
     * @param \Magento\Framework\App\Response\RedirectInterface $redirect
     * @param \Magento\Framework\App\ActionFlag $actionFlag
     */
    public function __construct(
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        \Magento\Framework\App\ActionFlag $actionFlag
    ) {
        $this->_redirect = $redirect;
        $this->_actionFlag = $actionFlag;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $request = $observer->getEvent()->getData('request');
        if ($request->getFullActionName() === 'catalog_product_view') {
            $controller = $observer->getEvent()->getData('controller_action');
            $this->_actionFlag->set('', \Magento\Framework\App\ActionInterface::FLAG_NO_DISPATCH, true);
            $this->_redirect->redirect($controller->getResponse(), 'customer/account/login');
        }
    }
}
