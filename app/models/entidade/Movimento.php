<?php
namespace app\models\entidade;

class Movimento{
    private $id_movimento ;
    private $id_localizacao ;
    private $id_tipo_movimento;
    private $id_produto ;
    private $id_ordem_compra;
    private $id_pedido ;
    private $id_entrada_avulsa ;
    private $id_saida_avulsa ;
    private $id_ordem_producao ;
    private $id_transferencia;
    private $entrada_saida ;
    private $data_movimento ;
    private $qtde_movimento ;
    private $valor_movimento ;
    private $subtotal_movimento;
    private $descricao ;
    private $saldoestoque;
    
    
    /**
     * @return mixed
     */
    public function getId_transferencia()
    {
        return $this->id_transferencia;
    }

    /**
     * @param mixed $id_transferencia
     */
    public function setId_transferencia($id_transferencia)
    {
        $this->id_transferencia = $id_transferencia;
    }

    /**
     * @return mixed
     */
    public function getId_movimento()
    {
        return $this->id_movimento;
    }

    /**
     * @return mixed
     */
    public function getId_localizacao()
    {
        return $this->id_localizacao;
    }

    /**
     * @return mixed
     */
    public function getId_tipo_movimento()
    {
        return $this->id_tipo_movimento;
    }

    /**
     * @return mixed
     */
    public function getId_produto()
    {
        return $this->id_produto;
    }

    /**
     * @return mixed
     */
    public function getId_ordem_compra()
    {
        return $this->id_ordem_compra;
    }

    /**
     * @return mixed
     */
    public function getId_pedido()
    {
        return $this->id_pedido;
    }

    /**
     * @return mixed
     */
    public function getId_entrada_avulsa()
    {
        return $this->id_entrada_avulsa;
    }

    /**
     * @return mixed
     */
    public function getId_saida_avulsa()
    {
        return $this->id_saida_avulsa;
    }

    /**
     * @return mixed
     */
    public function getId_ordem_producao()
    {
        return $this->id_ordem_producao;
    }

    /**
     * @return mixed
     */
    public function getEntrada_saida()
    {
        return $this->entrada_saida;
    }

    /**
     * @return mixed
     */
    public function getData_movimento()
    {
        return $this->data_movimento;
    }

    /**
     * @return mixed
     */
    public function getQtde_movimento()
    {
        return $this->qtde_movimento;
    }

    /**
     * @return mixed
     */
    public function getValor_movimento()
    {
        return $this->valor_movimento;
    }

    /**
     * @return mixed
     */
    public function getSubtotal_movimento()
    {
        return $this->subtotal_movimento;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @return mixed
     */
    public function getSaldoestoque()
    {
        return $this->saldoestoque;
    }

    /**
     * @param mixed $id_movimento
     */
    public function setId_movimento($id_movimento)
    {
        $this->id_movimento = $id_movimento;
    }

    /**
     * @param mixed $id_localizacao
     */
    public function setId_localizacao($id_localizacao)
    {
        $this->id_localizacao = $id_localizacao;
    }

    /**
     * @param mixed $id_tipo_movimento
     */
    public function setId_tipo_movimento($id_tipo_movimento)
    {
        $this->id_tipo_movimento = $id_tipo_movimento;
    }

    /**
     * @param mixed $id_produto
     */
    public function setId_produto($id_produto)
    {
        $this->id_produto = $id_produto;
    }

    /**
     * @param mixed $id_ordem_compra
     */
    public function setId_ordem_compra($id_ordem_compra)
    {
        $this->id_ordem_compra = $id_ordem_compra;
    }

    /**
     * @param mixed $id_pedido
     */
    public function setId_pedido($id_pedido)
    {
        $this->id_pedido = $id_pedido;
    }

    /**
     * @param mixed $id_entrada_avulsa
     */
    public function setId_entrada_avulsa($id_entrada_avulsa)
    {
        $this->id_entrada_avulsa = $id_entrada_avulsa;
    }

    /**
     * @param mixed $id_saida_avulsa
     */
    public function setId_saida_avulsa($id_saida_avulsa)
    {
        $this->id_saida_avulsa = $id_saida_avulsa;
    }

    /**
     * @param mixed $id_ordem_producao
     */
    public function setId_ordem_producao($id_ordem_producao)
    {
        $this->id_ordem_producao = $id_ordem_producao;
    }

    /**
     * @param mixed $entrada_saida
     */
    public function setEntrada_saida($entrada_saida)
    {
        $this->entrada_saida = $entrada_saida;
    }

    /**
     * @param mixed $data_movimento
     */
    public function setData_movimento($data_movimento)
    {
        $this->data_movimento = $data_movimento;
    }

    /**
     * @param mixed $qtde_movimento
     */
    public function setQtde_movimento($qtde_movimento)
    {
        $this->qtde_movimento = $qtde_movimento;
    }

    /**
     * @param mixed $valor_movimento
     */
    public function setValor_movimento($valor_movimento)
    {
        $this->valor_movimento = $valor_movimento;
    }

    /**
     * @param mixed $subtotal_movimento
     */
    public function setSubtotal_movimento($subtotal_movimento)
    {
        $this->subtotal_movimento = $subtotal_movimento;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @param mixed $saldoestoque
     */
    public function setSaldoestoque($saldoestoque)
    {
        $this->saldoestoque = $saldoestoque;
    }

    
    public function toArray() {
        $array = array();
        foreach ($this as $key => $value) {
            if (property_exists($this, $key)) {
                $array[$key] =  $value;
            }
        }
        return $array;
        
    }
    
    public function toStd() {
        $std = new \stdClass();
        foreach ($this as $key => $value) {
            if (property_exists($this, $key)) {
                if(is_object($value)){
                    $std->{$key} = $value->getStdClass();
                }else{
                    $std->{$key} =  $value;
                }
            }
        }
        return $std;
    }
    
}

