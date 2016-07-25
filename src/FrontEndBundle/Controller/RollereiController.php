<?php

namespace FrontEndBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RollereiController extends Controller
{
    /**
     * @Route("/", name="rollerei.startseite")
     * @Template()
     */
    public function startseiteAction()
    {
        $videoService = $this->get('backend.video');

        $videos = $videoService->findAllVideos();
        return array('videos'=>$videos);
    }

    /**
     * @Route("/RollereiVideos", name="rollerei.videos")
     * @Template()
     */
    public  function rollereiVideosAction()
    {
        return array();
    }

    /**
     * @Route("/Stuff", name="rollerei.stuff")
     * @Template()
     */
    public  function stuffAction()
    {

        return array();
    }


    /**
     * @Route("/RollereiVideos", name="rollerei.photos")
     * @Template()
     */
    public  function brettliebePhotosAction()
    {

        return array();
    }
}
