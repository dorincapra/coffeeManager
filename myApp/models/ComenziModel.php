<?php


class ComenziModel extends DBModel
{
    protected $cantitate;
    protected $idSortiment;
    protected $rasneala;
    protected $dataLimita;


    public function __construct($cantitate='', $idSortiment='', $rasneala='',$dataLimita=''){
        $this->cantitate = $cantitate;
        $this->idSortiment = $idSortiment;
        $this->rasneala = $rasneala;
        $this->dataLimita = $dataLimita;
    }

    public function getComenzi($idSortiment){
        $q = "SELECT * FROM `comenzi` WHERE `id`>0";

        if(isset($idSortiment)){
            $q .= " AND `idSortiment` = $idSortiment";
        }

        $myPrep = $this->db()->prepare($q);
        $myPrep->execute(); 
        return $result = $myPrep->get_result()->fetch_all(MYSQLI_ASSOC);  
    }

    public function adaugaComenzi($cantitate, $idSortiment, $dataLimita){
        $q = "INSERT INTO `comenzi`(`cantitate`, `idSortiment`, `dataLimita`, `status`) 
        VALUES(?,?,?, 'activa');";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("iis", $cantitate, $idSortiment, $dataLimita);
        return $myPrep->execute();
    }

    public function adaugaVanzare($idSortiment, $cantitate, $scop, $data){
        $q = "INSERT INTO `vanzari`(`idSortiment`, `cantitate`, `scop`, `data`) VALUES (?,?,?,?);";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("iiss", $idSortiment, $cantitate, $scop, $data);
        return $myPrep->execute();
    }

    public function stergeComanda($idComanda){
        $q = "DELETE FROM `comenzi` WHERE `id` = ?;";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param('i', $idComanda);
        return $myPrep->execute();
    }

    public function istoricStoc($data1, $data2){
        $q = "SELECT * FROM `vanzari` WHERE `data` >= ? AND `data` <= ? ;";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param('ss', $data1, $data2);
        $myPrep->execute();
        return $myPrep->get_result()->fetch_all(MYSQLI_ASSOC);  
    }
}

