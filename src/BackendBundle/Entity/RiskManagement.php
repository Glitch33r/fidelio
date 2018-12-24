<?php

namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @ORM\Table(name="risk_management_table")
 * @Vich\Uploadable
 */
class RiskManagement
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
    private $title;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\RiskManagementParts", mappedBy="rm", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $part;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $part
     */
    public function setPart($part)
    {
        $this->part = $part;
    }

    /**
     * @param \BackendBundle\Entity\RiskManagementParts $part
     *
     * @return RiskManagement
     */
    public function addPart(\BackendBundle\Entity\RiskManagementParts $part)
    {
        $part->setRm($this);

        $this->part->add($part);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\RiskManagementParts $part
     *
     */
    public function removePart(\BackendBundle\Entity\RiskManagementParts $part)
    {
        $this->part->removeElement($part);
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


    public function __construct()
    {
        $this->part = new ArrayCollection();
    }
}