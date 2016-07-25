<?php
/**
 * Created by PhpStorm.
 * User: Guido
 * Date: 23.07.2016
 * Time: 21:56
 */

namespace BackEndBundle\Service;


use BackEndBundle\Entity\Video;
use Doctrine\ORM\EntityManagerInterface;

class VideoService
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

    /**
     * @return Video[]
     */
    public function findAllVideos(){
        return $this->em->getRepository('BackEndBundle:Video')->findBy(array(),array('created'=>'ASC'));
    }

    /**
     * @param Video $video
     */
    public function create($video)
    {
        $this->em->persist($video);
    }
}