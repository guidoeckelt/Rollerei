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
     * @Template()
     */
    public function startseiteAction()
    {
        return array();
    }

    /**
     * @Route("/admin/video/form",name="admin.video-form")
     * @Template()
     *
     * @param Request $request
     * @return array
     */
    public function createVideoAction(Request $request)
    {
        $video = new Video();
        $formBuilder = $this->createFormBuilder($video);
        $formBuilder->add('name');
        $formBuilder->add('url',UrlType::class);
        $formBuilder->add('platform');
        $formBuilder->add('created',DateType::class);
        $formBuilder->add('event');
        $formBuilder->add('Erstellen',SubmitType::class);
        $form = $formBuilder->getForm();
        if($request->isMethod('POST'))
        {
            $form->handleRequest($request);
            if($form->isValid()){
                $videoService = $this->get('backend.video');
                $videoService->create($video);
            }
        }
        return array('form'=>$form->createView());
    }

}