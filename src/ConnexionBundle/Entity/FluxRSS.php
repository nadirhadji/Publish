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
     * Récupère l'identifiant du flux
     *
     * @return int l'identifiant correspondant
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Affecte un nom au flux
     *
     * @param string $nom le nom du flux
     *
     * @return FluxRSS
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Récupère le nom du flux
     *
     * @return string le nom du flux
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Affecte la date du flux
     *
     * @param \DateTime $dateFluxRss la date du flux
     *
     * @return FluxRSS
     */
    public function setDateFluxRss($dateFluxRss)
    {
        $this->dateFluxRss = $dateFluxRss;

        return $this;
    }

    /**
     * Récupère la date du flux
     *
     * @return \DateTime la date du flux
     */
    public function getDateFluxRss()
    {
        return $this->dateFluxRss;
    }

    /**
     * Affecte la ville du flux
     *
     * @param string $ville la ville correspondant au flux
     *
     * @return FluxRSS
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Récupère la ville correspondant au flux
     *
     * @return string la ville correspondant au flux
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Affecte l'url de l'image rattaché au flux
     *
     * @param string $uRLImage l'url de l'image rattaché au flux
     *
     * @return FluxRSS
     */
    public function setURLImage($uRLImage)
    {
        $this->URLImage = $uRLImage;

        return $this;
    }

    /**
     * Récupère l url de l'image du flux
     *
     * @return string l'url de l'image du flux
     */
    public function getURLImage()
    {
        return $this->URLImage;
    }

    /**
     * Ajoute une description au flux
     *
     * @param string $description la description du flux
     *
     * @return FluxRSS
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Récupère la description du flux
     *
     * @return string la description du flux
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Ajoute l'url du flux
     *
     * @param string $url l'url du flux
     *
     * @return FluxRSS
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Récupère l'url du flux
     *
     * @return string l'url du flux
     */
    public function getUrl()
    {
        return $this->url;
    }
}
