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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Document
     */
    public function setUrl(File $file = null)
    {
        $this->url = $file;
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
    /**
     * Set alt.
     *
     * @param string $alt
     *
     * @return Document
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
        return $this;
    }
    /**
     * Get alt.
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }
    /**
     * Set fichier.
     *
     * @param string $fichier
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
        $fichier->move('/Applications/MAMP/htdocs/projet/2018-l3ac1/branches/Publish/web/uploads/photo');
        return $this;
    }
    /**
     * Get fichier.
     *
     * @return string
     */
    public function getFichier()
    {
        return $this->fichier;
    }
}
