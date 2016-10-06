<?php

namespace BackEndBundle\Controller;

use BackEndBundle\Entity\Photo;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PhotoController extends Controller
{
    /**
     * @Route("/photo", name="api.photo.all")
     * @return JsonResponse
     */
    public function findAllPhotosAction()
    {
        $photoService = $this->get('backend.photo');
        $serializer = $this->get('serializer');

        $videos = $photoService->findAllVideos();
        $jsonVideos = $serializer->serialize($videos,'json');

        return new JsonResponse($jsonVideos);
    }

    /**
     * @Route("/photo/create", name="api.photo.create")
     * @param Request $request
     * @return JsonResponse
     */
    public function createPhotoAction(Request $request)
    {
        $serializer = $this->get('serializer');

        $title = $request->request->get("title");
        $format = $request->request->get("format");
        $createdStr = $request->request->get("created");
        $image = $request->files->get('image');
        $imageRdy = $image != null;
        $str = $title.":".$format.":".$createdStr;
        if(!$imageRdy){
            $strJson = $serializer->serialize('NO Image ->'.$str,'json');
            return new JsonResponse($strJson);
        }
        $photoService = $this->get('backend.photo');
        $eventService = $this->get('backend.event');
        $validator = $this->get("validator");

        $photo = new Photo();
        $photo->setTitle($title);
        $photo->setFormat($format);
        $photo->setImage($image);
        if(null == $createdStr)
        {
            $created = new DateTime();
        }else{
            $created = new DateTime();
//            $created = new DateTime($createdStr);
        }
        $photo->setCreated($created);

        //$videoService->validate($video);
        $validationConstraints = $validator->validate($photo);

        if($validationConstraints->count() < 1)
        {
            $photoService->create($photo);
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
