<?php

namespace BackEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class VideoController extends Controller
{
    /**
     * @Route("/video")
     */
    public function findAllVideosAction()
    {
        $videoService = $this->get('backend.video');

        $videos = $videoService->findAllVideos();
        return new JsonResponse($videos);
    }
}
