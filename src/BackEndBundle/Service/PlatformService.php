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
     * @return Platform[]
     */
    public function findAllPlatforms()
    {
        return $this->em->getRepository('BackEndBundle:Platform')->findAll();
    }

    /**
     * @param $platformStr String
     * @return Platform
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

    /**
     * @param int $id
     * @return Platform | null
     */
    public function getPlatformById($id)
    {
        $platform = null;
        try{
            $platform =$this->em->getRepository('BackEndBundle:Platform')->findOneBy(array('id'=>$id));
        }catch(NonUniqueResultException $nonUniqueResultException){
            return $platform;
        }
        return $platform;
    }

    public function create(Platform $platform)
    {
        $this->em->persist($platform);
        $this->em->flush();
    }
}