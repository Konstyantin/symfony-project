<?php

namespace DealerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dealer
 *
 * @ORM\Table(name="dealer")
 * @ORM\Entity(repositoryClass="DealerBundle\Repository\DealerRepository")
 */
class Dealer
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
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string")
     */
    protected $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string")
     */
    protected $street;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="string")
     */
    protected $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="phone", type="string")
     */
    protected $phone;

    /**
     * @var integer
     *
     * @ORM\Column(name="post_code", type="integer")
     */
    protected $postCode;

    /**
     * @ORM\OneToMany(targetEntity="ServiceBundle\Entity\CarService", mappedBy="dealer")
     */
    protected $carService;

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
     * Set city
     *
     * @param string $city
     *
     * @return Dealer
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Dealer
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Dealer
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return Dealer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set postCode
     *
     * @param integer $postCode
     *
     * @return Dealer
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode
     *
     * @return integer
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Dealer
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
     * Constructor
     */
    public function __construct()
    {
        $this->carService = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add carService
     *
     * @param \ServiceBundle\Entity\CarService $carService
     *
     * @return Dealer
     */
    public function addCarService(\ServiceBundle\Entity\CarService $carService)
    {
        $this->carService[] = $carService;

        return $this;
    }

    /**
     * Remove carService
     *
     * @param \ServiceBundle\Entity\CarService $carService
     */
    public function removeCarService(\ServiceBundle\Entity\CarService $carService)
    {
        $this->carService->removeElement($carService);
    }

    /**
     * Get carService
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCarService()
    {
        return $this->carService;
    }

    /**
     * Return dealer name
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName();
    }
}
