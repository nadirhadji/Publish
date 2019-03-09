<?php
/**
 * Created by PhpStorm.
 * User: rasoarilala
 * Date: 2019-03-07
 * Time: 00:03
 */

namespace ConnexionBundle\Entity;

use FOS\UserBundle\Model\User as FosUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends FosUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }
}

?>