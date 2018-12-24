<?php

namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="about_us_parts_table")
 * @Vich\Uploadable
 */
class AboutParts
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
    private $description;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\About", inversedBy="part", cascade={"persist"})
     * @ORM\JoinColumn(name="about_id", referencedColumnName="id")
     */
    private $ab;

    /**
     * @param \BackendBundle\Entity\About $ab
     *
     * @return AboutParts
     */
    public function setAb(\BackendBundle\Entity\About $ab = null)
    {
        $this->ab = $ab;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAb()
    {
        return $this->ab;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function __toString()
    {
        return (string)$this->getTitle();
    }
}