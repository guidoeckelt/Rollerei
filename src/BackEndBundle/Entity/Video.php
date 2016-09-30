<?php

namespace BackEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Video
 *
 * @ORM\Table(name="videos")
 * @ORM\Entity(repositoryClass="BackEndBundle\Repository\VideoRepository")
 */
class Video
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotNull(message="Video Name muss gesetzt sein")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=500)
     * @Assert\NotNull(message="Video Url muss gesetzt sein")
     * @Assert\Url(message="Video-Url muss ein richtige Url sein kappa", protocols={"http","https"})
     */
    private $url;

    /**
     * @var Platform
     *
     * @ORM\ManyToOne(targetEntity="BackEndBundle\Entity\Platform")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull(message="Video Platform muss gesetzt sein")
     */
    private $platform;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date")
     * @Assert\NotNull(message="Erstelldatum des Videos muss gesetzt sein")
     */
    private $created;

    /**
     * @var Event
     *
     * @ORM\ManyToOne(targetEntity="BackEndBundle\Entity\Event")
     * @ORM\JoinColumn(nullable=true)
     */
    private $event;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Video
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Video
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set platform
     *
     * @param Platform $platform
     *
     * @return Video
     */
    public function setPlatform($platform)
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get platform
     *
     * @return Platform
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param Event $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }


}

