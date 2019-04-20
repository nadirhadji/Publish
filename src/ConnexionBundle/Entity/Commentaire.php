<?php

namespace ConnexionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ConnexionBundle\Entity\Publication;
use ConnexionBundle\Entity\User;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="ConnexionBundle\Repository\CommentaireRepository")
 */
class Commentaire
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
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity="ConnexionBundle\Entity\Publication",cascade={"persist"},inversedBy="commentaires")
     * @ORM\JoinColumn(nullable=False)
     */
    private $publication;

    /**
     * @ORM\ManyToOne(targetEntity="ConnexionBundle\Entity\User",cascade={"persist"},inversedBy="commentaires")
     * @ORM\JoinColumn(nullable=False)
     */
    private $user;


    /**
     * Permet de récupérer l'idenfiant du commentaire
     *
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Permet d'éditer un commentaire
     *
     * @param string $text le texte correspondant au commentaire
     *
     * @return Commentaire
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Permet de récuperer le contenu du commentaire
     *
     * @return string  qui est le contenu du commentaire
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Affecte le commentaire à la publication correspondante
     *
     * @param Publication $publication la publication propriétaire du commentaire
     *
     * @return Commentaire
     */
    public function setPublication(Publication $publication)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Permet de récuperer la publication propriétaire du commentaire
     *
     * @return Publication la publication propriétaire du commentaire
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Associe le commentaire à son auteur
     *
     * @param User $user l'utilisateur qui a édité le commentaire
     *
     * @return Commentaire
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Permet de récupérer l'auteur du commentaire
     *
     * @return User l'auteur du commentaire
     */
    public function getUser()
    {
        return $this->user;
    }
}
