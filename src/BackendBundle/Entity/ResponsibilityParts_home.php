<?php

namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="responsibility_parts_home_table")
 * @Vich\Uploadable
 */
class ResponsibilityParts_home
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $shrttext;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\Responsibility_home", inversedBy="part", cascade={"persist"})
     * @ORM\JoinColumn(name="resp_id", referencedColumnName="id")
     */
    private $responsibilities;

    /**
     * @param \BackendBundle\Entity\Responsibility_home $resp
     *
     * @return ResponsibilityParts_home
     */
    public function setResponsibilities(\BackendBundle\Entity\Responsibility_home $resp = null)
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

    /**
     * @return mixed
     */
    public function getShrttext()
    {
        return $this->shrttext;
    }

    /**
     * @param mixed $shrttext
     */
    public function setShrttext($shrttext)
    {
        $this->shrttext = $shrttext;
    }


    public function __toString()
    {
        return (string)$this->getTitle();
    }
}