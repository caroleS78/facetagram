<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="champs")
* */
class Champs
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
    * @ORM\Column(type="string")
    */
    private $organization;
        /**
    * @ORM\Column(type="string")
    */
    private $description;

     /**
    * @ORM\Column(type="string")
    */
    private $jobTitle;

    /**
    * @ORM\Column(type="string")
    */
    private $email;

    /**
    * @ORM\Column(type="integer")
    */
    private $phoneNumber;

    /**
    * @ORM\Column(type="string")
    */
    private $message;
    

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
     * Get the value of organization
     */ 
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Set the value of organization
     *
     * @return  self
     */ 
    public function setOrganization($organization)
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * Get the value of jobTitle
     */ 
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Set the value of jobTitle
     *
     * @return  self
     */ 
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phoneNumber
     */ 
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of phoneNumber
     *
     * @return  self
     */ 
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}