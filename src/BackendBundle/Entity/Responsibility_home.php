<?php

namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @ORM\Table(name="responsibility_home_table")
 * @Vich\Uploadable
 */
class Responsibility_home
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
    private $header_title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $header_text;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;


    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\ResponsibilityParts_home", mappedBy="responsibilities", cascade={"persist", "remove"}, orphanRemoval=true)
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
     * @param \BackendBundle\Entity\ResponsibilityParts_home $part
     *
     * @return Responsibility_home
     */
    public function addPart(\BackendBundle\Entity\ResponsibilityParts_home $part)
    {
        $part->setResponsibilities($this);

        $this->part->add($part);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\ResponsibilityParts_home $part
     *
     */
    public function removePart(\BackendBundle\Entity\ResponsibilityParts_home $part)
    {
        $this->part->removeElement($part);
    }

    /**
     * @return mixed
     */
    public function getHeaderTitle()
    {
        return $this->header_title;
    }

    /**
     * @param mixed $header_title
     */
    public function setHeaderTitle($header_title)
    {
        $this->header_title = $header_title;
    }

    /**
     * @return mixed
     */
    public function getHeaderText()
    {
        return $this->header_text;
    }

    /**
     * @param mixed $header_text
     */
    public function setHeaderText($header_text)
    {
        $this->header_text = $header_text;
    }



    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    public function __construct()
    {
        $this->updatedAt = new \DateTime('now');
        $this->part = new ArrayCollection();
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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