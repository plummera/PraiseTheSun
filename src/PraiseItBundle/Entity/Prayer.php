<?php

namespace PraiseItBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prayer
 *
 * @ORM\Table(name="Prayer")
 * @ORM\Entity(repositoryClass="PraiseItBundle\Entity\PrayerRepository")
 */
class Prayer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="sacrifice", type="string", length=255)
     */
    private $sacrifice;

    /**
     * @var datetime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


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
     * @return Prayer
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
     * Set sacrifice
     *
     * @param string $sacrifice
     * @return Prayer
     */
    public function setSacrifice($sacrifice)
    {
        $this->sacrifice = $sacrifice;

        return $this;
    }

    /**
     * Get sacrifice
     *
     * @return string
     */
    public function getSacrifice()
    {
        return $this->sacrifice;
    }

    /**
     * Set date
     *
     * @param datetime $date
     * @return Sacrifice
     */
    public function setDate($date = null)
    {
        $this->date = new \DateTime();

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
}
