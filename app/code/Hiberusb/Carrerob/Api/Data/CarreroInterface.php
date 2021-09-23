<?php

namespace Hiberusb\Carrerob\Api\Data;

interface CarreroInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    public const TABLE_NAME = 'hiberus_exam';
    public const COLUMN_ID = 'id_exam';

    /**
     * @return int
     */
    public function getIdExam();

    /**
     * @param int $idExam
     * @return $this
     */
    public function setIdExam($idExam);

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFirstName($firstname);

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName);

    /**
     * @return float
     */
    public function getMark();

    /**
     * @param float $mark
     * @return $this
     */
    public function setMark($mark);


}
