<?php

namespace Hiberus\Carrero\Model;

use Hiberus\Carrero\Api\CarreroRepositoryInterface;
use Hiberus\Carrero\Api\Data\CarreroInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use \Magento\Framework\App\RequestInterface;

class CarreroRepository implements CarreroRepositoryInterface
{

    protected ResourceModel\Carrerob $carreroResource;
    protected \Hiberus\Carrero\Api\Data\CarreroInterfaceFactory $carreroInterfaceFactory;
    protected Carrerob $carrerob;

    /**
     * @param ResourceModel\Carrerob $carreroResource
     * @param \Hiberus\Carrero\Api\Data\CarreroInterfaceFactory $carreroInterfaceFactory
     */
    public function __construct(
        \Hiberus\Carrero\Model\ResourceModel\Carrerob $resourceCarrero,
        \Hiberus\Carrero\Api\Data\CarreroInterfaceFactory $carreroInterfaceFactory,
        Carrerob $carrerob
    ) {
        $this->resourceCarrero = $resourceCarrero;
        $this->carreroInterfaceFactory = $carreroInterfaceFactory;
        $this->carrerob = $carrerob;
    }

    /**
     * @param CarreroInterface $curso
     * @return CarreroInterface
     * @throws CouldNotSaveException
     */
    public function save(
        CarreroInterface $curso
    ) {

        try {
            $this->resourceCarrero->save($curso);
        } catch(\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }

        return $curso;

    }

    /**
     * @param $entityId
     * @return mixed
     */
    public function getById($entityId)
    {
        try {
            $curso = $this->carreroInterfaceFactory->create();
            $curso->setEntityId($entityId);
            $this->resourceCarrero->load($curso, $entityId);
        } catch (\Exception $e) {
            $curso = $this->carreroInterfaceFactory->create();
        }

        return $curso;
    }

    /**
     * @param \Hiberus\Carrero\Api\Data\CarreroInterface $curso
     * @return bool
     */
    public function delete(\Hiberus\Carrero\Api\Data\CarreroInterface $curso)
    {
        try {
            $this->resourceCarrero->delete($curso);
        } catch (\Exception $e) {

            return false;
        }

        return true;
    }

    /**
     * @param int $entityId
     * @return bool
     */
    public function deleteById($entityId)
    {
        return $this->delete($this->getById($entityId));
    }
    /**
     * @inerhitDoc
     */
    public function getAll()
    {
        return $this->carrerob->getCollection()->getData();
    }

    /**
     * @inerhitDoc
     */
    public function removeByIdApi($entityId) {
        //$this->carrerob->getCollection()->removeItemByKey($entityId);
       // $status = $this->deleteById($entityId);
        try {
            $curso = $this->carreroInterfaceFactory->create();
            $curso->load($entityId);
            $curso->delete();
            $status=true;
        } catch (\Exception $e) {
            $curso = $this->carreroInterfaceFactory->create();
            $status=false;
        }

        return $status;
    }

    /**
     * @inerhitDoc
     */
    public function createNew($firstname, $lastname, $mark) {
        $connection  = $this->resourceCarrero->getConnection();
        $tableName = $connection->getTableName('hiberus_exam');
        $sql = "INSERT INTO " . $tableName . " (firstname, lastname,mark) VALUES ('$firstname','$lastname',$mark)";
        $query = $connection->query($sql);
        if($query->errorInfo()[0]="00000"){
            $status = true;
        }else{
            $status = false;
        }
        return $status;
    }


}
