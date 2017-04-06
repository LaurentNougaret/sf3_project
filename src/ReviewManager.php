<?php

namespace caradvisor;

class ReviewManager
{
    const TABLE = "review";

    /**
     * @var BddManager
     */
    private $bdd;

    /**
     * @var string
     */
    private $proname;
    private $lastname;
    private $firstname;
    private $city;
    private $review;

    /**
     * ReviewManager constructor.
     * @param $bdd
     */
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    /**
     * @return bool|\mysqli_result
     */
    public function listReview()
    {
        $sql = "SELECT * from " . self::TABLE;
        return $this->bdd->execSql($sql);
    }

    /**
     * @return string
     */
    public function getProname()
    {
        return $this->proname;
    }

    /**
     * @param string $proname
     */
    public function setProname($proname)
    {
        $this->proname = $proname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * @param mixed $review
     */
    public function setReview($review)
    {
        $this->review = $review;
    }

}
