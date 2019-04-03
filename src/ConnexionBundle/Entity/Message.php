<?php
//src/ConnexionBundle/Entity/Message.php
namespace ConnexionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use FOS\MessageBundle\Entity\Message as BaseMessage;


/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="ConnexionBundle\Repository\MessageRepository")
 */
class Message extends BaseMessage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
//
    /**
     * @ORM\ManyToOne(
     *   targetEntity="ConnexionBundle\Entity\Thread",
     *   inversedBy="messages"
     * )
     * @var \FOS\MessageBundle\Model\ThreadInterface
     */
    protected $thread;

    /**
     * @ORM\ManyToOne(targetEntity="ConnexionBundle\Entity\User")
     * @var \FOS\MessageBundle\Model\ParticipantInterface
     */
    protected $sender;

    /**
     * @ORM\OneToMany(
     *   targetEntity="ConnexionBundle\Entity\MessageMetadata",
     *   mappedBy="message",
     *   cascade={"all"}
     * )
     * @var MessageMetadata[]|Collection
     */
    protected $metadata;
//
//    /**
//     * Add metadata.
//     *
//     * @param \ConnexionBundle\Entity\MessageMetadata $metadata
//     *
//     * @return Message
//     */
//    public function addMetadatum(\ConnexionBundle\Entity\MessageMetadata $metadata)
//    {
//        $this->metadata[] = $metadata;
//
//        return $this;
//    }
//
//    /**
//     * Remove metadata.
//     *
//     * @param \ConnexionBundle\Entity\MessageMetadata $metadata
//     *
//     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
//     */
//    public function removeMetadatum(\ConnexionBundle\Entity\MessageMetadata $metadata)
//    {
//        return $this->metadata->removeElement($metadata);
//    }
//
//    /**
//     * Get metadata.
//     *
//     * @return \Doctrine\Common\Collections\Collection
//     */
//    public function getMetadata()
//    {
//        return $this->metadata;
//    }

    /**
     * Add metadata.
     *
     * @param \ConnexionBundle\Entity\MessageMetadata $metadata
     *
     * @return Message
     */
    public function addMetadatum(\ConnexionBundle\Entity\MessageMetadata $metadata)
    {
        $this->metadata[] = $metadata;

        return $this;
    }

    /**
     * Remove metadata.
     *
     * @param \ConnexionBundle\Entity\MessageMetadata $metadata
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMetadatum(\ConnexionBundle\Entity\MessageMetadata $metadata)
    {
        return $this->metadata->removeElement($metadata);
    }

    /**
     * Get metadata.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMetadata()
    {
        return $this->metadata;
    }
}
