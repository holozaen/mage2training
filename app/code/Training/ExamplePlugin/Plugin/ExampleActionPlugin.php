<?php

namespace Training\ExamplePlugin\Plugin;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;
use Psr\Log\LoggerInterface;

class ExampleActionPlugin
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var RemoteAddress
     */
    private $remoteAddress;


    /**
     * ExampleActionPlugin constructor.
     * @param LoggerInterface $logger
     * @param RemoteAddress $remoteAddress
     */
    public function __construct(LoggerInterface $logger, RemoteAddress $remoteAddress)
    {
        $this->logger = $logger;
        $this->remoteAddress = $remoteAddress;
    }

    public function beforeDispatch (Action $subject, RequestInterface $request)
    {
        $this->logger->debug($request->getPathInfo(), ['remote_ip' => $this->remoteAddress->getRemoteAddress()]);
        return [$request];
    }

    public function aroundDispatch(Action $subject, callable $proceed, RequestInterface $request)
    {
        $result = $proceed($request);
        return $result;

    }
}