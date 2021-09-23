<?php

namespace Hiberus\Curso\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface CursoInterface extends ExtensibleDataInterface
{
    const TABLE_NAME = "hiberus_curso";
    const COLUMN_ID = "entity_id";

    /**
     * @return int
     */
    public function getEntityid();

    /**
     * @param $entityId
     * @return $this
     */
    public function setEntityid($entityId);

    /**
     * @return string
     */
    public function getNombre();

    /**
     * @param $nombre
     * @return string
     */
    public function setNombre($nombre);

    /**
     * @return string
     */
    public function getApellido();

    /**
     * @param $apellido
     * @return string
     */
    public function setApellido($apellido);

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @param string $createdAt
     * @return string
     */
    public function setCreatedAt($createdAt);
}
