<?php

namespace Hiberusb\Carrerob\Block;

use Hiberusb\Carrerob\Api\CarreroRepositoryInterface;
use Hiberusb\Carrerob\Model\Carrerob;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Hiberusb\Carrerob\Api\Data\CarreroInterfaceFactory;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template\Context;

class Index extends Template{
    protected Registry $registry;
    protected Carrerob $carrerob;
    protected CarreroRepositoryInterface $carreroRepository;
    protected CarreroInterfaceFactory $carreroInterfaceFactory;
    protected \Hiberusb\Carrerob\Model\ResourceModel\Carrerob $carreroResource;
    protected ScopeConfigInterface $scopeConfig;

    public function __construct(
        Context $context,
        Registry $registry,
        Carrerob $carrerob,
        CarreroRepositoryInterface $carreroRepository,
        CarreroInterfaceFactory $carreroInterfaceFactory,
        \Hiberusb\Carrerob\Model\ResourceModel\Carrerob $carreroResource,
        array $data = [],
        ScopeConfigInterface $scopeConfig
    ) {
        $this->registry = $registry;
        $this->carrerob = $carrerob;
        $this->cursoRepository = $carreroRepository;
        $this->cursoInterfaceFactory = $carreroInterfaceFactory;
        $this->cursoResource = $carreroResource;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    /**
     * @return array|null
     */
    public function getAlumnos() {
        $pageSize=$this->scopeConfig->getValue('hiberus_proyecto/general/max_elements');
        $collection = $this->carrerob->getCollection()->setPageSize($pageSize);
        return $collection->getData();
    }

    /**
     * @param $array
     * @return float
     */
    public function getMedia($array){
        $countMarks=count($array);
        $sumMarks=0;
        foreach($array as $row){
            $sumMarks += $row['mark'];
        }
        return round($sumMarks/$countMarks,2);
    }

    /**
     * @param $array
     * @return float
     */
    public function getMax($array){
        $maxMark=0;
        foreach($array as $row){
            if ($maxMark<$row['mark']){
                $maxMark = $row['mark'];
            }
        }
        return $maxMark;
    }

    /**
     * @return array
     */
    public function getTop(){
        $topTres = array();
        $collection = $this->carrerob->getCollection()
            ->setOrder('mark','DESC')
            ->getData();
        $topTresFull = array_slice($collection, 0, 3);
        foreach ($topTresFull as $row){
            $topTres[]=$row['id_exam'];
        }
        return $topTres;
    }
}
