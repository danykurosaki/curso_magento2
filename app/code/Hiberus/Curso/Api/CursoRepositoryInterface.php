<?php

namespace Hiberus\Curso\Api;

interface CursoRepositoryInterface
{
    /**
     * @param \Hiberus\Curso\Api\Data\CursoInterface $cursoInterface
     * @return \Hiberus\Curso\Api\Data\CursoInterface
     */
    public function save(\Hiberus\Curso\Api\Data\CursoInterface $cursoInterface);

    /**
     * @param $entityId
     * @return \Hiberus\Curso\Api\Data\CursoInterface
     */
    public function getById($entityId);

    /**
     * @param \Hiberus\Curso\Api\Data\CursoInterface $cursoInterface
     * @return bool
     */
    public function delete(\Hiberus\Curso\Api\Data\CursoInterface $cursoInterface);

    /**
     * @param $entityId
     * @return bool
     */
    public function deleteById($entityId);
}
