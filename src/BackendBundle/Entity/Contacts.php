<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity()
 * @ORM\Table(name="contacts_table")
 */
class Contacts
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $firstTelephone;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $secondTelephone;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param mixed $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFirstTelephone()
    {
        return $this->firstTelephone;
    }

    /**
     * @param mixed $firstTelephone
     */
    public function setFirstTelephone($firstTelephone)
    {
        $this->firstTelephone = $firstTelephone;
    }

    /**
     * @return mixed
     */
    public function getSecondTelephone()
    {
        return $this->secondTelephone;
    }

    /**
     * @param mixed $secondTelephone
     */
    public function setSecondTelephone($secondTelephone)
    {
        $this->secondTelephone = $secondTelephone;
    }

}