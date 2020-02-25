<?php

namespace BlogBundle\Entity;

use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use SBC\NotificationsBundle\Builder\NotificationBuilder;
use SBC\NotificationsBundle\Model\NotifiableInterface;

use Doctrine\ORM\Mapping as ORM;

/**
 * Blog
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\BlogRepository")
 * * @Vich\Uploadable
 */
class Blog implements NotifiableInterface, \JsonSerializable
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
     * @var boolean
     *
     * @ORM\Column(name="accept", type="boolean")
     */
    private $accept;

    /**
     * @return bool
     */
    public function isAccept()
    {
        return $this->accept;
    }

    /**
     * @param bool $accept
     */
    public function setAccept($accept)
    {
        $this->accept = $accept;
    }



    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumn(name="categorie",referencedColumnName="id")
     *
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;


    /**
     * @Vich\UploadableField(mapping="uploads", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="Idauthor",referencedColumnName="id")
     *
     */
    private $author;

    /**
     * @var int
     *
     * @ORM\Column(name="repliesnumber", type="bigint" , nullable=true)
     */
    private $repliesnumber;
    /**
     * @var int
     *
     * @ORM\Column(name="likesnumber", type="bigint", nullable=true)
     */
    private $likesnumber;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;


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
     * @return int
     */
    public function getRepliesnumber()
    {
        return $this->repliesnumber;
    }

    /**
     * @param int $repliesnumber
     */
    public function setRepliesnumber($repliesnumber)
    {
        $this->repliesnumber = $repliesnumber;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Blog
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Blog
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }


    /**
     * Set image
     *
     * @param string $image
     *
     * @return Blog
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->datePublication = new \DateTime('now');
        }
    }

    /**
     * Get imageFile
     *
     * @return string
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Blog
     */
    public function setauthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Blog
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @return int
     */
    public function getLikesnumber()
    {
        return $this->likesnumber;
    }

    /**
     * @param int $likesnumber
     */
    public function setLikesnumber($likesnumber)
    {
        $this->likesnumber = $likesnumber;
    }
    public function notificationsOnCreate(NotificationBuilder $builder)
    {
        $notification = new Notifcation();
        $notification
            ->setTitle('New comment')
            ->setDescription('New comment has been added "'.$this->content.'"')
            ->setRoute('comment_show')// I suppose you have a show route for your entity
            ->setParameters(array('id' => $this->id))
        ;
        $builder->addNotification($notification);

        return $builder;
    }

    public function notificationsOnUpdate(NotificationBuilder $builder)
    {
        $notification = new Notifcation();
        $notification
            ->setTitle('Comment updated')
            ->setDescription('"'.$this->content.'" has been updated')
            ->setRoute('comment_show')
            ->setParameters(array('id' => $this->id))
        ;
        $builder->addNotification($notification);

        return $builder;
    }
    public function notificationsOnDelete(NotificationBuilder $builder)
    {
        // in case you don't want any notification for a special event
        // you can simply return an empty $builder
        return $builder;
    }


    function jsonSerialize()
    {
        return get_object_vars($this);
    }



}
