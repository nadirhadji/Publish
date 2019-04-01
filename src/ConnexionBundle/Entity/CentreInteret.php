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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user.
     *
     * @param string $nom
     *
     * @return CentreInteret
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set isMusic.
     *
     * @param boolean $nom
     *
     * @return CentreInteret
     */
    public function setIsMusic($IsMusic)
    {
        $this->IsMusic = $IsMusic;

        return $this;
    }

    /**
     * Get IsMusic.
     *
     * @return boolean
     */
    public function getIsMusic()
    {
        return $this->IsMusic;
    }

    /**
     * Set IsSport.
     *
     * @param boolean $IsMusic
     *
     * @return CentreInteret
     */
    public function setIsSport($IsSport)
    {
        $this->IsSport = $IsSport;

        return $this;
    }

    /**
     * Get IsSport.
     *
     * @return boolean
     */
    public function getIsSport()
    {
        return $this->IsSport;
    }

    /**
     * Set IsNews.
     *
     * @param boolean $IsSport
     *
     * @return CentreInteret
     */
    public function setIsNews($IsNews)
    {
        $this->IsNews = $IsNews;

        return $this;
    }

    /**
     * Get IsNews.
     *
     * @return boolean
     */
    public function getIsNews()
    {
        return $this->IsNews;
    }

    /**
     * Set IsTravel.
     *
     * @param boolean $IsTravel
     *
     * @return CentreInteret
     */
    public function setIsTravel($IsTravel)
    {
        $this->IsTravel = $IsTravel;

        return $this;
    }

    /**²
     * Get IsTravel.
     *
     * @return boolean
     */
    public function getIsTravel()
    {
        return $this->IsTravel;
    }


}
