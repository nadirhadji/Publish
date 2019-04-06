<?php
namespace ConnexionBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use ConnexionBundle\Entity\User;
use ConnexionBundle\Entity\Document;
use ConnexionBundle\Entity\Reaction;

/**
 * Publication
 *
 * @ORM\Table(name="publication")
 * @ORM\Entity(repositoryClass="ConnexionBundle\Repository\PublicationRepository")
 */
class Publication
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
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePublication", type="datetime")
     */
    private $datePublication;

    /**
     * @ORM\ManyToOne(targetEntity="ConnexionBundle\Entity\User",cascade={"persist"})
     * @ORM\JoinColumn(nullable=False)
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="ConnexionBundle\Entity\Document",cascade={"persist"})
     */
    protected $image;

    /**
     * @ORM\OneToMany(targetEntity="ConnexionBundle\Entity\Reaction", mappedBy="publication")
     */
    private $reactions;

    public function getId()
    {
        return $this->id;
    }
    /**
     * Set contenu.
     *
     * @param string $contenu
     *
     * @return Publication
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
        return $this;
    }
    /**
     * Get contenu.
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }
    /**
     * Set datePublication.
     *
     * @param \DateTime $datePublication
     *
     * @return Publication
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;
        return $this;
    }
    /**
     * Get datePublication.
     *
     * @return \DateTime
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }
    /**
     * Set user.
     *
     * @param \ConnexionBundle\Entity\User
     *
     * @return Publication
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
    /**
     * Get user.
     *
     * @return \ConnexionBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * Set image.
     *
     * @param \ConnexionBundle\Entity\Document|null $image
     *
     * @return Publication
     */
    public function setImage(Document $image )
    {
        $this->image = $image;
        return $this;
    }
    /**
     * Get image.
     *
     * @return \ConnexionBundle\Entity\Document|null
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reactions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add reaction.
     *
     * @param \ConnexionBundle\Entity\Reaction $reaction
     *
     * @return Publication
     */
    public function addReaction(Reaction $reaction)
    {
        $this->reactions[] = $reaction;

        return $this;
    }

    /**
     * Remove reaction.
     *
     * @param \ConnexionBundle\Entity\Reaction $reaction
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeReaction(Reaction $reaction)
    {
        return $this->reactions->removeElement($reaction);
    }

    /**
     * Get reactions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReactions()
    {
        return $this->reactions;
    }

    public function isLikedByUser(User $user)
    {
        foreach ($this->reactions as $reaction)
        {
            if ($reaction->getUser() == $user)
                return true;
        }

        return false;
    }
}
