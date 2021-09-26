<?php
namespace Hiberus\Carrero\Model\ResourceModel\Carrerob;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Hiberus\Carrero\Model\Carrerob',
            'Hiberus\Carrero\Model\ResourceModel\Carrerob'
        );
    }
}
