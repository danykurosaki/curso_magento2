<?php

namespace Hiberusb\Carrerob\Api;

interface CarreroRepositoryInterface
{

    /**
     * @param \Hiberusb\Carrerob\Api\Data\CarreroInterface $cursoInterface
     * @return \Hiberusb\Carrerob\Api\Data\CarreroInterface
     */
    public function save(\Hiberusb\Carrerob\Api\Data\CarreroInterface $cursoInterface);

    /**
     * @param $entityId
     * @return \Hiberusb\Carrerob\Api\Data\CarreroInterface
     */
    public function getById($entityId);

    /**
     * @param \Hiberusb\Carrerob\Api\Data\CarreroInterface $cursoInterface
     * @return bool
     */
    public function delete(\Hiberusb\Carrerob\Api\Data\CarreroInterface $cursoInterface);

    /**
     * @param $entityId
     * @return bool
     */
    public function deleteById($entityId);

    /**
     * @api
     * @return array
     */
    public function getAll();

    /**
     * @param string $firstname
     * @param string $lastname
     * @param double $mark
     * @return bool
     */
    public function createNew($firstname, $lastname, $mark);


    /**
     * @param int $entityId
     * @return bool
     */
    public function removeByIdApi($entityId);

}
