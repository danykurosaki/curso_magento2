<?php

namespace Hiberusb\Carrerob\Plugin\Carrerob;

use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 *
 */
class CarrerobPlugin{

    /**
     * @var ScopeConfigInterface
     */
    private ScopeConfigInterface $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ){
        $this->scopeConfig = $scopeConfig;
    }

    public function afterGetAlumnos(
        \Hiberusb\Carrerob\Block\Index $subject,
        $result
    ){
        $minMark=$this->scopeConfig->getValue('hiberus_proyecto/general/min_mark');

        foreach($result as $key=>$row){
            if($row['mark']<$minMark){
                $result[$key]['mark']=$minMark-0.1;
            }
        }
        return $result;
    }


}
