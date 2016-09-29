<?php
/**
 * Created by PhpStorm.
 * User: Guido
 * Date: 29.09.2016
 * Time: 22:08
 */

namespace BackEndBundle\Service;


use BackEndBundle\Entity\Platform;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;

class PlatformService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;


    /**
     * PlatformService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct($em)
    {
        $this->em = $em;
    }

    /**
     * @param $platformStr String
     * @return array|\BackEndBundle\Entity\Platform
     */
    public function getPlatformByName($platformStr)
    {
        $platform = null;
        try{
            $platform =$this->em->getRepository('BackEndBundle:Platform')->findOneBy(
                array('name'=>$platformStr));
        }catch(NonUniqueResultException $nonUniqueResultException){
            return new Platform();
        }
        return $platform;
    }
}