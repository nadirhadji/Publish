<?php

namespace ConnexionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FluxRSS
 *
 * @ORM\Table(name="flux_r_s_s")
 * @ORM\Entity(repositoryClass="ConnexionBundle\Repository\FluxRSSRepository")
 */
class FluxRSS
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFluxRss", type="datetime")
     */
    private $dateFluxRss;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity="ConnexionBundle\Entity\CentreInteret",cascade={"persist"})
     * @ORM\JoinColumn(nullable=False)
     */
    private $centreInteret;


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
     * Set nom.
     *
     * @param string $nom
     *
     * @return FluxRSS
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set dateFluxRss.
     *
     * @param \DateTime $dateFluxRss
     *
     * @return FluxRSS
     */
    public function setDateFluxRss($dateFluxRss)
    {
        $this->dateFluxRss = $dateFluxRss;

        return $this;
    }

    /**
     * Get dateFluxRss.
     *
     * @return \DateTime
     */
    public function getDateFluxRss()
    {
        return $this->dateFluxRss;
    }

    /**
     * Set ville.
     *
     * @param string $ville
     *
     * @return FluxRSS
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville.
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set centreInteret.
     *
     * @param \ConnexionBundle\Entity\CentreInteret $centreInteret
     *
     * @return FluxRSS
     */
    public function setCentreInteret(\ConnexionBundle\Entity\CentreInteret $centreInteret)
    {
        $this->centreInteret = $centreInteret;

        return $this;
    }

    /**
     * Get centreInteret.
     *
     * @return \ConnexionBundle\Entity\CentreInteret
     */
    public function getCentreInteret()
    {
        return $this->centreInteret;
    }
}
