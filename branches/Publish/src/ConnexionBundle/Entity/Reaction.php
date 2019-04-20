<?php
namespace ConnexionBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use ConnexionBundle\Entity\Publication;
use ConnexionBundle\Entity\Commentaire;
use ConnexionBundle\Entity\User;

/**
 * Reaction
 *
 * @ORM\Table(name="reaction")
 * @ORM\Entity(repositoryClass="ConnexionBundle\Repository\ReactionRepository")
 */
class Reaction
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
     * @ORM\ManyToOne(targetEntity="ConnexionBundle\Entity\Publication",inversedBy="reactions",cascade={"persist"})
     * @ORM\JoinColumn(nullable=False)
     */
    private $publication;

    /**
     * @ORM\ManyToOne(targetEntity="ConnexionBundle\Entity\User",inversedBy="reactions", cascade={"persist"})
     * @ORM\JoinColumn(nullable=True)
     */
    private $user;

    /**
     * Récupère l'identifiant de la réaction
     *
     * @return int l'identifiant de la réaction
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Associe à la réction une publication
     *
     * @param Publication $publication la publication propriétaire de la réaction
     *
     * @return Reaction
     */
    public function setPublication(Publication $publication)
    {
        $this->publication = $publication;
        return $this;
    }

    /**
     * Récupère la publication
     *
     * @return Publication la publication propriétaire de la réaction
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Associe la réaction à un commentaire
     *
     * @param Commentaire $commentaire le commentaire propriétaire de la réaction
     *
     * @return Reaction
     */
    public function setCommentaire(Commentaire $commentaire)
    {
        $this->commentaire = $commentaire;
        return $this;
    }

    /**
     * Récupère le commentaire correspondant à la réaction
     *
     * @return Commentaire le commentaire propriétaire de la réaction
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Associe la réaction à son auteur
     *
     * @param User $user l'auteur de la reaction
     *
     * @return Reaction
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Récupère l'auteur de la reaction
     *
     * @return User l'auteur de la reaction
     */
    public function getUser()
    {
        return $this->user;
    }
}
