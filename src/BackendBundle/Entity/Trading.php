<?php

namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @ORM\Table(name="trading_table")
 * @Vich\Uploadable
 */
class Trading
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
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\TradingParts", mappedBy="trade", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $part;



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
     * @param \BackendBundle\Entity\TradingParts $part
     *
     * @return Trading
     */
    public function addPart(\BackendBundle\Entity\TradingParts $part)
    {
        $part->setTrade($this);

        $this->part->add($part);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\TradingParts $part
     *
     */
    public function removePart(\BackendBundle\Entity\TradingParts $part)
    {
        $this->part->removeElement($part);
    }


    public function __construct()
    {
        $this->updatedAt = new \DateTime('now');
        $this->part = new ArrayCollection();
    }


    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

}