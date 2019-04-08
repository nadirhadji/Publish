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
     * @var string
     *
     * @ORM\Column(name="url", type="text")
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFluxRss", type="datetime")
     */
    private $dateFluxRss;

        /**
     * @var string
     *
     * @ORM\Column(name="urlimage", type="string", length=255)
     */
        private $URLImage;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="text")
     */
    private $ville;



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
     * Set uRLImage.
     *
     * @param string $uRLImage
     *
     * @return FluxRSS
     */
    public function setURLImage($uRLImage)
    {
        $this->URLImage = $uRLImage;

        return $this;
    }

    /**
     * Get uRLImage.
     *
     * @return string
     */
    public function getURLImage()
    {
        return $this->URLImage;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return FluxRSS
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return FluxRSS
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
