<?php

namespace ShopBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Reviews
 *
 * @ORM\Table(name="reviews")
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\ReviewsRepository")
 */
class Reviews
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
     * @ORM\ManyToMany(targetEntity="ShopBundle\Entity\Produit", cascade={"persist"}, mappedBy="review")
     * @ORM\JoinTable(name="produit_review")
     */
    private $produit;

    public function __construct()
    {
        $this->produit = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id"  ,referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="ShopBundle\Entity\Produit", cascade={"persist"})
     * @ORM\JoinColumn(name="produit_id" ,referencedColumnName="id" , nullable=true, onDelete="CASCADE")
     */
    private $produitP;

    /**
     * @var int
     *
     * @ORM\Column(name="stars", type="string")
     */
    private $stars;

    /**
     * @var int
     *
     * @ORM\Column(name="title", type="string")
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="description", type="string")
     */
    private $description;

    /**
     * @var datetime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getProduitP()
    {
        return $this->produitP;
    }

    /**
     * @param mixed $produitP
     */
    public function setProduitP($produitP)
    {
        $this->produitP = $produitP;
    }

    /**
     * @return int
     */
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * @param int $stars
     */
    public function setStars($stars)
    {
        $this->stars = $stars;
    }

    /**
     * @return int
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param int $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param int $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return ArrayCollection
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param ArrayCollection $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
    }

    /**
     * @return datetime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param datetime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


}
