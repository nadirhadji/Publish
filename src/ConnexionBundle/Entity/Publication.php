<?php

namespace ConnexionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ConnexionBundle\Entity\User;

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
     * @ORM\ManyToOne(targetEntity="ConnexionBundle\Entity\Contenu",cascade={"persist"})
     */
    private $contenu_doc;

    /**
     * @ORM\ManyToOne(targetEntity="ConnexionBundle\Entity\FluxRSS",cascade={"persist"})
     */
    private $fluxRSS;

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
     * Set fluxRSS.
     *
     * @param \ConnexionBundle\Entity\FluxRSS|null $fluxRSS
     *
     * @return Publication
     */
    public function setFluxRSS(\ConnexionBundle\Entity\FluxRSS $fluxRSS = null)
    {
        $this->fluxRSS = $fluxRSS;

        return $this;
    }

    /**
     * Get fluxRSS.
     *
     * @return \ConnexionBundle\Entity\FluxRSS|null
     */
    public function getFluxRSS()
    {
        return $this->fluxRSS;
    }

    /**
     * Set contenuDoc.
     *
     * @param \ConnexionBundle\Entity\Contenu|null $contenuDoc
     *
     * @return Publication
     */
    public function setContenuDoc(\ConnexionBundle\Entity\Contenu $contenuDoc = null)
    {
        $this->contenu_doc = $contenuDoc;

        return $this;
    }

    /**
     * Get contenuDoc.
     *
     * @return \ConnexionBundle\Entity\Contenu|null
     */
    public function getContenuDoc()
    {
        return $this->contenu_doc;
    }
}
