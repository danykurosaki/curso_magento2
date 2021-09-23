<?php

namespace Hiberus\Curso\Model\ResourceModel;

use Hiberus\Curso\Api\Data\CursoInterface;
use Magento\Framework\EntityManager\EntityManager;
use Magento\Framework\EntityManager\MetadataPool;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Curso extends AbstractDb
{

    private MetadataPool $metadataPool;
    private EntityManager $entityManager;

    /**
     * @param Context $context
     * @param MetadataPool $metadataPool
     * @param EntityManager $entityManager
     * @param null $connectionName
     */
    protected function __construct(Context $context, MetadataPool $metadataPool, EntityManager $entityManager, $connectionName = null)
    {
        $this->metadataPool = $metadataPool;
        $this->entityManager = $entityManager;
        parent::__construct($context, $connectionName);
    }

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(CursoInterface::TABLE_NAME, CursoInterface::COLUMN_ID);
    }

    /**
     * @param AbstractModel $object
     * @return $this|Curso
     * @throws \Exception
     */
    public function save(AbstractModel $object)
    {
        $this->entityManager->save($object);
        return $this;
    }

    /**
     * @param AbstractModel $object
     * @param mixed $value
     * @param null $field
     * @return Curso|mixed
     */
    public function load(AbstractModel $object, $value, $field = null)
    {
       return $this->entityManager->load($object, $value);
    }

    /**
     * @param AbstractModel $object
     * @return Curso|void
     * @throws \Exception
     */
    public function delete(AbstractModel $object)
    {
        $this->entityManager->delete($object);
    }
}

