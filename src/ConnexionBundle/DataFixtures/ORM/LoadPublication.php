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
use ConnexionBundle\Entity\Commentaire;
use ConnexionBundle\Entity\Document;
use ConnexionBundle\Entity\Reaction;


class LoadPublication implements FixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        //Création de 5 utilisateurs
        $user1=new User();$user2=new User();$user3=new User();$user4=new User();$user5=new User();
        $user1->setFirstname("Alexis");$user2->setFirstname("Nadir");$user3->setFirstname("Jadid");$user4->setFirstname("Juliette");$user5->setFirstname("Toto");
        $user1->setLastname("Phiz");$user2->setLastname("Hadji");$user3->setLastname("Abdel");$user4->setLastname("Rasoa");$user5->setLastname("Dupond");
        $user1->setEmail("alexis@gmail.com");$user2->setEmail("nadir@gmail.com");$user3->setEmail("jadid@gmail.com");$user4->setEmail("juliette@gmail.com");$user5->setEmail("toto@gmail.com");
        $user1->setUsername("alexis");$user2->setUsername("nadir");$user3->setUsername("jadid");$user4->setUsername("juliette");$user5->setUsername("toto");
        $user1->setPlainPassword("AAAaaa3***");$user2->setPlainPassword("AAAaaa3***");$user3->setPlainPassword("AAAaaa3***");$user4->setPlainPassword("AAAaaa3***");$user5->setPlainPassword("AAAaaa3***");
        $user1->setPassword("AAAaaa3***");$user2->setPassword("AAAaaa3***");$user3->setPassword("AAAaaa3***");$user4->setPassword("AAAaaa3***");$user5->setPassword("AAAaaa3***");

        //Création photo de profil
        $image1 = new Document();$image2 = new Document();$image3 = new Document();$image4 = new Document();$image5 = new Document();
        $image1->setFichier("/Applications/MAMP/tmp/php/php6Cwldz");$image2->setFichier("/Applications/MAMP/tmp/php/php9xXbuO");$image3->setFichier("/Applications/MAMP/tmp/php/phpdaFHeY");$image4->setFichier("/Applications/MAMP/tmp/php/phpISx5p5");$image5->setFichier("/Applications/MAMP/tmp/php/phpRGGCJl");
        $user1->setImage($image1);$user2->setImage($image2);$user3->setImage($image3);$user4->setImage($image4);$user5->setImage($image5);

        // Tableau contenant l'ensemble des utilisateurs crées
        $users = array ($user1,$user2,$user3,$user4,$user5);

        // Liste des contenus des publications à ajouter
        $contenus = array(
            "Bonjour tout le monde! Quoi de neuf?",
            "Les examens sont dans un mois, Révisez bien!",
            "Ce reseau social est genial, je vais inviter tous mes potes!",
            "Une photo de que j ai prise aujourd'hui",
            "Un bon endroit pour se détendre"
        );

        //Tableau de publication, sera complété dans la boucle plus tard
        $publications = array();

        //Texte commentaire
        $contenu_commentaires = array("Salut! Ca va toi? il fait beau aujourd'hui","Cool!" , "okey ca marche", "bien", "blablablabla" , "YEeessssss", "Genialll!" , "C est interessant ", "AH bon?","bien","oulalalalala","C est une blague");

        //Association des publications avec leurs users et les j aime correspondant
        foreach ($contenus as $contenu) {
            // On crée la publication et on lui associe à un utilisateur
            $publication = new Publication();
            $publication->setContenu($contenu)
                ->setDatePublication(new \DateTime())
                ->setUser($users[array_rand($users,1)]);
            array_push($publications,$publication);
            // On la persiste
            $manager->persist($publication);

            for ($j=0 ; $j< random_int(0,5); $j++ )
            {
                $reaction = new Reaction();
                $reaction->setPublication($publication)
                        ->setUser($users[array_rand($users,1)]);
                $manager->persist($reaction);
            }
        }
        //Association des commentaires avec ses publications et ses users
        foreach ($contenu_commentaires as $contenu_commentaire) {
            $commentaire = new Commentaire();
            $commentaire->setText($contenu_commentaire)
                ->setPublication($publications[array_rand($publications,1)])
                ->setUser($users[array_rand($users,1)]);
            // On la persiste
            $manager->persist($commentaire);
        }
        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }
}
