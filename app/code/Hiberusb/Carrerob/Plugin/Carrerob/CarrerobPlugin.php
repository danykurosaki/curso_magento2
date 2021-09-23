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
        foreach($result as $key=>$row){
            if($row['mark']<5){
                $result[$key]['mark']=4.9;
            }
        }
        return $result;
    }


}
