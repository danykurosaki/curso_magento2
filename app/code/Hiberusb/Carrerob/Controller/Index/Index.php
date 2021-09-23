<?php

namespace Hiberusb\Carrerob\Controller\Index;
use Hiberusb\Carrerob\Api\CarreroRepositoryInterface;
use Hiberusb\Carrerob\Api\Data\CarreroInterfaceFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Hiberusb\Carrerob\Model\ResourceModel\Carrerob;

class Index implements HttpGetActionInterface
{

    protected \Magento\Framework\View\Result\PageFactory $pageFactory;
    protected CarreroRepositoryInterface $cursoRepository;
    protected CarreroInterfaceFactory $cursoInterfaceFactory;
    protected Carrerob $cursoResource;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        CarreroRepositoryInterface $cursoRepository,
        CarreroInterfaceFactory $cursoInterfaceFactory,
        Carrerob $cursoResource

    ) {
        $this->pageFactory = $pageFactory;
        $this->cursoRepository = $cursoRepository;
        $this->cursoInterfaceFactory = $cursoInterfaceFactory;
        $this->cursoResource = $cursoResource;
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }

}
