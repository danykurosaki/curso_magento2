<?php

namespace Hiberus\Carrero\Api;

interface CarreroRepositoryInterface
{

    /**
     * @param \Hiberus\Carrero\Api\Data\CarreroInterface $cursoInterface
     * @return \Hiberus\Carrero\Api\Data\CarreroInterface
     */
    public function save(\Hiberus\Carrero\Api\Data\CarreroInterface $cursoInterface);

    /**
     * @param $entityId
     * @return \Hiberus\Carrero\Api\Data\CarreroInterface
     */
    public function getById($entityId);

    /**
     * @param \Hiberus\Carrero\Api\Data\CarreroInterface $cursoInterface
     * @return bool
     */
    public function delete(\Hiberus\Carrero\Api\Data\CarreroInterface $cursoInterface);

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
