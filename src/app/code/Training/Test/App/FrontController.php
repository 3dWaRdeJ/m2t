<?php

namespace Training\Test\App;

use Magento\Framework\App\ActionFlag;
use Magento\Framework\App\AreaList;
use Magento\Framework\App\Request\ValidatorInterface as RequestValidator;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\RouterListInterface;
use Magento\Framework\App\State;
use Magento\Framework\Event\ManagerInterface as EventManagerInterface;
use Magento\Framework\Message\ManagerInterface as MessageManager;
use Psr\Log\LoggerInterface;

class FrontController extends \Magento\Framework\App\FrontController
{
    /**
     * @var \Magento\Framework\App\RouterListInterface
     */
    protected $routerList;
    /**
     * @var \Magento\Framework\App\ResponseInterface
     */
    protected $response;
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;
    /**
     * @param \Magento\Framework\App\RouterListInterface $routerList
     * @param \Magento\Framework\App\ResponseInterface $response
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        RouterListInterface $routerList,
        ResponseInterface $response,
        LoggerInterface $logger,
        ?RequestValidator $requestValidator = null,
        ?MessageManager $messageManager = null,
        ?State $appState = null,
        ?AreaList $areaList = null,
        ?ActionFlag $actionFlag = null,
        ?EventManagerInterface $eventManager = null,
        ?RequestInterface $request = null
    ) {
        $this->routerList = $routerList;
        $this->response = $response;
        $this->logger = $logger;
        parent::__construct($routerList, $response, $requestValidator, $messageManager, $logger, $appState, $areaList, $actionFlag, $eventManager, $request);
    }

    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        foreach ($this->routerList as $router) {
            $this->logger->info(get_class($router));
        }
        return parent::dispatch($request);
    }
}
