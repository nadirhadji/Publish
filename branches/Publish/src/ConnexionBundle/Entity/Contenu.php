<?php

namespace ConnexionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contenu
 *
 * @ORM\Table(name="contenu")
 * @ORM\Entity(repositoryClass="ConnexionBundle\Repository\ContenuRepository")
 */
class Contenu
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
     * @ORM\Column(name="texteAlternatif", type="string", length=255)
     */
    private $texteAlternatif;


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
     * Set texteAlternatif.
     *
     * @param string $texteAlternatif
     *
     * @return Contenu
     */
    public function setTexteAlternatif($texteAlternatif)
    {
        $this->texteAlternatif = $texteAlternatif;

        return $this;
    }

    /**
     * Get texteAlternatif.
     *
     * @return string
     */
    public function getTexteAlternatif()
    {
        return $this->texteAlternatif;
    }
}
