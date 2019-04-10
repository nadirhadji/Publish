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
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * Many Users have Many Users.
     * @ORM\OneToMany(targetEntity="ConnexionBundle\Entity\Invitation", mappedBy="expediteur")
     */
    private $mesInvitationsEnvoyees;

    /**
     * Many Users have many Users.
     * @ORM\OneToMany(targetEntity="ConnexionBundle\Entity\Invitation", mappedBy="destinataire")
     */
    private $mesInvitationsRecues;

    /**
     * @ORM\OneToMany(targetEntity="ConnexionBundle\Entity\Commentaire", mappedBy="user")
     */
    private $commentaires;

    /**
    * @ORM\OneToMany(targetEntity="ConnexionBundle\Entity\Reaction", mappedBy="user")
    */
        private $reactions;


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

    public function __toString()
    {

        return $this->getFirstname();
    }

    public function getJSON()
    {
        $data = ['text' => $this->getUsername() , 'gender' => $this->getGender()];
        return new JsonResponse($data,200);
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

    /**
     * Add reaction.
     *
     * @param \ConnexionBundle\Entity\Reaction $reaction
     *
     * @return User
     */
    public function addReaction(\ConnexionBundle\Entity\Reaction $reaction)
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
    public function removeReaction(\ConnexionBundle\Entity\Reaction $reaction)
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
     * Add mesInvitationsEnvoyee.
     *
     * @param \ConnexionBundle\Entity\Invitation $mesInvitationsEnvoyee
     *
     * @return User
     */
    public function addMesInvitationsEnvoyee(\ConnexionBundle\Entity\Invitation $mesInvitationsEnvoyee)
    {
        $this->mesInvitationsEnvoyees[] = $mesInvitationsEnvoyee;

        return $this;
    }

    /**
     * Remove mesInvitationsEnvoyee.
     *
     * @param \ConnexionBundle\Entity\Invitation $mesInvitationsEnvoyee
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMesInvitationsEnvoyee(\ConnexionBundle\Entity\Invitation $mesInvitationsEnvoyee)
    {
        return $this->mesInvitationsEnvoyees->removeElement($mesInvitationsEnvoyee);
    }

    /**
     * Get mesInvitationsEnvoyees.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMesInvitationsEnvoyees()
    {
        return $this->mesInvitationsEnvoyees;
    }

    /**
     * Add mesInvitationsRecue.
     *
     * @param \ConnexionBundle\Entity\Invitation $mesInvitationsRecue
     *
     * @return User
     */
    public function addMesInvitationsRecue(\ConnexionBundle\Entity\Invitation $mesInvitationsRecue)
    {
        $this->mesInvitationsRecues[] = $mesInvitationsRecue;

        return $this;
    }

    /**
     * Remove mesInvitationsRecue.
     *
     * @param \ConnexionBundle\Entity\Invitation $mesInvitationsRecue
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMesInvitationsRecue(\ConnexionBundle\Entity\Invitation $mesInvitationsRecue)
    {
        return $this->mesInvitationsRecues->removeElement($mesInvitationsRecue);
    }

    /**
     * Get mesInvitationsRecues.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMesInvitationsRecues()
    {
        return $this->mesInvitationsRecues;
    }

    /**
     * Retoune vrai si j'ai invité $user
     * @param User $user
     * @return bool
     */
    public function hasBeenInvited(User $user)
    {
        //Si l'utilisateur a déja envoyé une demande à $user
        foreach ($this->mesInvitationsEnvoyees as $invitation)
        {
            if ($invitation->getExpediteur()==$this && $invitation->getDestinataire()==$user)
                return true;
        }
        return false;

    }

    /**
     * Retourne vrai si $user est mon ami
     * @param $user
     * @return bool
     */
    public function isMyFriend ($user)
    {
        foreach ($this->getMesInvitationsRecues() as $invitation)
        {
            //On regarde la partie ou j'ai envoyé la demande
            if ($invitation->getExpediteur() == $user && $invitation->getIsAccepted())
                return true;
            else
            {
                foreach ($this->getMesInvitationsEnvoyees() as $invitation)
                {
                    //On regarde la partie ou j'ai accepté la demande
                    if ($invitation->getDestinataire() == $user && $invitation->getIsAccepted())
                        return true;
                }
            }
        }
        return false;

    }

    /**
     * Retourne vrai si $user m'a envoyé une demande
     * @param User $user
     * @return bool
     */
    public function waitForAcceptation(User $user)
    {
        //Si $user a envoyé une demande
        foreach ($this->mesInvitationsRecues as $invitation)
        {
            if ($invitation->getExpediteur()==$user && $invitation->getDestinataire()==$this && !($invitation->getIsAccepted()))
                return true;
        }
        return false;
    }



}
