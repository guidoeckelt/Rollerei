<?php
/**
 * Created by PhpStorm.
 * User: Guido
 * Date: 24.07.2016
 * Time: 18:55
 */

namespace FrontEndBundle\Controller;


use BackEndBundle\Entity\Video;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * @Route("/admin/",name="admin.startseite")
     *
     */
    public function startseiteAction()
    {
        return $this->redirectToRoute('admin.videos');
    }


    /**
     * @Route("/admin/videos",name="admin.videos")
     */
    public function showVideosAction()
    {
        return $this->render('FrontEndBundle:Admin:showVideos.html.twig',array());
    }

    /**
     * @Route("/admin/photos",name="admin.photos")
     */
    public function showPhotosAction()
    {
        return $this->render('FrontEndBundle:Admin:showPhotos.html.twig',array());
    }

    /**
     * @Route("/admin/events",name="admin.events")
     */
    public function showEventsAction()
    {
        return $this->render('FrontEndBundle:Admin:showEvents.html.twig',array());
    }

    /**
     * @Route("/admin/admins",name="admin.admins")
     */
    public function showAdminsAction()
    {
        return $this->render('FrontEndBundle:Admin:showAdmins.html.twig',array());
    }
}