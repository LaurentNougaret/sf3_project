<?php

namespace CaradvisorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Serializable;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @UniqueEntity(fields={"email"}, message="L'email est déjà pris")
 * @UniqueEntity(fields={"userName"}, message="Le nom d'utilisateur est déjà pris")
 * @ORM\Entity(repositoryClass="CaradvisorBundle\Repository\UserRepository")
 */
class User implements UserInterface, Serializable
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
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="userName", type="string", length=255, unique=true)
     */
    private $userName;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max="4096")
     */
    private $plainpassword;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var int
     *
     * @ORM\Column(name="postalCode", type="integer", nullable=true)
     */
    private $postalCode;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer", nullable=true)
     */
    private $phone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="date", nullable=true)
     */
    private $birthDate;


    /**
     * @var array
     * @ORM\Column(name="roles", type="array")
     */
    private $roles = array();

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @var bool
     *
     * @ORM\Column(name="mailingList", type="boolean", nullable=true)
     */
    private $mailingList;

    /**
     * @ORM\OneToMany(targetEntity="CaradvisorBundle\Entity\Vehicle", mappedBy="user")
     */
    private $vehicles;

    /**
     * @ORM\OneToMany(targetEntity="CaradvisorBundle\Entity\Pro", mappedBy="user")
     */
    private $pros;

    /**
     * @ORM\OneToMany(targetEntity="CaradvisorBundle\Entity\ReviewRepair", mappedBy="user")
     */
    private $reviewRepairs;

    /**
     * @ORM\OneToMany(targetEntity="CaradvisorBundle\Entity\ReviewBuy", mappedBy="user")
     */
    private $reviewBuys;

    /**
     * @ORM\Column(name="picture", type="blob", nullable=true)
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="password_change_token", type="string", length=100, nullable=true)
     */
    private $passwordChangeToken;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="password_change_limit_date", type="datetime", nullable=true)
     */
    private $passwordChangeLimitDate;

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
     * @return User
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
     * @return User
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
     * Set userName
     *
     * @param string $userName
     *
     * @return User
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string $plainpassword
     * @return mixed
     */
    public function getPlainpassword()
    {
        return $this->plainpassword;
    }

    /**
     * @param mixed $plainpassword
     * @return User
     */
    public function setPlainpassword($plainpassword)
    {
        $this->plainpassword = $plainpassword;
        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
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
     * Set gender
     *
     * @param string $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return User
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
     * Set postalCode
     *
     * @param integer $postalCode
     *
     * @return User
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return int
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return User
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * Set mailingList
     *
     * @param boolean $mailingList
     *
     * @return User
     */
    public function setMailingList($mailingList)
    {
        $this->mailingList = $mailingList;

        return $this;
    }

    /**
     * Get mailingList
     *
     * @return bool
     */
    public function getMailingList()
    {
        return $this->mailingList;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return User
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vehicles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pros = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reviewRepairs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reviewBuys = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getSalt()
    {
        return null;
    }

    /**
     * @param array $roles
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
        return $this;
    }

    public function getRoles()
    {
        return array('ROLE_USER', 'ROLE_PRO');
    }

    public function eraseCredentials()
    {

    }

    public function serialize()
    {
        return serialize([
            $this->id,
            $this->userName,
            $this->password,
        ]);
    }

    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->userName,
            $this->password,
        ) = unserialize($serialized);
    }

    /**
     * Add vehicle
     *
     * @param \CaradvisorBundle\Entity\Vehicle $vehicle
     *
     * @return User
     */
    public function addVehicle(\CaradvisorBundle\Entity\Vehicle $vehicle)
    {
        $this->vehicles[] = $vehicle;

        return $this;
    }

    /**
     * Remove vehicle
     *
     * @param \CaradvisorBundle\Entity\Vehicle $vehicle
     */
    public function removeVehicle(\CaradvisorBundle\Entity\Vehicle $vehicle)
    {
        $this->vehicles->removeElement($vehicle);
    }

    /**
     * Get vehicles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVehicles()
    {
        return $this->vehicles;
    }

    /**
     * Add pro
     *
     * @param \CaradvisorBundle\Entity\Pro $pro
     *
     * @return User
     */
    public function addPro(\CaradvisorBundle\Entity\Pro $pro)
    {
        $this->pros[] = $pro;

        return $this;
    }

    /**
     * Remove pro
     *
     * @param \CaradvisorBundle\Entity\Pro $pro
     */
    public function removePro(\CaradvisorBundle\Entity\Pro $pro)
    {
        $this->pros->removeElement($pro);
    }

    /**
     * Get pros
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPros()
    {
        return $this->pros;
    }

    /**
     * Add reviewRepair
     *
     * @param \CaradvisorBundle\Entity\ReviewRepair $reviewRepair
     *
     * @return User
     */
    public function addReviewRepair(\CaradvisorBundle\Entity\ReviewRepair $reviewRepair)
    {
        $this->reviewRepairs[] = $reviewRepair;

        return $this;
    }

    /**
     * Remove reviewRepair
     *
     * @param \CaradvisorBundle\Entity\ReviewRepair $reviewRepair
     */
    public function removeReviewRepair(\CaradvisorBundle\Entity\ReviewRepair $reviewRepair)
    {
        $this->reviewRepairs->removeElement($reviewRepair);
    }

    /**
     * Get reviewRepairs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReviewRepairs()
    {
        return $this->reviewRepairs;
    }

    /**
     * Add reviewBuy
     *
     * @param \CaradvisorBundle\Entity\ReviewBuy $reviewBuy
     *
     * @return User
     */
    public function addReviewBuy(\CaradvisorBundle\Entity\ReviewBuy $reviewBuy)
    {
        $this->reviewBuys[] = $reviewBuy;

        return $this;
    }

    /**
     * Remove reviewBuy
     *
     * @param \CaradvisorBundle\Entity\ReviewBuy $reviewBuy
     */
    public function removeReviewBuy(\CaradvisorBundle\Entity\ReviewBuy $reviewBuy)
    {
        $this->reviewBuys->removeElement($reviewBuy);
    }

    /**
     * Get reviewBuys
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReviewBuys()
    {
        return $this->reviewBuys;
    }

    /**
     * @return string
     */
    public function getPasswordChangeToken()
    {
        return $this->passwordChangeToken;
    }

    /**
     * @param string $passwordChangeToken
     * @return User
     */
    public function setPasswordChangeToken($passwordChangeToken)
    {
        $this->passwordChangeToken = $passwordChangeToken;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPasswordChangeLimitDate()
    {
        return $this->passwordChangeLimitDate;
    }

    /**
     * @param \DateTime $passwordChangeLimitDate
     * @return User
     */
    public function setPasswordChangeLimitDate($passwordChangeLimitDate)
    {
        $this->passwordChangeLimitDate = $passwordChangeLimitDate;
        return $this;
    }

    public function generateToken()
    {
        $today = new \DateTime("now");
        $string = $this->getUsername() . $this->getEmail() . $today->getTimestamp();
        return sha1($string);
    }

}
