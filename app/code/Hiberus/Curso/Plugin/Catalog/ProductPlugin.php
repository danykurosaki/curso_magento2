<?php

namespace Hiberus\Curso\Plugin\Catalog;

use Hiberus\Curso\Model\Author;
use Magento\Framework\App\Config\ScopeConfigInterface;


class ProductPlugin{

    private ScopeConfigInterface $scopeConfig;
    private Author $author;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param Author $author
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Author $author
    ){
        $this->scopeConfig = $scopeConfig;
        $this->author = $author;
    }


    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return string
     */
    public function afterGetName(
        \Magento\Catalog\Model\Product $subject,
        $result
    ){
        //$result = "Prueba de plugin";
        $nombreGeneral = $this->scopeConfig->getValue('hiberus_nombre/general/nombre_general');
        $result = $result . ' ' . $nombreGeneral;
        //$result = $result . ' ' . $this->author->getAuthorName();
        return $result;
    }

    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return string
     */
    /*public function afterGetPrice(
        \Magento\Catalog\Model\Product $subject,
                                       $result
    ){
        //die(var_dump("$result"));
        $result = \strval($result)."/unidad";
        //$result = 12;

        return $result;
    }*/
}
