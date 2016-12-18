<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stop
 *
 * @ORM\Table(name="stop")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StopRepository")
 */
class Stop
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
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RouteStop", mappedBy="stop")
     */
    private $stops;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RouteStop", mappedBy="route")
     */
    private $routes;

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
     * @return Stop
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
     * Constructor
     */
    public function __construct()
    {
        $this->routes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add route
     *
     * @param \AppBundle\Entity\Route $route
     *
     * @return Stop
     */
    public function addRoute(\AppBundle\Entity\Route $route)
    {
        $this->routes[] = $route;

        return $this;
    }

    /**
     * Remove route
     *
     * @param \AppBundle\Entity\Route $route
     */
    public function removeRoute(\AppBundle\Entity\Route $route)
    {
        $this->routes->removeElement($route);
    }

    /**
     * Get routes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}
