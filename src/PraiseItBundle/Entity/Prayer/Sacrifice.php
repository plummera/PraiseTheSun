<?php

namespace PraiseItBundle\Entity\Prayer;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sacrifice
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Sacrifice
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
     * @ORM\Column(name="Sacrifice", type="string", length=255)
     */
    private $sacrifice;

    /**
     * @var timedate
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
     * Set sacrifice
     *
     * @param string $sacrifice
     * @return Sacrifice
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
