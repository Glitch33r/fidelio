<?php

namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="responsibility_parts_main_table")
 * @Vich\Uploadable
 */
class ResponsibilityParts
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $lngtext;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $rdmore = false;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\Responsibility", inversedBy="part", cascade={"persist"})
     * @ORM\JoinColumn(name="resp_id", referencedColumnName="id")
     */
    private $responsibilities;

    /**
     * @return mixed
     */
    public function getRdmore()
    {
        return $this->rdmore;
    }

    /**
     * @param mixed $rdmore
     */
    public function setRdmore($rdmore)
    {
        $this->rdmore = $rdmore;
    }

    /**
     * @param \BackendBundle\Entity\Responsibility $resp
     *
     * @return ResponsibilityParts
     */
    public function setResponsibilities(\BackendBundle\Entity\Responsibility $resp = null)
    {
        $this->responsibilities = $resp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponsibilities()
    {
        return $this->responsibilities;
    }

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


    /**
     * @return mixed
     */
    public function getLngtext()
    {
        return $this->lngtext;
    }

    /**
     * @param mixed $lngtext
     */
    public function setLngtext($lngtext)
    {
        $this->lngtext = $lngtext;
    }


    public function __toString()
    {
        return (string)$this->getName();
    }
}