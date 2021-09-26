<?php

namespace Hiberus\Carrero\Model;

use Hiberus\Carrero\Api\Data\CarreroInterface;
use Magento\Framework\Model\AbstractModel;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class Carrerob extends AbstractModel implements CarreroInterface
{

    protected function _construct() {
        $this->_init(\Hiberus\Carrero\Model\ResourceModel\Carrerob::class);
    }

    /**
     * @inerhitDoc
     */
    public function getIdExam()
    {
        return $this->getData('id_exam');
    }

    /**
     * @inerhitDoc
     */
    public function setIdExam($idExam)
    {
        return $this->setData('id_exam', $idExam);
    }

    /**
     * @inerhitDoc
     */
    public function getFirstName()
    {
        return $this->getData('firstname');
    }

    /**
     * @inerhitDoc
     */
    public function setFirstName($firstname)
    {
        return $this->setData('firstname', $firstname);
    }

    /**
     * @inerhitDoc
     */
    public function getLastName()
    {
        return $this->getData('id_exam');
    }

    /**
     * @inerhitDoc
     */
    public function setLastName($lastName)
    {
        return $this->setData('lastName', $lastName);
    }

    /**
     * @inerhitDoc
     */
    public function getMark()
    {
        return $this->getData('mark');
    }

    /**
     * @inerhitDoc
     */
    public function setMark($mark)
    {
        return $this->setData('mark', $mark);
    }

}
