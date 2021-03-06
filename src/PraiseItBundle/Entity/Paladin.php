<?php
// src/PraiseItBundle/Entity/Paladin.php

namespace PraiseItBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="Paladins")
 */
class Paladin extends BaseUser
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $telephone;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $firstname;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $lastname;

	/**
	 * @ORM\Column(type="integer", length=3)
	 *
	 * @Assert\Length(
	 *		min=1,
	 *		max=3,
	 *	)
	 */
	protected $age;

	public function getId()
	{
		return $this->id;
	}

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Paladin
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Paladin
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

		/**
		 *
		 * @param integer $age
		 * @return Paladin
		 */
		public function setAge($age)
		{
				$this->age = $age;

				return $this;
		}

		/**
		 * Get age
		 *
		 * @return integer
		 */
		public function getAge()
		{
			return $this->age;
		}

		/**
		 *
		 * @param integer $telephone
		 * @return Paladin
		 */
		public function setTelephone($telephone)
		{
				$this->telephone = $telephone;

				return $this;
		}

		/**
		 *
		 * @return integer
		 */
		public function getTelephone()
		{
				return $this->telephone;
		}
}
