<?php
namespace app\models\dao;
use app\core\Model;

class Dao extends Model{      
    public function lista($tabela){
        return  $this->all($this->db, $tabela);
    }  
    
    //ordem decrescente
    
    public function ordemdes($tabela){
        return  $this->allordemdes($this->db, $tabela);
    }  
    
    public function get($tabela, $campo, $valor){
        return  $this->find($this->db,$campo, $valor, $tabela);
    }    
    
    public function getGeral($tabela, $campo, $operador, $valor, $eh_lista){
        return  $this->findGeral($this->db,$campo,$operador, $valor, $tabela, $eh_lista);
    }    
    
    public function getEntre($tabela, $campo, $valor1, $valor2){
        return  $this->findEntre($this->db,$campo, $valor1, $valor2, $tabela);
    } 
    
    public function getLike($tabela, $campo, $valor, $eh_lista, $posicao){
        return  $this->findlike($this->db,$campo, $valor, $tabela, $eh_lista, $posicao);
    }
    
    public function getTotal($tabela, $campoAgregacao, $campo, $valor){
        return  $this->findAgrega($this->db, 'total', $campoAgregacao, $tabela,$campo, $valor);
    }
    
    public function getTotalData($tabela, $campoAgregacao, $campo, $valor,$data1, $data2){
        return  $this->findAgregaData($this->db, 'total', $campoAgregacao, $tabela,$campo, $valor,$data1, $data2);
    }
    
    public function getSoma($tabela, $campoAgregacao, $campo, $valor){
        return  $this->findAgrega($this->db, 'soma', $campoAgregacao, $tabela,$campo, $valor);
    }
    
    public function getSomaExeto($tabela, $campoAgregacao, $campo, $valor){
        return  $this->findExeto($this->db, 'soma', $campoAgregacao, $tabela,$campo, $valor);
    }
    
    public function getSomaData($tabela, $campoAgregacao, $campo, $valor, $dataa){
        return  $this->findData($this->db, 'soma', $campoAgregacao, $tabela,$campo, $valor, $dataa);
    }
    
    public function getExetoData($tabela, $campoAgregacao, $campo, $valor, $dataf){
        return  $this->findExetoData($this->db, 'soma', $campoAgregacao, $tabela,$campo, $valor, $dataf);
    }
    
    public function getMaximo($tabela, $campoAgregacao, $campo, $valor){
        return  $this->findAgrega($this->db, 'max', $campoAgregacao, $tabela,$campo, $valor);
    }
    
    public function getMinimo($tabela, $campoAgregacao, $campo, $valor){
        return  $this->findAgrega($this->db, 'min', $campoAgregacao, $tabela,$campo, $valor);
    }
    
    public function getMedia($tabela, $campoAgregacao, $campo, $valor){
        return  $this->findAgrega($this->db, 'media', $campoAgregacao, $tabela,$campo, $valor);
    }
    public function inserir( $valores, $tabela){
        return $this->add($this->db,  $valores, $tabela);
    }
    
    public function editar( $valores, $campo, $tabela){
        return $this->edit($this->db,  $valores,  $campo, $tabela);
    }
    
    public function excluir($tabela, $campo, $valor){
        return $this->del($this->db, $campo ,$valor , $tabela);
    }
}

