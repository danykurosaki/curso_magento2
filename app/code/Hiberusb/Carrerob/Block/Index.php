<?php

namespace Hiberusb\Carrerob\Block;

use Hiberusb\Carrerob\Api\CarreroRepositoryInterface;
use Hiberusb\Carrerob\Model\Carrerob;
use Magento\Framework\View\Element\Template;
use Hiberusb\Carrerob\Api\Data\CarreroInterfaceFactory;

class Index extends Template{
    protected $registry;
    protected $curso;
    protected $cursoRepository;
    protected $cursoInterfaceFactory;
    protected $cursoResource;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        Carrerob $curso,
        CarreroRepositoryInterface $cursoRepository,
        CarreroInterfaceFactory $cursoInterfaceFactory,
        \Hiberusb\Carrerob\Model\ResourceModel\Carrerob $cursoResource,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->curso = $curso;
        $this->cursoRepository = $cursoRepository;
        $this->cursoInterfaceFactory = $cursoInterfaceFactory;
        $this->cursoResource = $cursoResource;
        parent::__construct($context, $data);
    }

    public function getAlumnos() {
        $collection = $this->curso->getCollection();
        return $collection->getData();
    }
    public function getMedia($array){
        $countMarks=count($array);
        $sumMarks=0;
        foreach($array as $row){
            $sumMarks += $row['mark'];
        }
        return $sumMarks/$countMarks;
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
