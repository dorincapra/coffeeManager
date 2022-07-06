<?php


class PrajealaModel extends DBModel
{
    protected $cantitateVerde;
    protected $idSortiment;
    protected $cantitatePrajita;
    protected $idPrajitor; 
    protected $dataPrajelii;



    public function __construct($cantitateVerde='', $idSortiment='', $cantitatePrajita='',$idPrajitor='', $dataPrajelii=''){
        $this->cantitateVerde = $cantitateVerde;
        $this->idSortiment = $idSortiment;
        $this->cantitatePrajita = $cantitatePrajita;
        $this->idPrajitor = $idPrajitor;
        $this->dataPrajelii = $dataPrajelii;
    }

    public function prajealaNoua($idSortiment, $numePrajitor, $cantitatePrajita, $cantitateVerde, $data, $temperaturaIntrare, $temperaturaIesire, $note, $durataPrajire){
        $q = "INSERT INTO `prajeli`(`idSortiment`, `numePrajitor`, `cantitatePrajita`, `cantitateVerde`, `dataPrajelii`, `temperaturaIntrare`, `temperaturaIesire`, `note`, `durataPrajire`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("isiisiisi", $idSortiment, $numePrajitor, $cantitatePrajita, $cantitateVerde, $data, $temperaturaIntrare, $temperaturaIesire, $note, $durataPrajire);
        return $myPrep->execute();
    }

    public function getPrajeli(){
        $q = "SELECT * FROM `prajeli`";
        $myPrep = $this->db()->prepare($q);
        $myPrep->execute();
        return $myPrep->get_result()->fetch_all(MYSQLI_ASSOC);
    }



}