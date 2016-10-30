<?php
/**
 * Created by PhpStorm.
 * User: Guido
 * Date: 02.10.2016
 * Time: 23:39
 */

namespace BackEndBundle\Service;


use BackEndBundle\Entity\Photo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Filesystem\Filesystem;

class PhotoService
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * VideoService constructor.
     * @param EntityManagerInterface
     */
    public function __construct($em)
    {
        $this->em = $em;
    }
    /**
     * @return Photo[]
     */
    public function findAllVideos(){
        return $this->em->getRepository('BackEndBundle:Photo')->findBy(array(),array('created'=>'ASC'));
    }

    /**
     * @param Photo $photo
     */
    public function create($photo)
    {
        $this->assignFileLocationAndUrl($photo);
        $this->em->persist($photo);
        $this->em->flush();
    }

    /**
     * @param Photo $photo
     * @return array
     */
    private function assignFileLocationAndUrl($photo)
    {
        $localPart = "D:\\XAMPP\\htdocs\\rollerei\\";
//        $urlPart = "web/bundles/frontend/img/";
        $urlPart = "web/image/";
        $random = rand(1,9);
        $photoPart = $random."-".$photo->getTitle().".".$photo->getFormat();
        $path = $localPart.$urlPart.$photoPart;
        $url = "/rollerei/".$urlPart.$photoPart;
        $photo->setPath($path);
        $photo->setUrl($url);
        $photo->getImage()->move($localPart.$urlPart,$photoPart);
    }

}