<?php
namespace app\models\dao;

use app\core\Model;

class NotaFiscalDao extends Model{  
    
    public function lista(){
        $sql = "SELECT * FROM nfe n, nfe_destinatario d
                WHERE n.id_nfe = d.id_nfe ";
        return $this->select($this->db, $sql);
    }
    
    public  function getNotaFiscal($id){
        $sql = "SELECT * FROM nfe n, nfe_emitente e WHERE n.id_nfe = e.id_nfe and n.id_nfe = $id";
        return $this->select($this->db, $sql, false);
    }
    public  function salvarChave($id_nfe, $chave){
        $sql = "UPDATE nfe SET chave='$chave', id_status=3  WHERE id_nfe = $id_nfe";
        return $this->db->query($sql);
    }
    
    public  function salvarRecibo($id_nfe, $recibo){
        $sql = "UPDATE nfe SET recibo='$recibo', id_status=5  WHERE id_nfe = $id_nfe";
        return $this->db->query($sql);
    }
    
    public  function salvarProtocolo($id_nfe, $protocolo){
        $sql = "UPDATE nfe SET protocolo='$protocolo', id_status=7  WHERE id_nfe = $id_nfe";
        return $this->db->query($sql);
    }
    public  function mudarStatus($id_nfe, $id_status){
        $sql = "UPDATE nfe SET  id_status=$id_status  WHERE id_nfe = $id_nfe";
        return $this->db->query($sql);
    }
    
}
