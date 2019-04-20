<?php

namespace ConnexionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CentreInteret
 *
 * @ORM\Table(name="centre_interet")
 * @ORM\Entity(repositoryClass="ConnexionBundle\Repository\CentreInteretRepository")
 */
class CentreInteret
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
     * @var boolean
     *
     * @ORM\Column(name="is_music", type="boolean")
     */
    private $IsMusic;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_sport", type="boolean")
     */
    private $IsSport;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_news", type="boolean")
     */
    private $IsNews;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_travel", type="boolean")
     */
    private $IsTravel;

    /**
     * @ORM\ManyToOne(targetEntity="ConnexionBundle\Entity\User",cascade={"persist"})
     * @ORM\JoinColumn(nullable=False)
     */
    private $user;


    /**
     * Permet de récupérer l'identifiant du Centre d'interet de l'utilisateur
     *
     * @return int l'identifiant du centre intérêt
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * associe le Centre d'intéret à un utilisateur
     *
     * @param string $user l'utilisateur en question
     *
     * @return CentreInteret
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Permet de récupérer l'utilisateur correspindant au centre d'intérêt
     *
     * @return User l'utilisateur correspondant
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Permet de selectionner le champs Musique du centre d'intérêt
     *
     * @param boolean $isMusic un booléen, true si music est coché, false sinon
     *
     * @return CentreInteret
     */
    public function setIsMusic($IsMusic)
    {
        $this->IsMusic = $IsMusic;

        return $this;
    }

    /**
     * Permet de récuperer le choix pour music
     *
     * @return boolean true si music est coché, false sinon
     */
    public function getIsMusic()
    {
        return $this->IsMusic;
    }

    /**
     * Permet de selectionner le champs Sport du centre d'intérêt
     *
     * @param boolean $IsSport un booléen, true si sport est coché, false sinon
     *
     * @return CentreInteret
     */
    public function setIsSport($IsSport)
    {
        $this->IsSport = $IsSport;

        return $this;
    }

    /**
     * Permet de récuperer le choix pour sport
     *
     * @return boolean true si sport est coché, false sinon
     */
    public function getIsSport()
    {
        return $this->IsSport;
    }

    /**
     * Permet de selectionner le champs Actualité du centre d'intérêt
     *
     * @param boolean $IsNews un booléen, true si sport est coché, false sinon
     *
     * @return CentreInteret
     */
    public function setIsNews($IsNews)
    {
        $this->IsNews = $IsNews;

        return $this;
    }

    /**
     * Permet de récuperer le choix pour news
     *
     * @return boolean true si news est coché, false sinon
     *
     */
    public function getIsNews()
    {
        return $this->IsNews;
    }

    /**
     * Permet de selectionner le champs Voyage du centre d'intérêt
     *
     * @param boolean $IsTravel un booléen, true si travel est coché, false sinon
     *
     * @return CentreInteret
     */
    public function setIsTravel($IsTravel)
    {
        $this->IsTravel = $IsTravel;

        return $this;
    }

    /**²
     * Permet de récuperer le choix pour travel
     *
     * @return boolean true si travel est coché, false sinon
     */
    public function getIsTravel()
    {
        return $this->IsTravel;
    }


}
