<?php

namespace Hiberusb\Carrerob\Block;

use Hiberusb\Carrerob\Api\CarreroRepositoryInterface;
use Hiberusb\Carrerob\Model\Carrerob;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Hiberusb\Carrerob\Api\Data\CarreroInterfaceFactory;

class Index extends Template{
    protected $registry;
    protected $curso;
    protected $cursoRepository;
    protected $cursoInterfaceFactory;
    protected $cursoResource;
    protected $scopeConfig;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        Carrerob $curso,
        CarreroRepositoryInterface $cursoRepository,
        CarreroInterfaceFactory $cursoInterfaceFactory,
        \Hiberusb\Carrerob\Model\ResourceModel\Carrerob $cursoResource,
        array $data = [],
        ScopeConfigInterface $scopeConfig

    ) {
        $this->registry = $registry;
        $this->curso = $curso;
        $this->cursoRepository = $cursoRepository;
        $this->cursoInterfaceFactory = $cursoInterfaceFactory;
        $this->cursoResource = $cursoResource;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getAlumnos() {
        $pageSize=$this->scopeConfig->getValue('hiberus_proyecto/general/max_elements');

        $collection = $this->curso->getCollection()->setPageSize($pageSize);
        return $collection->getData();
    }
    public function getMedia($array){
        $countMarks=count($array);
        $sumMarks=0;
        foreach($array as $row){
            $sumMarks += $row['mark'];
        }
        return round($sumMarks/$countMarks,2);
    }

    public function getMax($array){
        $maxMark=0;
        foreach($array as $row){
            if ($maxMark<$row['mark']){
                $maxMark = $row['mark'];
            }
        }
        return $maxMark;
    }
}
