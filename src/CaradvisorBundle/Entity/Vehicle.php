<?php

namespace CaradvisorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicle
 *
 * @ORM\Table(name="vehicle")
 * @ORM\Entity(repositoryClass="CaradvisorBundle\Repository\VehicleRepository")
 */
class Vehicle
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
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255)
     */
    private $version;

    /**
     * @var int
     *
     * @ORM\Column(name="kilometers", type="integer")
     */
    private $kilometers;

    /**
     * @var string
     *
     * @ORM\Column(name="registration", type="string", length=255, unique=true)
     */
    private $registration;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="energy", type="string", length=255)
     */
    private $energy;

    /**
     * @ORM\ManyToOne(targetEntity="CaradvisorBundle\Entity\User", inversedBy="vehicles")
     */
    private $user;

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
     * Set brand
     *
     * @param string $brand
     *
     * @return Vehicle
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Vehicle
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set version
     *
     * @param string $version
     *
     * @return Vehicle
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set kilometers
     *
     * @param integer $kilometers
     *
     * @return Vehicle
     */
    public function setKilometers($kilometers)
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    /**
     * Get kilometers
     *
     * @return int
     */
    public function getKilometers()
    {
        return $this->kilometers;
    }

    /**
     * Set registration
     *
     * @param string $registration
     *
     * @return Vehicle
     */
    public function setRegistration($registration)
    {
        $this->registration = $registration;

        return $this;
    }

    /**
     * Get registration
     *
     * @return string
     */
    public function getRegistration()
    {
        return $this->registration;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Vehicle
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
     * Set energy
     *
     * @param string $energy
     *
     * @return Vehicle
     */
    public function setEnergy($energy)
    {
        $this->energy = $energy;

        return $this;
    }

    /**
     * Get energy
     *
     * @return string
     */
    public function getEnergy()
    {
        return $this->energy;
    }

    /**
     * Set user
     *
     * @param \CaradvisorBundle\Entity\User $user
     *
     * @return Vehicle
     */
    public function setUser(\CaradvisorBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \CaradvisorBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
