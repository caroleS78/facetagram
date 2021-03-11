<?php
// src/Entity/Eleve.php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity()
* @ORM\Table(name="eleve")
* */
class Eleve
{
    /**
    * @ORM\Id()
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    public $id;

    /**
    * @ORM\Column(type="string")
    */
    private $firstname;
    
    /**
    * @ORM\Column(type="string")
    */
    private $lastname;

    /**
     * plusieurs eleves ont potentiellement plusieurs professeurs
     * @ORM\ManyToMany(targetEntity="App\Entity\Professeur", mappedBy="eleve")
     *  * @ORM\JoinTable(name="professeurs_eleves")    
     */
    private $professeurs;



    /**
     * plusieurs eleves ont potentiellement plusieurs matieres
     * @ORM\ManyToMany(targetEntity="App\Entity\Matiere", inversedBy="eleves")
     * @ORM\JoinTable(name="eleves_matieres")
     */
    private $matieres;

    public function __construct() 
    {
        $this->eleves = new ArrayCollection();
        $this->matieres = new ArrayCollection();
    }


    /**
     * les eleves sont lies a un lycee
     * @ORM\ManyToOne(targetEntity="App\Entity\Lycee", inversedBy="eleves")
     * @ORM\JoinColumn(name="lycee_id", referencedColumnName="id")
     */
    private $lycee;


    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get un élève a potentiellement plusieurs professeurs
     */ 
    public function getProfesseurs()
    {
        return $this->professeurs;
    }

    /**
     * Set un élève a potentiellement plusieurs professeurs
     *
     * @return  self
     */ 
    public function setProfesseurs($professeurs)
    {
        $this->professeurs = $professeurs;

        return $this;
    }



    /**
     * Get les eleves sont lies a un lycee
     */ 
    public function getLycee()
    {
        return $this->lycee;
    }

    /**
     * Set les eleves sont lies a un lycee
     *
     * @return  self
     */ 
    public function setLycee($lycee)
    {
        $this->lycee = $lycee;

        return $this;
    }

    /**
     * Get plusieurs eleves ont potentiellement plusieurs matieres
     */ 
    public function getMatieres()
    {
        return $this->matieres;
    }

    /**
     * Set plusieurs eleves ont potentiellement plusieurs matieres
     *
     * @return  self
     */ 
    public function setMatieres($matieres)
    {
        $this->matieres = $matieres;

        return $this;
    }
}