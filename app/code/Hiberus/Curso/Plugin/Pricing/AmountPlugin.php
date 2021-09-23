<?php

namespace Hiberus\Curso\Plugin\Pricing;

class AmountPlugin{


    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return string
     */
    public function afterGetName(
        \Magento\Catalog\Model\Product $subject,
       $result
    ){
        $result .= "/unidad";
        return $result;
    }
}

