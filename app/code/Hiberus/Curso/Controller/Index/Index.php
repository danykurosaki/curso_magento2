<?php

namespace Hiberus\Curso\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use  \Hiberus\Curso\Model\Curso\Factory;

class Index implements HttpGetActionInterface
{
    protected PageFactory $pageFactory;
    protected Curso $curso;

    public function __construct(\Magento\Framework\App\Action\Context $contex, PageFactory $pageFactory, CursoFactory $cursoFactory)
    {
        $this->pageFactory = $pageFactory;
        $this->cursoFactory = $cursoFactory;
    }

    public function execute()
    {
       // return $this->pageFactory->create();
        $curso = $this->cursoFactory->create()
            ->addFieldtoFilter('nombre','Prueba');
        $curso->getSelect();
        $collection = $curso->getCollection();
        foreach ($collection as $item){
            echo $item-getData();
        }
        return $this->pageFactory->create();
    }

}
