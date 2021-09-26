<?php

namespace Hiberus\Carrero\Model\ResourceModel;

use Hiberus\Carrero\Api\Data\CarreroInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Carrerob extends AbstractDb
{

    /**
     * @var \Magento\Framework\EntityManager\MetadataPool
     */
    private \Magento\Framework\EntityManager\MetadataPool $metadataPool;
    /**
     * @var \Magento\Framework\EntityManager\EntityManager
     */
    private \Magento\Framework\EntityManager\EntityManager $entityManager;

    /**
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     * @param \Magento\Framework\EntityManager\MetadataPool $metadataPool
     * @param \Magento\Framework\EntityManager\EntityManager $entityManager
     * @param null $connectionName
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Framework\EntityManager\MetadataPool $metadataPool,
        \Magento\Framework\EntityManager\EntityManager $entityManager,
        $connectionName = null
    ) {
        $this->metadataPool = $metadataPool;
        $this->entityManager = $entityManager;

        parent::__construct($context, $connectionName);
    }

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(CarreroInterface::TABLE_NAME, CarreroInterface::COLUMN_ID);
    }

    /**
     * @param AbstractModel $object
     * @return $this|AbstractDb
     * @throws \Exception
     */
    public function save(AbstractModel $object) {
        $this->entityManager->save($object);

        return $this;
    }

    /**
     * @param AbstractModel $object
     * @param mixed $value
     * @param null $field
     * @return AbstractDb|mixed
     */
    public function load(AbstractModel $object, $value, $field = null) {
        return $this->entityManager->load($object, $value);
    }

    /**
     * @param AbstractModel $object
     * @return AbstractDb|void
     * @throws \Exception
     */
    public function delete(AbstractModel $object) {
        $this->entityManager->delete($object);
    }

}
