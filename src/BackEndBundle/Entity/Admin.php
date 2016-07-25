<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admins")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\AdminRepository")
 */
class Admin
{
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var boolean
     * @ORM\Column(name="super", type="boolean")
     */
    private $super;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Admin
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
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return boolean
     */
    public function isSuper()
    {
        return $this->super;
    }

    /**
     * @param boolean $super
     */
    public function setSuper($super)
    {
        $this->super = $super;
    }


}

