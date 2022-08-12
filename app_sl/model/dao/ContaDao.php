<?php
namespace app\models\dao;

use app\core\Model;

class ContaDao extends Model{
    public function lista(){
        $sql = "SELECT * FROM contabil_conta order by codigo ";
        return $this->select($this->db, $sql);
    }
    
    public function listaContasDespesa(){
        $sql = "SELECT * FROM contabil_conta WHERE SUBSTRING(codigo,1,1) = '4' and tipo = 'A' order by codigo ";
        return $this->select($this->db, $sql);
    }
    
    public function listaContasDistintas(){
        $sql = "
        SELECT DISTINCT tabela.id_conta, c.conta, c.codigo FROM
            (SELECT
                DISTINCT id_conta_debito id_conta
            FROM
                livro_diario
            UNION ALL
            SELECT
                DISTINCT id_conta_credito id_conta
            FROM
                livro_diario ) tabela
        INNER JOIN
	   contabil_conta c on c.id_conta = tabela.id_conta order by codigo
	   
        ";
        
        return $this->select($this->db, $sql);
        
    }
    
    public function listaDebito(){
        $sql = "
        SELECT
                'D' tipo, c.id_conta, c.conta, c.codigo, l.data, l.valor
            FROM
                livro_diario l, contabil_conta c
            WHERE
                l.id_conta_debito = c.id_conta
         ";
        
        return $this->select($this->db, $sql);
    }
    
    
    public function listaCredito(){
        $sql = "
        SELECT
                'C' tipo, c.id_conta, c.conta, c.codigo, l.data, l.valor
            FROM
                livro_diario l, contabil_conta c
            WHERE
                l.id_conta_credito = c.id_conta
         ";
        
        return $this->select($this->db, $sql);
    }
    /*
    public function lista($id_plano_conta, $tipo){
        if($tipo){
            $sql ="SELECT * FROM conta WHERE id_plano_conta = $id_plano_conta AND tipo = '$tipo' ORDER BY codigo";
        }else{
            $sql ="SELECT * FROM conta WHERE id_plano_conta = $id_plano_conta  ORDER BY codigo";
        }
        
        return $this->select($this->db, $sql);
    }*/
    
    public function ultimoFilho($codigo_pai){
        $sql = "SELECT * FROM contabil_conta WHERE id_pai = (SELECT id_conta From contabil_conta where codigo = '$codigo_pai') 
                order by codigo desc LIMIT 1";
        return $this->select($this->db, $sql, false);
    }
    
    public function proximoPai(){
        $sql = "SELECT * FROM contabil_conta WHERE (id_pai is null or id_pai ='0') order by codigo desc LIMIT 1";
        return $this->select($this->db, $sql, false);
    }
    
    public function getPorAlias($alias){
        $sql ="SELECT * FROM contabil_conta WHERE alias = '$alias' ";
        return $this->select($this->db, $sql, false);
    }
   
}

