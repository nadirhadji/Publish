<?php
/**
 * Created by PhpStorm.
 * User: rasoarilala
 * Date: 2019-03-07
 * Time: 00:03
 */
namespace ConnexionBundle\Entity;
use FOS\UserBundle\Model\User as FosUser;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use FOS\MessageBundle\Model\ParticipantInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use ConnexionBundle\Entity\Document;
use ConnexionBundle\Entity\Reaction;
use ConnexionBundle\Entity\Commentaire;
use ConnexionBundle\Entity\CentreInteret;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends FosUser implements ParticipantInterface
{
    const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_USER = 'ROLE_USER';
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var
     *
     * @ORM\Column(name="gender", type="string", length=255, nullable=true)
     */
    protected $gender;
    /**
     * @var
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Ajouter un nom")
     */
    protected $firstName;
    /**
     * @var
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    protected $lastName;
    /**
     * @var
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    protected $city;
    /**
     * @var
     *
     * @ORM\Column(name="zip_code", type="string", length=255, nullable=true)
     */
    protected $country;
    /**
     * @var
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    protected $phone;
    /**
     * @ORM\ManyToMany(targetEntity="ConnexionBundle\Entity\CentreInteret",cascade={"persist"})
     */
    private $centresInteret;
    /**
     * @ORM\OneToOne(targetEntity="ConnexionBundle\Entity\Document",cascade={"persist"})
     */
    protected $image;

    /**
     * @ORM\OneToMany(targetEntity="ConnexionBundle\Entity\Commentaire", mappedBy="user")
     */
    private $commentaires;

    /**
    * @ORM\OneToMany(targetEntity="ConnexionBundle\Entity\Reaction", mappedBy="user")
    */
        private $reactions;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }
    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstName)
    {
        $this->firstName = $firstName;
    }
    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstName;
    }
    /**
     * @param mixed $lastname
     */
    public function setLastname($lastName)
    {
        $this->lastName = $lastName;
    }
    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastName;
    }
    public function setCity($city)
    {
        $this->city = $city;
    }
    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }
    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }
    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param mixed $zipCode
     */
    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * Set centresInteret.
     *
     * @param \ConnexionBundle\Entity\CentreInteret|null $centresInteret
     *
     * @return User
     */
    public function setCentresInteret(CentreInteret $centresInteret = null)
    {
        $this->centresInteret = $centresInteret;
        return $this;
    }
    /**
     * Get centresInteret.
     *
     * @return \ConnexionBundle\Entity\CentreInteret|null
     */
    public function getCentresInteret()
    {
        return $this->centresInteret;
    }
    /**
     * Add centresInteret.
     *
     * @param \ConnexionBundle\Entity\CentreInteret $centresInteret
     *
     * @return User
     */
    public function addCentresInteret(CentreInteret $centresInteret)
    {
        $this->centresInteret[] = $centresInteret;
        return $this;
    }
    /**
     * Remove centresInteret.
     *
     * @param \ConnexionBundle\Entity\CentreInteret $centresInteret
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCentresInteret(CentreInteret $centresInteret)
    {
        return $this->centresInteret->removeElement($centresInteret);
    }
    /**
     * Set image.
     *
     * @param \ConnexionBundle\Entity\Document|null $image
     *
     * @return User
     */
    public function setImage(Document $image)
    {
        $this->image = $image;
        return $this;
    }
    /**
     * Get image.
     *
     * @return \ConnexionBundle\Entity\Document|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add reaction.
     *
     * @param \ConnexionBundle\Entity\Reaction $reaction
     *
     * @return User
     */
    public function addReaction(Reaction $reaction)
    {
        $this->reactions[] = $reaction;

        return $this;
    }

    /**
     * Remove reaction.
     *
     * @param \ConnexionBundle\Entity\Reaction $reaction
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeReaction(Reaction $reaction)
    {
        return $this->reactions->removeElement($reaction);
    }

    /**
     * Get reactions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReactions()
    {
        return $this->reactions;
    }

    /**
     * Add commentaire.
     *
     * @param \ConnexionBundle\Entity\Commentaire $commentaire
     *
     * @return User
     */
    public function addCommentaire(Commentaire $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire.
     *
     * @param \ConnexionBundle\Entity\Commentaire $commentaire
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCommentaire(Commentaire $commentaire)
    {
        return $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }
}
