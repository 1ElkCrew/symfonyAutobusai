<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Route
 *
 * @ORM\Table(name="route")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RouteRepository")
 */
class Route
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
     * @ORM\Column(name="route", type="string", length=255)
     */
    private $route;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="time")
     */
    private $time;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_time", type="time")
     */
    private $endTime;

    /**
     * @var string
     */

    private $stops;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=19, scale=4)
     */
    private $price;

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
     * Set route
     *
     * @param string $route
     *
     * @return Route
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return Route
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
     * Constructor
     */
    public function __construct()
    {
        $this->stops = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add stop
     *
     * @param \AppBundle\Entity\Route $stop
     *
     * @return Route
     */
    public function addStop(\AppBundle\Entity\Route $stop)
    {
        $this->stops[] = $stop;

        return $this;
    }

    /**
     * Remove stop
     *
     * @param \AppBundle\Entity\Route $stop
     */
    public function removeStop(\AppBundle\Entity\Route $stop)
    {
        $this->stops->removeElement($stop);
    }

    /**
     * Get stops
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStops()
    {
        return $this->stops;
    }
}
