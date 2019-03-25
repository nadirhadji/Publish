<?php

namespace ConnexionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="ConnexionBundle\Repository\MessageRepository")
 */
class Message
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
     * @ORM\OneToOne(targetEntity="ConnexionBundle\Entity\Contenu",cascade={"persist"})
     */
    private $contenu;

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
     * Set text.
     *
     * @param string $text
     *
     * @return Message
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set expéditeur.
     *
     * @param \ConnexionBundle\Entity\User $expéditeur
     *
     * @return Message
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
     * @return Message
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

    /**
     * Set contenu.
     *
     * @param \ConnexionBundle\Entity\Contenu|null $contenu
     *
     * @return Message
     */
    public function setContenu(\ConnexionBundle\Entity\Contenu $contenu = null)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu.
     *
     * @return \ConnexionBundle\Entity\Contenu|null
     */
    public function getContenu()
    {
        return $this->contenu;
    }
}
