<?php

namespace BackEndBundle\Controller;

use BackEndBundle\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

class VideoController extends Controller
{
    /**
     * @Route("/video", name="api.video.all")
     * @return JsonResponse
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
        $created = $request->request->get("created");
        if(null == $created)
        {
            $created = new DateTime();
        }
        $video->setCreated($created);
        $platformId = $request->request->get("platform");
        $platform = $platformService->getPlatformById($platformId);
        $video->setPlatform($platform);

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
