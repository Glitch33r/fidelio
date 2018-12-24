<?php

namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="risk_gmg_parts_table")
 * @Vich\Uploadable
 */
class RiskManagementParts
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
    private $item;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\RiskManagement", inversedBy="part", cascade={"persist"})
     * @ORM\JoinColumn(name="rs_id", referencedColumnName="id")
     */
    private $rm;

    /**
     * @param \BackendBundle\Entity\RiskManagement $ab
     *
     * @return RiskManagementParts
     */
    public function setRm(\BackendBundle\Entity\RiskManagement $rm = null)
    {
        $this->rm = $rm;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRm()
    {
        return $this->rm;
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
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param mixed $title
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    public function __toString()
    {
        return (string)$this->getItem();
    }
}