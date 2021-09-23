<?php

namespace Hiberus\Carrero\Plugin\Catalog;

use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 *
 */
class ProductPlugin{

    /**
     * @var ScopeConfigInterface
     */
    private ScopeConfigInterface $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ){
        $this->scopeConfig = $scopeConfig;
    }



    public function afterLoad(
        \Magento\Catalog\Model\Product $subject,
        $result
    ){
        $texto = $this->scopeConfig->getValue('carrero_proyecto/general/texto_general');
        $numero = $this->scopeConfig->getValue('carrero_proyecto/generalDos/numero_general');
        $subject->setData('description', $result->getDescription(). $texto .' '. $numero);
    }


}
