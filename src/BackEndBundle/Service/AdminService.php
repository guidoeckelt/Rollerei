<?php
/**
 * Created by PhpStorm.
 * User: Guido
 * Date: 24.07.2016
 * Time: 18:44
 */

namespace BackEndBundle\Service;


use Doctrine\ORM\EntityManagerInterface;

class AdminService
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