<?php
/**
 * Created by PhpStorm.
 * User: Guido
 * Date: 03.11.2016
 * Time: 23:25
 */

namespace BackEndBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class EventController extends Controller
{
    /**
     * @Route("/event", name="api.event.all")
     * @return JsonResponse
     */
    public function findAllEventsAction()
    {
        $eventService = $this->get('backend.event');
        $serializer = $this->get('serializer');

        $events = $eventService->findAllEvents();
        $jsonEvents = $serializer->serialize($events,'json');

        return new JsonResponse($jsonEvents);
    }

    // TODO Where does platforms belong to
    /**
     * @Route("/platform", name="api.platform.all")
     * @return JsonResponse
     */
    public function findAllPlatformsAction()
    {
        $platformService = $this->get('backend.platform');
        $serializer = $this->get('serializer');

        $platforms = $platformService->findAllPlatforms();
        $jsonPlatforms = $serializer->serialize($platforms,'json');

        return new JsonResponse($jsonPlatforms);
    }
}