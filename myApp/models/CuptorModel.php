<?php


class CuptorModel extends DBModel
{
    protected $dataUngere;
    protected $timpFunctionare;



    public function __construct($dataUngere='', $timpFunctionare=''){
        $this->dataUngere = $dataUngere;
        $this->timpFunctionare = $timpFunctionare;
    }

    public function getUngereInfo(){
        $q = "SELECT `dataUngere`, `timpFunctionare` FROM `infoCuptor` ORDER BY ID DESC LIMIT 1;";
        $myPrep = $this->db()->prepare($q);
        $myPrep->execute();
        return $myPrep->get_result()->fetch_assoc();
    }

    // public function setTimpFunctionare(){
    //     $q = ""
    // }

    public function getTimpFunctionare(){
        $q = "SELECT `timpFunctionare` FROM `infoCuptor` ORDER BY ID DESC LIMIT 1;";
        $myPrep = $this->db()->prepare($q);
        $myPrep->execute();
        return $myPrep->get_result()->fetch_assoc();
    }

    public function setTimpFunctionare($timpFunctionare){
        $q = "UPDATE `infoCuptor` SET `timpFunctionare` = ? ORDER BY Id DESC LIMIT 1;";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("i", $timpFunctionare);
        return $myPrep->execute();
    }

    public function resetUngere($data){
        $q = "INSERT INTO `infoCuptor`(`dataUngere`, `timpFunctionare`) VALUES (?, 0)";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param('s', $data);
        return $myPrep->execute();
    }
}