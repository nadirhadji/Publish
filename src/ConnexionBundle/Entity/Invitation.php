<?php

namespace ConnexionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invitation
 *
 * @ORM\Table(name="invitation")
 * @ORM\Entity(repositoryClass="ConnexionBundle\Repository\InvitationRepository")
 */
class Invitation
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
     * @var bool
     *
     * @ORM\Column(name="statut", type="boolean")
     */
    private $statut;

    /**
     * @ORM\OneToOne(targetEntity="ConnexionBundle\Entity\User",cascade={"persist"})
     * @ORM\JoinColumn(nullable=False)
     */
    private $expediteur;

    /**
     * @ORM\OneToOne(targetEntity="ConnexionBundle\Entity\User",cascade={"persist"})
     * @ORM\JoinColumn(nullable=False)
     */
    private $destinataire;


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
     * Set statut.
     *
     * @param bool $statut
     *
     * @return Invitation
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut.
     *
     * @return bool
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set expéditeur.
     *
     * @param \ConnexionBundle\Entity\User $expéditeur
     *
     * @return Invitation
     */
    public function setExpediteur(\ConnexionBundle\Entity\User $expediteur)
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    /**
     * Get expéditeur.
     *
     * @return \ConnexionBundle\Entity\User
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * Set destinataire.
     *
     * @param \ConnexionBundle\Entity\User $destinataire
     *
     * @return Invitation
     */
    public function setDestinataire(\ConnexionBundle\Entity\User $destinataire)
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    /**
     * Get destinataire.
     *
     * @return \ConnexionBundle\Entity\User
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }
}
