<?php
namespace CaradvisorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answer
 *
 * @ORM\Table(name="answer")
 * @ORM\Entity(repositoryClass="CaradvisorBundle\Repository\AnswerRepository")
 */
class Answer
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
     * @ORM\Column(name="message", type="text")
     */
    private $message;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * Answer constructor.
     */
    public function __construct()
    {
        $this->date = new \DateTime('now');
    }

    /**
     * @ORM\OneToOne(targetEntity="pro")
     * @ORM\JoinColumn(name="pro_id", referencedColumnName="id")
     */
    private $pro;

    /**
     * @ORM\OneToOne(targetEntity="CaradvisorBundle\Entity\ReviewRepair")
     * @ORM\JoinColumn(name="reviewRepair_id", referencedColumnName="id")
     */
    private $reviewRepair;

    /**
     * @ORM\OneToOne(targetEntity="CaradvisorBundle\Entity\ReviewBuy")
     * @ORM\JoinColumn(name="reviewBuy_id", referencedColumnName="id")
     */
    private $reviewBuy;

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
     * Set message
     *
     * @param string $message
     *
     * @return Answer
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Answer
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getPro()
    {
        return $this->pro;
    }

    /**
     * @param mixed $pro
     * @return Answer
     */
    public function setPro($pro)
    {
        $this->pro = $pro;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReviewRepair()
    {
        return $this->reviewRepair;
    }

    /**
     * @param mixed $reviewRepair
     * @return Answer
     */
    public function setReviewRepair($reviewRepair)
    {
        $this->reviewRepair = $reviewRepair;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReviewBuy()
    {
        return $this->reviewBuy;
    }

    /**
     * @param mixed $reviewBuy
     * @return Answer
     */
    public function setReviewBuy($reviewBuy)
    {
        $this->reviewBuy = $reviewBuy;
        return $this;
    }
}
