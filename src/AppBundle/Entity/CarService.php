<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarService
 *
 * @ORM\Table(name="car_service")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarServiceRepository")
 */
class CarService
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
     * @ORM\Column(name="first_name", type="string")
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string")
     */
    protected $lastName;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="string")
     */
    protected $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="car_name", type="string")
     */
    protected $carName;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\Model", inversedBy="carService", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id", unique=false, nullable=false)
     */
    protected $model;

    /**
     * @var string
     *
     * @ORM\Column(name="vin", type="string")
     */
    protected $vin;

    /**
     * @var string
     *
     * @ORM\Column(name="mileage", type="integer")
     */
    protected $mileage;

    /**
     * @var integer
     *
     * @ORM\Column(name="license_plate", type="integer")
     */
    protected $licensePlate;

    /**
     * @ORM\ManyToOne(targetEntity="DealerBundle\Entity\Dealer", inversedBy="carService", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="dealer_id", referencedColumnName="id", unique=false, nullable=false)
     */
    protected $dealer;

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer")
     */
    protected $date;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ServiceStatus", inversedBy="carService", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id", unique=false, nullable=false)
     */
    protected $status;

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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return CarService
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return CarService
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return CarService
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
     * Set email
     *
     * @param string $email
     *
     * @return CarService
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set vin
     *
     * @param string $vin
     *
     * @return CarService
     */
    public function setVin($vin)
    {
        $this->vin = $vin;

        return $this;
    }

    /**
     * Get vin
     *
     * @return string
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Set mileage
     *
     * @param integer $mileage
     *
     * @return CarService
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;

        return $this;
    }

    /**
     * Get mileage
     *
     * @return integer
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * Set licensePlate
     *
     * @param integer $licensePlate
     *
     * @return CarService
     */
    public function setLicensePlate($licensePlate)
    {
        $this->licensePlate = $licensePlate;

        return $this;
    }

    /**
     * Get licensePlate
     *
     * @return integer
     */
    public function getLicensePlate()
    {
        return $this->licensePlate;
    }

    /**
     * Set date
     *
     * @param integer $date
     *
     * @return CarService
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return integer
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set model
     *
     * @param \CarBundle\Entity\Model $model
     *
     * @return CarService
     */
    public function setModel(\CarBundle\Entity\Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \CarBundle\Entity\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set dealer
     *
     * @param \DealerBundle\Entity\Dealer $dealer
     *
     * @return CarService
     */
    public function setDealer(\DealerBundle\Entity\Dealer $dealer = null)
    {
        $this->dealer = $dealer;

        return $this;
    }

    /**
     * Get dealer
     *
     * @return \DealerBundle\Entity\Dealer
     */
    public function getDealer()
    {
        return $this->dealer;
    }

    /**
     * Set carName
     *
     * @param string $carName
     *
     * @return CarService
     */
    public function setCarName($carName)
    {
        $this->carName = $carName;

        return $this;
    }

    /**
     * Get carName
     *
     * @return string
     */
    public function getCarName()
    {
        return $this->carName;
    }

    /**
     * Set status
     *
     * @param \AppBundle\Entity\ServiceStatus $status
     *
     * @return CarService
     */
    public function setStatus(\AppBundle\Entity\ServiceStatus $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \AppBundle\Entity\ServiceStatus
     */
    public function getStatus()
    {
        return $this->status;
    }
}
