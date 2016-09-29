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
use Symfony\Component\Validator\Validator\ValidatorInterface;

class VideoService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * VideoService constructor.
     * @param EntityManagerInterface $em
     * @param ValidatorInterface $validator
     */
    public function __construct($em,$validator)
    {
        $this->em = $em;
        $this->validator = $validator;
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
        $this->em->flush();
    }

    public function validate(Video $video)
    {
        $validationConstraints = $this->validator->validate($video);
        return $validationConstraints;
    }
}