<?php

namespace Festizoom\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Festival
 *
 * @ORM\Table(name="festival")
 * @ORM\Entity(repositoryClass="Festizoom\AppBundle\Repository\FestivalRepository")
 */
class Festival
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Festizoom\AppBundle\Entity\Edition", mappedBy="festival")
     */
     private $editions;

    /**
     * @ORM\OneToMany(targetEntity="Festizoom\AppBundle\Entity\Comment", mappedBy="festival")
     */
     private $comments;

    /**
     * @ORM\OneToMany(targetEntity="Festizoom\AppBundle\Entity\Video", mappedBy="festival")
     */
    private $videos;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="uname", length=255, unique=true)
     */
    private $uname;

    /**
     * @var string
     *
     * @ORM\Column(name="furl", type="string", length=255)
     */
    private $furl;

    /**
     * @var string
     *
     * @ORM\Column(name="wsurl", type="string", length=255)
     */
    private $wsurl;

    /**
     * @var int
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="aurl", type="string", length=255)
     */
    private $aurl;

    /**
     * @var string
     *
     * @ORM\Column(name="kind", type="string", length=255)
     */
    private $kind;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="minage", type="integer")
     */
    private $minage;

    /**
     * @var string
     *
     * @ORM\Column(name="dtype", type="string", length=255)
     */
    private $period;

   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->editions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->videos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Festival
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set uname
     *
     * @param string $uname
     *
     * @return Festival
     */
    public function setUname($uname)
    {
        $this->uname = $uname;

        return $this;
    }

    /**
     * Get uname
     *
     * @return string
     */
    public function getUname()
    {
        return $this->uname;
    }

    /**
     * Set furl
     *
     * @param string $furl
     *
     * @return Festival
     */
    public function setFurl($furl)
    {
        $this->furl = $furl;

        return $this;
    }

    /**
     * Get furl
     *
     * @return string
     */
    public function getFurl()
    {
        return $this->furl;
    }

    /**
     * Set wsurl
     *
     * @param string $wsurl
     *
     * @return Festival
     */
    public function setWsurl($wsurl)
    {
        $this->wsurl = $wsurl;

        return $this;
    }

    /**
     * Get wsurl
     *
     * @return string
     */
    public function getWsurl()
    {
        return $this->wsurl;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     *
     * @return Festival
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Festival
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set aurl
     *
     * @param string $aurl
     *
     * @return Festival
     */
    public function setAurl($aurl)
    {
        $this->aurl = $aurl;

        return $this;
    }

    /**
     * Get aurl
     *
     * @return string
     */
    public function getAurl()
    {
        return $this->aurl;
    }

    /**
     * Set kind
     *
     * @param string $kind
     *
     * @return Festival
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get kind
     *
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Festival
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set minage
     *
     * @param integer $minage
     *
     * @return Festival
     */
    public function setMinage($minage)
    {
        $this->minage = $minage;

        return $this;
    }

    /**
     * Get minage
     *
     * @return integer
     */
    public function getMinage()
    {
        return $this->minage;
    }

    /**
     * Set period
     *
     * @param string $period
     *
     * @return Festival
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return string
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Add edition
     *
     * @param \Festizoom\AppBundle\Entity\Edition $edition
     *
     * @return Festival
     */
    public function addEdition(\Festizoom\AppBundle\Entity\Edition $edition)
    {
        $this->editions[] = $edition;

        return $this;
    }

    /**
     * Remove edition
     *
     * @param \Festizoom\AppBundle\Entity\Edition $edition
     */
    public function removeEdition(\Festizoom\AppBundle\Entity\Edition $edition)
    {
        $this->editions->removeElement($edition);
    }

    /**
     * Get editions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEditions()
    {
        return $this->editions;
    }

    /**
     * Add comment
     *
     * @param \Festizoom\AppBundle\Entity\Comment $comment
     *
     * @return Festival
     */
    public function addComment(\Festizoom\AppBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \Festizoom\AppBundle\Entity\Comment $comment
     */
    public function removeComment(\Festizoom\AppBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add video
     *
     * @param \Festizoom\AppBundle\Entity\Video $video
     *
     * @return Festival
     */
    public function addVideo(\Festizoom\AppBundle\Entity\Video $video)
    {
        $this->videos[] = $video;

        return $this;
    }

    /**
     * Remove video
     *
     * @param \Festizoom\AppBundle\Entity\Video $video
     */
    public function removeVideo(\Festizoom\AppBundle\Entity\Video $video)
    {
        $this->videos->removeElement($video);
    }

    /**
     * Get videos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVideos()
    {
        return $this->videos;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
