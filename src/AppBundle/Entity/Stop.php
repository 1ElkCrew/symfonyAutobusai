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
        $this->stops = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add stop
     *
     * @param \AppBundle\Entity\RouteStop $stop
     *
     * @return Stop
     */
    public function addStop(\AppBundle\Entity\RouteStop $stop)
    {
        $this->stops[] = $stop;

        return $this;
    }

    /**
     * Remove stop
     *
     * @param \AppBundle\Entity\RouteStop $stop
     */
    public function removeStop(\AppBundle\Entity\RouteStop $stop)
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
