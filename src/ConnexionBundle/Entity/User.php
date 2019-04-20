<?php
/**
 * Created by PhpStorm.
 * User: rasoarilala
 * Date: 2019-03-07
 * Time: 00:03
 */
namespace ConnexionBundle\Entity;
use FOS\UserBundle\Model\User as FosUser;
use FOS\MessageBundle\Model\ParticipantInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use ConnexionBundle\Entity\Document;
use ConnexionBundle\Entity\Reaction;
use ConnexionBundle\Entity\Commentaire;
use ConnexionBundle\Entity\CentreInteret;
use ConnexionBundle\Entity\Invitation;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="ConnexionBundle\Repository\UserRepository")
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
     * Ajoute le genre de l'utilisateur
     * @param string $gender le genre de l'utilisateur (homme ou femme)
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Récupère le genre de l'utilisateur
     *
     * @return string retourne le genre de l'utilisateur
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Ajoute le nom de famille de l'utilisateur
     *
     * @param string $firstname le nom de famille de l'utilisateur
     */
    public function setFirstname($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Récupère le nom de famille de l'utilisateur
     *
     * @return string le nom de famille de l'utilisateur
     */
    public function getFirstname()
    {
        return $this->firstName;
    }

    /**
     * Ajoute le prénom de l'utilisateur
     *
     * @param string $lastname le prénom de l'utilisateur
     */
    public function setLastname($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Récupère le prénom de l'utilisateur
     *
     * @return string le prénom de l'utilisateur
     */
    public function getLastname()
    {
        return $this->lastName;
    }

    /**
     * Ajoute la ville de l'utilisateur
     *
     * @param $city la ville de l'utilisateur
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Récupère la ville de l'utilisateur
     *
     * @return string la ville de l'utilisateur
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Ajoute le pays de l'utilisateur
     *
     * @param string $country le pays de l'utilisateur
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Récupère le pays de l'utilisateur
     *
     * @return string le pays de l'utilisateur
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Récupère l'identifiant de l'utilisateur
     *
     * @return int l'identifiant de l'utilisateur
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Ajoute le numero de télephone de l'utilisateur
     *
     * @param string $phone le numero de télephone de l'utilisateur
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Récupère le numero de télephone de l'utilisateur
     *
     * @return string le numero de télephone de l'utilisateur
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Ajoute une photo de profil à l'utilisateur
     *
     * @param Document $image une photo de profil à l'utilisateur
     *
     * @return User
     */
    public function setImage(Document $image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Récupère la photo de profil à l'utilisateur
     *
     * @return Document la photo de profil à l'utilisateur
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Traduit l'objet User en string, en lui retournant son nom de famille
     *
     * @return string le string representant l'objet User
     */
    public function __toString()
    {

        return $this->getFirstname();
    }

    /**
     * Permet de retourner un reponse JSON
     *
     * @return JsonResponse
     */
    public function getJSON()
    {
        $data = ['text' => $this->getUsername() , 'gender' => $this->getGender()];
        return new JsonResponse($data,200);
    }

    /**
     * Permat d'ajouter un commentaire
     *
     * @param Commentaire $commentaire le commentaire à ajouter
     *
     * @return User
     */
    public function addCommentaire(Commentaire $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Permet de supprimer un commentaire
     *
     * @param Commentaire $commentaire le commentaire à supprimer
     *
     * @return boolean Vrai si commentaire existe dans la collection , Faux sinon.
     */
    public function removeCommentaire(Commentaire $commentaire)
    {
        return $this->commentaires->removeElement($commentaire);
    }

    /**
     * Permet de récupérer les commentaires propres à un utilisateur
     *
     * @return Collection la liste des commentaires
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Permet d'ajouter des réactions
     *
     * @param Reaction $reaction les réactions correspondantes
     *
     * @return User
     */
    public function addReaction(\ConnexionBundle\Entity\Reaction $reaction)
    {
        $this->reactions[] = $reaction;

        return $this;
    }

    /**
     * Permet de supprimer une reaction
     *
     * @param Reaction $reaction la réaction à supprimer
     *
     * @return boolean Vrai si commentaire existe dans la collection , Faux sinon.
     */
    public function removeReaction(\ConnexionBundle\Entity\Reaction $reaction)
    {
        return $this->reactions->removeElement($reaction);
    }

    /**
     * Permet de récupérer les réactions
     *
     * @return Collection collection contenant les reactions propres à un utilisateur
     */
    public function getReactions()
    {
        return $this->reactions;
    }

    /**
     * Permet d'ajouter des invitations d'amitié
     *
     * @param Invitation $mesInvitationsEnvoyee les invitations envoyées
     *
     * @return User
     */
    public function addMesInvitationsEnvoyee(Invitation $mesInvitationsEnvoyee)
    {
        $this->mesInvitationsEnvoyees[] = $mesInvitationsEnvoyee;

        return $this;
    }

    /**
     * Supprime les invitations envoyées
     *
     * @param Invitation $mesInvitationsEnvoyee les invitations envoyées
     *
     * @return boolean Vrai si commentaire existe dans la collection , Faux sinon.
     */
    public function removeMesInvitationsEnvoyee(Invitation $mesInvitationsEnvoyee)
    {
        return $this->mesInvitationsEnvoyees->removeElement($mesInvitationsEnvoyee);
    }

    /**
     * Permet de récupérer les invitations envoyées
     *
     * @return Collection collections avec la liste des invitations envoyées
     */
    public function getMesInvitationsEnvoyees()
    {
        return $this->mesInvitationsEnvoyees;
    }

    /**
     * permet d'ajouter les invitations recues
     *
     * @param Invitation $mesInvitationsRecue les invitations recues
     *
     * @return User
     */
    public function addMesInvitationsRecues(Invitation $mesInvitationsRecues)
    {
        $this->mesInvitationsRecues[] = $mesInvitationsRecues;

        return $this;
    }

    /**
     * Supprime une invitation recue
     *
     * @param Invitation $mesInvitationsRecues les invitations recues
     *
     * @return boolean Vrai si commentaire existe dans la collection , Faux sinon.
     */
    public function removeMesInvitationsRecues(Invitation $mesInvitationsRecues)
    {
        return $this->mesInvitationsRecues->removeElement($mesInvitationsRecues);
    }

    /**
     * Permet de récupérer les invitations recues
     *
     * @return Collection une collection contenant la liste des invitations recues
     */
    public function getMesInvitationsRecues()
    {
        return $this->mesInvitationsRecues;
    }

    /**
     * Retoune vrai si l'utilisateur courant a invité $user
     *
     * @param User $user l'utilisateur dont on veut connaitre l'invitation
     *
     * @return bool vrai si la l'utilisateur courant a une invitation envoyée à $usern faux sinon
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
     * Test si un utilisateur est un ami
     *
     * @param $user l'utilisateur à demandr
     *
     * @return bool vrai si $user est l'ami de l'utilisateur courant, faux sinon
     */
    public function isMyFriend ($user)
    {
        foreach ($this->getMesInvitationsRecues() as $invitation)
        {
            //On regarde la partie ou j'ai envoyé la demande
            if ($invitation->getExpediteur() == $user && $invitation->getIsAccepted())
                return true;
        }
        foreach ($this->getMesInvitationsEnvoyees() as $invitation)
        {
            //On regarde la partie ou j'ai accepté la demande
            if ($invitation->getDestinataire() == $user && $invitation->getIsAccepted())
                return true;
        }
        return false;

    }

    /**
     * Retourne vrai si $user m'a envoyé une demande
     *
     * @param User $user l'utilisateur à demander
     *
     * @return bool vrai si $user attend une confirmation de la part de l'utilisateur courant, faux sinon
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
