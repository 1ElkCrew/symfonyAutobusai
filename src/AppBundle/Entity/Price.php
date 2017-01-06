<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Price
 *
 * @ORM\Table(name="price")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PriceRepository")
 */
class Price
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
     * @ORM\Column(name="stopPrice", type="decimal", precision=19, scale=4)
     */
    private $stopPrice;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Route")
     */
    private $route;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RouteStop")
     */
    private $stop1;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RouteStop")
     *
     */
    private $stop2;

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
     * Set stopPrice
     *
     * @param string $stopPrice
     *
     * @return Price
     */
    public function setStopPrice($stopPrice)
    {
        $this->stopPrice = $stopPrice;

        return $this;
    }

    /**
     * Get stopPrice
     *
     * @return string
     */
    public function getStopPrice()
    {
        return $this->stopPrice;
    }
}