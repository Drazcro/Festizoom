<?php

namespace Festizoom\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Edition
 *
 * @ORM\Table(name="edition")
 * @ORM\Entity(repositoryClass="Festizoom\AppBundle\Repository\EditionRepository")
 */
class Edition
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
     * @var int
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bdate", type="datetimetz")
     */
    private $bdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="edate", type="datetimetz")
     */
    private $edate;

    /**
     * @var string
     *
     * @ORM\Column(name="aurl", type="string", length=255, nullable=true)
     */
    private $aurl;

    /**
     * @ORM\ManyToOne(targetEntity="Festizoom\AppBundle\Entity\Festival", inversedBy="editions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $festival;

    /**
     * @var string
     *
     * @ORM\Column(name="lineup", type="text", nullable=true)
     */
    private $lineup;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Edition
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set bdate
     *
     * @param \DateTime $bdate
     *
     * @return Edition
     */
    public function setBdate($bdate)
    {
        $this->bdate = $bdate;

        return $this;
    }

    /**
     * Get bdate
     *
     * @return \DateTime
     */
    public function getBdate()
    {
        return $this->bdate;
    }

    /**
     * Set edate
     *
     * @param \DateTime $edate
     *
     * @return Edition
     */
    public function setEdate($edate)
    {
        $this->edate = $edate;

        return $this;
    }

    /**
     * Get edate
     *
     * @return \DateTime
     */
    public function getEdate()
    {
        return $this->edate;
    }

    /**
     * Set aurl
     *
     * @param string $aurl
     *
     * @return Edition
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
     * Set lineup
     *
     * @param string $lineup
     *
     * @return Edition
     */
    public function setLineup($lineup)
    {
        $this->lineup = $lineup;

        return $this;
    }

    /**
     * Get lineup
     *
     * @return string
     */
    public function getLineup()
    {
        return $this->lineup;
    }

    /**
     * Set festival
     *
     * @param \Festizoom\AppBundle\Entity\Festival $festival
     *
     * @return Edition
     */
    public function setFestival(\Festizoom\AppBundle\Entity\Festival $festival)
    {
        $this->festival = $festival;

        return $this;
    }

    /**
     * Get festival
     *
     * @return \Festizoom\AppBundle\Entity\Festival
     */
    public function getFestival()
    {
        return $this->festival;
    }
}
