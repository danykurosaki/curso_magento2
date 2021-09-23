<?php
namespace Hiberusb\Carrerob\Model\ResourceModel\Carrerob;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Hiberusb\Carrerob\Model\Carrerob',
            'Hiberusb\Carrerob\Model\ResourceModel\Carrerob'
        );
    }
}
