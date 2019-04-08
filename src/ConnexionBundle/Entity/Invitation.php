<?php

namespace ConnexionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invitation
 *
 * @ORM\Table(name="invitation")
 * @ORM\Entity(repositoryClass="ConnexionBundle\Repository\InvitationRepository")
 */
class Invitation
{
    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="myFriends")
     * @ORM\Id
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="friendsWithMe")
     * @ORM\Id
     */
    private $friend;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_accepted", type="boolean")
     */
    private $isAccepted;


    /**
     * Set user.
     *
     * @param int $user
     *
     * @return Friendship
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set friend.
     *
     * @param int $friend
     *
     * @return Friendship
     */
    public function setFriend($friend)
    {
        $this->friend = $friend;

        return $this;
    }

    /**
     * Get friend.
     *
     * @return int
     */
    public function getFriends()
    {
        return $this->friend;
    }

    /**
     * Set isAccepted.
     *
     * @param bool $isAccepted
     *
     * @return Friendship
     */
    public function setIsAccepted($isAccepted)
    {
        $this->isAccepted = $isAccepted;

        return $this;
    }

    /**
     * Get isAccepted.
     *
     * @return bool
     */
    public function getIsAccepted()
    {
        return $this->isAccepted;
    }

    /**
     * Get friend.
     *
     * @return \ConnexionBundle\Entity\User
     */
    public function getFriend()
    {
        return $this->friend;
    }
}
