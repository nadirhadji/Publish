<?php
namespace ConnexionBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use ConnexionBundle\Entity\User;
use ConnexionBundle\Entity\Document;
use ConnexionBundle\Entity\Reaction;
use ConnexionBundle\Entity\Commentaire;
use \Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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
     * @ORM\OneToMany(targetEntity="ConnexionBundle\Entity\Commentaire", mappedBy="publication",cascade={"remove"})
     */
    private $commentaires;

    /**
     * @ORM\OneToMany(targetEntity="ConnexionBundle\Entity\Reaction", mappedBy="publication",cascade={"remove"})
     */
    private $reactions;


    /**
     * Récupère l'identifiant de la publication
     *
     * @return int retourne l'identifiant de la publication
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Complète le contenu de la publication
     *
     * @param string $contenu le contenu de la publication
     *
     * @return Publication
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * récupère le contenu de la publication
     *
     * @return string le contenu de la publication
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Met la date de la création de la publication
     *
     * @param \DateTime $datePublication la date de création de la publication
     *
     * @return Publication
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;
        return $this;
    }

    /**
     * Récupère la date de la publication
     *
     * @return \DateTime la date de la publication
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Définit l'auteur de la publication
     *
     * @param User l'auteur de la publication
     *
     * @return Publication
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Récupère l'auteur de la publication
     *
     * @return User l'auteur de la publication
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Permet d'ajouter/joindre un image avec une publication
     *
     * @param Document $image l'image correspondant à la publication
     *
     * @return Publication
     */
    public function setImage(Document $image )
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Permet de récupérer l'image joint à une publication
     *
     * @returnDocument
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
        $this->reactions = new ArrayCollection();
    }

    /**
     * Associe les réactions correspondantes à la publication.
     *
     * @param Reaction $reaction les reactions concernant la publication
     *
     * @return Publication
     */
    public function addReaction(Reaction $reaction)
    {
        $this->reactions[] = $reaction;

        return $this;
    }

    /**
     * Supprime la réaction
     *
     * @param Reaction $reaction la reaction à supprimer
     *
     * @return boolean VRAI si la collection contient l'element, FAUX sinon.
     */
    public function removeReaction(Reaction $reaction)
    {
        return $this->reactions->removeElement($reaction);
    }

    /**
     * Récupère les réactions concernant la publication
     *
     * @return Collection les réactions dans une Collection
     */
    public function getReactions()
    {
        return $this->reactions;
    }


    /**
     * Ajoute un commentaire à la publication
     *
     * @param Commentaire $commentaire le commentaire correspondant
     *
     * @return Publication
     */
    public function addCommentaire(Commentaire $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Supprime un commentaire sur la publication
     *
     * @param Commentaire $commentaire le commentaire correspondant
     *
     * @return boolean VRAI si la collection contient l'element, FAUX sinon.
     */
    public function removeCommentaire(Commentaire $commentaire)
    {
        return $this->commentaires->removeElement($commentaire);
    }

    /**
     * Récupère tous les commentaires d'une publication dans une Collection
     *
     * @return Collection la liste des commentaires sur la publication
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }


    /**
     * Permet de savoir si la publication est aimé par un utilisateur en particulier
     *
     * @param User $user l'utilisateur dont on veut connaitre si il a aimé la publication ou non
     *
     * @return bool vrai si l'utilisateur $user aime la publication, faux sinon
     */
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
