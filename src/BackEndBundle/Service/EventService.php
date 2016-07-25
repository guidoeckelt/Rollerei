<?php
/**
 * Created by PhpStorm.
 * User: Guido
 * Date: 23.07.2016
 * Time: 21:59
 */

namespace BackEndBundle\Service;


use Doctrine\ORM\EntityManagerInterface;

class EventService
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * VideoService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
}