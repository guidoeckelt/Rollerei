<?php
/**
 * Created by PhpStorm.
 * User: Guido
 * Date: 24.07.2016
 * Time: 19:37
 */

namespace BackEndBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * Platform
 *
 * @ORM\Table(name="platfroms")
 * @ORM\Entity()
 */
class Platform
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    function __toString()
    {
        return $this->name;
    }


}