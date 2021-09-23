<?php

namespace Hiberusb\Carrerob\Model;

use Hiberusb\Carrerob\Api\CarreroRepositoryInterface;
use Hiberusb\Carrerob\Api\Data\CarreroInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use \Magento\Framework\App\RequestInterface;

class CarreroRepository implements CarreroRepositoryInterface
{

    protected ResourceModel\Carrerob $resourceCurso;
    protected \Hiberusb\Carrerob\Api\Data\CarreroInterfaceFactory $cursoInterfaceFactory;

    /**
     * @param ResourceModel\Carrerob $resourceCurso
     * @param \Hiberusb\Carrerob\Api\Data\CarreroInterfaceFactory $cursoInterfaceFactory
     */
    public function __construct(
        \Hiberusb\Carrerob\Model\ResourceModel\Carrerob $resourceCurso,
        \Hiberusb\Carrerob\Api\Data\CarreroInterfaceFactory $carreroInterfaceFactory
    ) {
        $this->resourceCurso = $resourceCurso;
        $this->cursoInterfaceFactory = $carreroInterfaceFactory;
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
            $this->resourceCurso->save($curso);
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
            $curso = $this->cursoInterfaceFactory->create();
            $curso->setEntityId($entityId);
            $this->resourceCurso->load($curso, $entityId);
        } catch (\Exception $e) {
            $curso = $this->cursoInterfaceFactory->create();
        }

        return $curso;
    }

    /**
     * @param \Hiberusb\Carrerob\Api\Data\CarreroInterface $curso
     * @return bool
     */
    public function delete(\Hiberusb\Carrerob\Api\Data\CarreroInterface $curso)
    {
        try {
            $this->resourceCurso->delete($curso);
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
        $connection  = $this->resourceCurso->getConnection();
        $tableName = $connection->getTableName('hiberus_exam');

        $query = $connection->select()
            ->from($tableName);

        $fetchData = $connection->fetchAll($query);
        return json_encode($fetchData);
    }

    /**
     * @inerhitDoc
     */
    public function removeByIdApi($entityId) {
       // die(var_dump($this->_request->getParams()));
        $status = $this->deleteById($entityId);
        return json_encode($status);
    }

    /**
     * @inerhitDoc
     */
    public function createNew($firstname, $lastname, $mark) {
        $connection  = $this->resourceCurso->getConnection();
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
