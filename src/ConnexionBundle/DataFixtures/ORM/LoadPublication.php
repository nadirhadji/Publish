<?php
/**
 * Created by PhpStorm.
 * User: rasoarilala
 * Date: 2019-03-25
 * Time: 15:28
 */

namespace ConnexionBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ConnexionBundle\Entity\Publication;
use ConnexionBundle\Entity\User;

class LoadPublication implements FixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        //Création de quelques utilisateurs
        $user=new User();
        $user->setFirstname("titi");
        $user->setLastname("toto");
        $user->setEmail("titi@gmail.com");
        $user->setUsername("titi");
        $user->setPlainPassword("AAAaaa3***");
        $user->setPassword("AAAaaa3***");
        // Liste des noms de catégorie à ajouter
        $contenus = array(
            'dsnocljndkjcnked',
            'ldsck,sdj',
            'sjdcodsehi',
            'kdc,sdpejci',
            'Réssdmckodpjieau'
        );


        foreach ($contenus as $contenu) {
            // On crée la catégorie
            $publication = new Publication();
            $publication->setContenu($contenu);
            $publication->setDatePublication(new \DateTime());
            $publication->setUser($user);

            // On la persiste
            $manager->persist($publication);
        }

        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }
}