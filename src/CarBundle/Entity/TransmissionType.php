<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CarBundle\Entity\Transmission;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TransmissionType
 *
 * @ORM\Table(name="transmission_type")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\TransmissionTypeRepository")
 */
class TransmissionType
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=false)
     */
    protected $title;

    /**
     * @ORM\OneToMany(targetEntity="CarBundle\Entity\Transmission", mappedBy="type", cascade={"persist", "remove"})
     */
    protected $transmission;

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
     * Set title
     *
     * @param string $title
     *
     * @return TransmissionType
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->transmission = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add transmission
     *
     * @param Transmission $transmission
     *
     * @return TransmissionType
     */
    public function addTransmission(Transmission $transmission)
    {
        $this->transmission[] = $transmission;

        return $this;
    }

    /**
     * Remove transmission
     *
     * @param Transmission $transmission
     */
    public function removeTransmission(Transmission $transmission)
    {
        $this->transmission->removeElement($transmission);
    }

    /**
     * Get transmission
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * Call magic method __toString
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getTitle();
    }
}
