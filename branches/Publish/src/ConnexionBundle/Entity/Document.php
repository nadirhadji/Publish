<?php
namespace ConnexionBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Document
 *
 * @ORM\Table(name="document")
 * @ORM\Entity(repositoryClass="ConnexionBundle\Repository\DocumentRepository")
 */
class Document
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
     * @ORM\Column(name="fichier", type="string", length=255)
     */
    private $fichier;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255,nullable=true)
     *
     */
    private $url;
    /**
     * @ORM\Column(name="alt", type="string", length=255,nullable=true)
     */
    private $alt;

    private $tempFilename;

    /**
     * Récupère l'id du document
     *
     * @return int l'identifiant du document
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * affecte l'url du document
     *
     * @param string $url l'url du document
     *
     * @return Document
     */
    public function setUrl(File $file = null)
    {
        $this->url = $file;
        return $this;
    }
    /**
     * Récupère l'url du document
     *
     * @return string l'url du document
     */
    public function getUrl()
    {
        return $this->url;
    }
    /**
     * affecte un texte alternatif au document
     *
     * @param string $alt le texte alternatif du document
     *
     * @return Document
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
        return $this;
    }
    /**
     * Récupère le texte alternatid du document
     *
     * @return string le texte alternatif du document
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
    /**
     * Permet de récupérer le document télchargé par l'utilisateur
     *
     * @param string $fichier le fichier téléchargé
     *
     * @return Document
     */
    public function setFichier(UploadedFile $fichier)
    {
        $this->fichier = $fichier;
        // On vérifie si on avait déjà un fichier pour cette entité
        if (null !== $this->url) {
            // On sauvegarde l'extension du fichier pour le supprimer plus tard
            $this->tempFilename = $this->url;
            // On réinitialise les valeurs des attributs url et alt
            $this->url = null;
            $this->alt = null;
        }
        //$fichier->move('C:\wamp\www\2018-l3ac1\branches\Publish\web\uploads\photo');
        $fichier->move('/Applications/MAMP/htdocs/projet/L3AC1/branches/Publish/web/uploads/photo');
        return $this;
    }

    /* Pour charger du fixture
     public function setFichier($fichier)
    {
        $this->fichier = $fichier;
        return $this;
    }
    */

    /**
     * Récupère le fichier
     *
     * @return string chemin vers le fichier
     */
    public function getFichier()
    {
        return $this->fichier;
    }
}
