<?php

namespace ConnexionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="ConnexionBundle\Entity\Publication",cascade={"persist"})
     * @ORM\JoinColumn(nullable=False)
     */
    private $publication;


    /**
     * @ORM\OneToOne(targetEntity="ConnexionBundle\Entity\User",cascade={"persist"})
     * @ORM\JoinColumn(nullable=True)
     */
    private $user;


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
     * Set type.
     *
     * @param string $type
     *
     * @return Reaction
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set publicationr.
     *
     * @param \ConnexionBundle\Entity\Publication $publicationr
     *
     * @return Reaction
     */
    public function setPublication(\ConnexionBundle\Entity\Publication $publication)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publicationr.
     *
     * @return \ConnexionBundle\Entity\Publication
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set commentaire.
     *
     * @param \ConnexionBundle\Entity\Commentaire $commentaire
     *
     * @return Reaction
     */
    public function setCommentaire(\ConnexionBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire.
     *
     * @return \ConnexionBundle\Entity\Commentaire
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set user.
     *
     * @param \ConnexionBundle\Entity\User $user
     *
     * @return Reaction
     */
    public function setUser(\ConnexionBundle\Entity\User $user)
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
}
