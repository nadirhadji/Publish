<?php

namespace ConnexionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ConnexionBundle\Entity\User;

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
     * affecte la valeur de is accepted
     *
     * @param bool $isAccepted vrai si accepté, faux sinon
     *
     * @return Invitation
     */
    public function setIsAccepted($isAccepted)
    {
        $this->isAccepted = $isAccepted;

        return $this;
    }

    /**
     * Récupère l'etat de l'invitation
     *
     * @return bool true si accepté, false sinon
     */
    public function getIsAccepted()
    {
        return $this->isAccepted;
    }


    /**
     * Permet d'affecter l'expéditeur de l'invitation
     *
     * @param User $expediteur l'expéditeur de l'invitation
     *
     * @return Invitation
     */
    public function setExpediteur(User $expediteur)
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    /**
     * Permet de récupérer l'expéditeur de l'invitation
     *
     * @return User l'expéditeur de l'invitation
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * permet d'affecter le destinataire de l'invitation
     *
     * @param User $destinataire le destinataire de l'invitation
     *
     * @return Invitation
     */
    public function setDestinataire(User $destinataire)
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    /**
     * Permet de récuperer le destinataire de l'invitation
     *
     * @return User le destinataire de l'invitation
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }
}
