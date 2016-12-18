<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RouteStop
 *
 * @ORM\Table(name="route_stop")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RouteStopRepository")
 */
class RouteStop
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Stop", inversedBy="routes")
     *
     */
    private $stop;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Route", inversedBy="route")
     *
     */
    private $route;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="time")
     */
    private $time;

    /**
     * @var int
     *
     * @ORM\Column(name="place", type="integer")
     */
    private $place;


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
     * Set stop
     *
     * @param string $stop
     *
     * @return RouteStop
     */
    public function setStop($stop)
    {
        $this->stop = $stop;

        return $this;
    }

    /**
     * Get stop
     *
     * @return string
     */
    public function getStop()
    {
        return $this->stop;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return RouteStop
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set place
     *
     * @param integer $place
     *
     * @return RouteStop
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return int
     */
    public function getPlace()
    {
        return $this->place;
    }
}

