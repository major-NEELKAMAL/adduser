<?php

class Userslist extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $Firstname;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $Lastname;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $Email;

    /**
     *
     * @var string
     * @Column(type="string", length=7, nullable=false)
     */
    public $Gender;

    /**
     *
     * @var string
     * @Column(type="string", length=5, nullable=false)
     */
    public $Education;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $Skills;


    public function setFirstname($Firstname)
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    /**
     * Method to set the value of field Lastname
     *
     * @param string $Lastname
     * @return $this
     */
    public function setLastname($Lastname)
    {
        $this->Lastname = $Lastname;

        return $this;
    }

    /**
     * Method to set the value of field Email
     *
     * @param string $Email
     * @return $this
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Method to set the value of field Gender
     *
     * @param string $Gender
     * @return $this
     */
    public function setGender($Gender)
    {
        $this->Gender = $Gender;

        return $this;
    }

    /**
     * Method to set the value of field Education
     *
     * @param string $Education
     * @return $this
     */
    public function setEducation($Education)
    {
        $this->Education = $Education;

        return $this;
    }

    /**
     * Method to set the value of field Skills
     *
     * @param string $Skills
     * @return $this
     */
    public function setSkills($Skills)
    {
        $this->Skills = $Skills;

        return $this;
    }

    /**
     * Returns the value of field Firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->Firstname;
    }

    /**
     * Returns the value of field Lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->Lastname;
    }

    /**
     * Returns the value of field Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Returns the value of field Gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->Gender;
    }

    /**
     * Returns the value of field Education
     *
     * @return string
     */
    public function getEducation()
    {
        return $this->Education;
    }

    /**
     * Returns the value of field Skills
     *
     * @return string
     */
    public function getSkills()
    {
        return $this->Skills;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("test");
    }


    public static function fetchAll()
    {
        return  userslist::find(); 
    }  

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'userslist';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Userslist[]|Userslist
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Userslist
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
