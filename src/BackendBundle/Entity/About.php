<?php

namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @ORM\Table(name="about_us_table")
 * @Vich\Uploadable
 */
class About
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
    private $subtitle;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="about_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

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
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\AboutParts", mappedBy="ab", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $part;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bottomtext;

    /**
     * @return mixed
     */
    public function getBottomtext()
    {
        return $this->bottomtext;
    }

    /**
     * @param mixed $bottomtext
     */
    public function setBottomtext($bottomtext)
    {
        $this->bottomtext = $bottomtext;
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
     * @param \BackendBundle\Entity\AboutParts $part
     *
     * @return About
     */
    public function addPart(\BackendBundle\Entity\AboutParts $part)
    {
        $part->setAb($this);

        $this->part->add($part);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\AboutParts $part
     *
     */
    public function removePart(\BackendBundle\Entity\AboutParts $part)
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