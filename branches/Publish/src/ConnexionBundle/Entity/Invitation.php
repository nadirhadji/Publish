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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="ConnexionBundle\Entity\User", inversedBy="mesInvitationsEnvoyees")
     */
    private $expediteur;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="ConnexionBundle\Entity\User", inversedBy="mesInvitationsRecues")
     */
    private $destinataire;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_accepted", type="boolean")
     */
    private $isAccepted;

    /**
     * Set isAccepted.
     *
     * @param bool $isAccepted
     *
     * @return Friendship
     */
    public function setIsAccepted($isAccepted)
    {
        $this->isAccepted = $isAccepted;

        return $this;
    }

    /**
     * Get isAccepted.
     *
     * @return bool
     */
    public function getIsAccepted()
    {
        return $this->isAccepted;
    }


    /**
     * Set expediteur.
     *
     * @param \ConnexionBundle\Entity\User $expediteur
     *
     * @return Invitation
     */
    public function setExpediteur(\ConnexionBundle\Entity\User $expediteur)
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    /**
     * Get expediteur.
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
