<?php


class SortimentModel extends DBModel
{
    protected $nume;
    protected $detalii;
    protected $detaliiPrajire;

    public function __construct($nume='.', $detalii='.', $detaliiPrajire='.'){
        $this->nume = $nume;
        $this->detalii = $detalii;
        $this->detaliiPrajire = $detaliiPrajire;
    }

    public function getIdSortiment(){
        $q = "SELECT `id` FROM `sortiment` WHERE `id`>0";
        $myPrep = $this->db()->prepare($q);
        $myPrep->execute(); 
        return $result = $myPrep->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function adaugaSortiment($nume, $detalii, $detaliiPrajire){
        $q = "INSERT INTO `sortiment`(`nume`, `detalii`, `detaliiPrajire`) VALUES (?, ?, ?);";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("sss", $nume, $detalii, $detalii);
        $myPrep->execute();
        return $myPrep->insert_id;
    }

    public function getStocVerde($idSortiment){
        $q = "SELECT `cantitate` FROM `stocverde` WHERE `idSortiment`= ?;";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("i", $idSortiment);
        $result = $myPrep->execute(); 
        return $result = $myPrep->get_result()->fetch_assoc();
    }

    public function insertStocVerde($idSortiment, $cantitate){
        $q = "INSERT INTO `stocverde`(`idSortiment`, `cantitate`) VALUES (?, ?)";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("ii", $idSortiment, $cantitate);
        return $myPrep->execute();
    }

    public function insertStocPrajita($idSortiment, $cantitate){
        $q = "INSERT INTO `stocprajita`(`idSortiment`, `cantitate`) VALUES (?, ?)";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("ii", $idSortiment, $cantitate);
        return $myPrep->execute();
    }

    public function getStocPrajita($idSortiment){
        $q = "SELECT `cantitate` FROM `stocprajita` WHERE `idSortiment` = ?;";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("i", $idSortiment);
        $result = $myPrep->execute(); 
        return $result = $myPrep->get_result()->fetch_assoc();
    }

    public function getNumeSortiment($idSortiment){
        $q = "SELECT `nume` FROM `sortiment` WHERE `id`=?;";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("i", $idSortiment);
        $myPrep->execute();
        return $result = $myPrep->get_result()->fetch_assoc();
    }

    public function updateDetaliiSortiment($idSortiment,$detalii, $detaliiPrajire){
        $q = "UPDATE `sortiment` SET `detalii` = ?, `detaliiPrajire` = ? WHERE `id` = ?;";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("ssi", $detalii, $detaliiPrajire, $idSortiment);
        return $myPrep->execute();
    }

    public function setStocVerde($cantitate, $idSortiment){
        $q = "UPDATE `stocverde` SET `cantitate` = ? WHERE `idSortiment` = ?;";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("ii", $cantitate, $idSortiment);
        return $myPrep->execute();
    }

    public function setStocPrajita($cantitate, $idSortiment){
        $q = "UPDATE `stocprajita` SET `cantitate` = ? WHERE `idSortiment` = ?;";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("ii", $cantitate, $idSortiment);
        return $myPrep->execute();
    }

    public function listSortimente(){
        $q = "SELECT `nume`, `id` FROM `sortiment`;";
        $myPrep = $this->db()->prepare($q);
        $myPrep->execute();
        return $result = $myPrep->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getDetaliiPrajire($idSortiment){
        $q = "SELECT `detaliiPrajire` FROM `sortiment` WHERE `id` = ?";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("i", $idSortiment);
        $myPrep->execute();
        return $result = $myPrep->get_result()->fetch_assoc();
    }

    public function doubleSortiment($numeSortiment){
        $q = "SELECT `nume` from `sortiment` WHERE `nume` = ?;";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("s", $numeSortiment);
        $myPrep->execute();
        return $result = $myPrep->get_result()->fetch_assoc();
    }    
}