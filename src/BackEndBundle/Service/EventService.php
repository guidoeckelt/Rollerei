<?php
/**
 * Created by PhpStorm.
 * User: Guido
 * Date: 23.07.2016
 * Time: 21:59
 */

namespace BackEndBundle\Service;


use BackEndBundle\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;

class EventService
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * EventService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    /**
     * @return Event[]
     */
    public function findAllEvents()
    {
        return $this->em->getRepository('BackEndBundle:Event')->findAll();
    }


    /**
     * @param Event $event
     */
    public function create(Event $event)
    {
        $this->em->persist($event);
        $this->em->flush();
    }
}