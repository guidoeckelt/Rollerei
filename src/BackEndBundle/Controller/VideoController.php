<?php

namespace BackEndBundle\Controller;

use BackEndBundle\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class VideoController extends Controller
{
    /**
     * @Route("/video", name="api.video.all")
     */
    public function findAllVideosAction()
    {
        $videoService = $this->get('backend.video');
        $serializer = $this->get('serializer');

        $videos = $videoService->findAllVideos();
        $jsonVideos = $serializer->serialize($videos,'json');

        return new JsonResponse($jsonVideos);
    }

    /**
     * @Route("/video/create", name="api.video.create")
     * @param Request $request
     * @return JsonResponse
     */
    public function createVideoAction(Request $request)
    {
        $videoService = $this->get('backend.video');
        $platformService = $this->get('backend.platform');
        $validator = $this->get("validator");
        $serializer = $this->get('serializer');

        $video = new Video();
        $video->setName($request->request->get("name"));
        $video->setUrl($request->request->get("url"));
        $video->setCreated(new \DateTime());
        $platformStr = $request->request->get("platform");
        $platform = $platformService->getPlatformByName($platformStr);
        $video->setPlatform($platform);

        //$videoService->validate($video);
        $validationConstraints = $validator->validate($video);

        if($validationConstraints->count() < 1)
        {
            $videoService->create($video);
            $responseJson = $serializer->serialize("OK",'json');
            $response = new JsonResponse($responseJson);
        }
        else
        {
            $validationConstraintsJson = $serializer->serialize($validationConstraints,'json');
            $response = new JsonResponse($validationConstraintsJson, 422);
        }
        return $response;
    }
}
