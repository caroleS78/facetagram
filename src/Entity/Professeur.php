<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity()
* @ORM\Table(name="professeur")
* */
class Professeur
{

    /**
    * @ORM\Id()
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    public $id;
    /**
    * @ORM\Column(type="string", length=255)
    */
    private $name;
    /**
     * Un professeur a potentiellement un seul lycee
     * mappedBy=l'entité professeur appelle le lycee 
     * @ORM\ManyToOne(targetEntity="App\Entity\Lycee", inversedBy="professeurs")
     * @ORM\JoinColumn(name="lycee_id", referencedColumnName="id")
     */
    private $lycee;

    /**
     * Un professeur a potentiellement plusieurs eleves
     * mappedBy=l'entité professeur appelle les eleves 
     * @ORM\ManyToMany(targetEntity="App\Entity\Eleve", mappedBy="professeur")
     * 
     */
    private $eleves;

    /**
     * Un professeur a potentiellement une seule matiere
     * mappedBy=l'entité professeur appelle la matiere 
     * @ORM\OneToOne(targetEntity="App\Entity\Matiere")
     * @ORM\JoinColumn(name="matiere_id", referencedColumnName="id")
     */
    private $matiere;

    public function __construct()
    {
        $this->eleves = new ArrayCollection();
    }

    

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    

    /**
     * Get un professeur a potentiellement un seul lycee
     */
    public function getLycee()
    {
        return $this->lycee;
    }

    /**
     * Set un professeur a potentiellement un seul lycee
     *
     * @return  self
     */
    public function setLycee($lycee)
    {
        $this->lycee = $lycee;

        return $this;
    }


    /**
     * Get the value of eleves
     */
    public function getEleves()
    {
        return $this->eleves;
    }

    /**
     * Set the value of eleves
     *
     * @return  self
     */
    public function setEleves($eleves)
    {
        $this->eleves = $eleves;

        return $this;
    }

    /**
     * Get un professeur a potentiellement un seul proviseur
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set un professeur a potentiellement un seul proviseur
     *
     * @return  self
     */
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;

        return $this;
    }
}