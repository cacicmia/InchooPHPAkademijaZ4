<?php
/**
 * Created by PhpStorm.
 * User: mia
 * Date: 28.01.19.
 * Time: 08:21
 */
class Zaposlenik
{
    protected $ID;
    protected $name;
    protected $birthdate;
    protected $sex;
    protected $income;
    public function __construct($id){
      $id=intval($id);
      $this->setID($id);
    }
    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        if (preg_match("/[0-9]/",$name)>0){
            return false;
        }else{
            $this->name = $name;
            return true;
        }

    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setDate($birthdate)
    {
        if (preg_match("/a-zA-Z/",$birthdate)>0){
            return false;
        }else {
            $divide = explode(".", $birthdate, 3);
            $d = $divide[0];
            $m = $divide[1];
            $y = $divide[2];
            if (checkdate($m,$d,$y)){
            $this->birthdate = new DateTime("{$y}-{$m}-{$d}");
            return true;
            } else {
                return false;
            }
        }
    }


    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        switch($sex){
            case "M":
            case "m":
                $this->sex = $sex;
                return true;
                break;
            case "Ž":
            case "ž":
                $this->sex = $sex;
                return true;
                break;
            case "N":
            case "n":
                $this->sex = $sex;
                return true;
                break;
            default:
                return false;
        }

    }

    /**
     * @return mixed
     */
    public function getIncome()
    {
        return $this->income;
    }

    /**
     * @param mixed $income
     */
    public function setIncome($income)
    {
        $this->income = $income;
    }


}

