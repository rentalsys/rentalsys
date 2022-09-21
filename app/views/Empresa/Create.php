<div class="p-2 bg-title text-light text-uppercase h5 mb-0 text-branco d-flex justify-content-space-between">
			<span><i class="fas fa-plus-circle" aria-hidden="true"></i> Cadastrar empresa</span>
			<a href="<?php echo URL_BASE ."empresa"?>" class="btn btn-verde btn-pequeno"><i class="fas fa-arrow-left" aria-hidden="true"></i>  Voltar</a>
		</div>
		<div class="p-1">
				<?php 
				    $this->verMsg();
				    $this->verErro();
				?>
			</div>               
<form action="<?php echo URL_BASE ."empresa/salvar"?>" method="Post">
   <div id="tab">
	   <ul>
		<li><a href="#tab-1">Dados gerais</a></li>
		<li><a href="#tab-2">Endereço</a></li>
		<li><a href="#tab-3">Dados Fiscais</a></li>
	  </ul>
	  <div id="tab-1">
		<div class="p-2">
			<span class="d-block mt-4 mb-4 h4 border-bottom text-uppercase">Informações básicas</span>
			<div class="rows">									
				

				<div class="col-6 mb-3">
						<label class="text-label">Razão Social</label>	
						<input type="text" name="razao_social" value="<?php echo ($empresa->razao_social) ? $empresa->razao_social: null ?>" placeholder="Digite aqui..." class="form-campo">
				</div>                                    
				<div class="col-6 mb-3">
						<label class="text-label">Nome Fantasia</label>	
						<input type="text" name="nome_fantasia" value="<?php echo ($empresa->nome_fantasia) ? $empresa->nome_fantasia: null ?>" class="form-campo">
				</div>				
				
				
										
				<div class="col-3 mb-3">
						<label class="text-label">CNPJ</label>	
						<input type="text" name="cnpj" value="<?php echo ($empresa->cnpj) ? $empresa->cnpj: null ?>" placeholder="Digite aqui..." class="form-campo mascara-cnpj">
				</div>				
				
										
				<div class="col-3 mb-3">
						<label class="text-label">IE</label>	
						<input type="text" name="ie" value="<?php echo ($empresa->ie) ? $empresa->ie: null ?>" placeholder="Digite aqui..." class="form-campo">
				</div>
				
				<div class="col-3 mb-3">
						<label class="text-label">IEST</label>	
						<input type="text" name="ie" value="<?php echo ($empresa->iest) ? $empresa->iest: null ?>" placeholder="Digite aqui..." class="form-campo">
				</div>
				
				<div class="col-3 mb-3">
						<label class="text-label">IM</label>	
						<input type="text" name="rg" value="<?php echo ($empresa->im) ? $empresa->im: null ?>" placeholder="Digite aqui..." class="form-campo">
				</div>
				
				<div class="col-2 mb-3">
						<label class="text-label">Fone:</label>	
						<input type="text" name="fone" value="<?php echo ($empresa->fone) ? $empresa->fone: null ?>" placeholder="Digite aqui..." class="form-campo mascara-fone">
				</div>			   
				

				<div class="col-4 mb-3">
						<label class="text-label">E-mail</label>	
						<input type="text" name="email" value="<?php echo ($empresa->email) ? $empresa->email: null ?>" placeholder="Digite aqui..." class="form-campo">
				</div>
				
				<div class="col-4 mb-3">
						<label class="text-label">E-mail Contabilidade</label>	
						<input type="text" name="email_contabilidade" value="<?php echo ($empresa->email_contabilidade) ? $empresa->email_contabilidade: null ?>" placeholder="Digite aqui..." class="form-campo">
				</div>				
								
							   
				<div class="col-2 mb-3">
						<label class="text-label">Última Atualização</label>	
						<input type="datetime" name="ultima_atualizacao" value="<?php echo ($empresa->ultima_atualizacao) ? $empresa->ultima_atualizacao: null ?>" placeholder="Digite aqui..." class="form-campo">
				</div>
				
				

			</div>
		</div>
	  </div>
	  
	  <div id="tab-2">
		<div class="p-2">									
        <span class="d-block mt-4 h4 border-bottom text-uppercase">Endereço</span>										
        <div class="rows">	
		<div class="col-2 mb-3">
                <label class="text-label">CEP</label>
                 <div class="input-grupo">
                 <input type="text" value="<?php echo ($empresa->cep) ? $empresa->cep: null ?>" name="cep" id="cep" placeholder="Digite aqui..." class="form-campo mascara-cep busca_cep">
					 
                 </div>
            </div>
			
            <div class="col-6 mb-3">
                    <label class="text-label">Logradouro</label>	
                    <input type="text" name="logradouro" id="logradouro" value="<?php echo ($empresa->logradouro) ? $empresa->logradouro: null ?>" placeholder="Digite aqui..." class="form-campo rua">
            </div>
            			
			<div class="col-4 mb-3">
                    <label class="text-label">Complemento</label>	
                    <input type="text" name="complemento" id="complemento" value="<?php echo ($empresa->complemento) ? $empresa->complemento: null ?>" placeholder="Digite aqui..." class="form-campo">
            </div>
			<div class="col-1 mb-4">
                    <label class="text-label">Numero</label>	
                    <input type="text" name="numero" id="numero" value="<?php echo ($empresa->numero) ? $empresa->numero: null ?>" placeholder="Digite aqui..." class="form-campo">
            </div>
			<div class="col-6 mb-3">
                    <label class="text-label">Bairro</label>	
                    <input type="text" name="bairro" id="bairro" value="<?php echo ($empresa->bairro) ? $empresa->bairro: null ?>" placeholder="Digite aqui..." class="form-campo bairro">
            </div>
						
            <div class="col-1 mb-3">
                <label class="text-label">UF</label>
                 <div class="input-grupo">
                 <input type="text" value="<?php echo ($empresa->uf) ? $empresa->uf: null ?>" name="uf" id="uf" placeholder="Digite aqui..." class="form-campo estado">
					 
                 </div>
            </div>
			
			<div class="col-3 mb-3">
                <label class="text-label">Cidade</label>
                 <div class="input-grupo">
                 <input type="text" value="<?php echo ($empresa->cidade) ? $empresa->cidade: null ?>" name="cidade" id="cidade" placeholder="Digite aqui..." class="form-campo cidade">
					 
                 </div>
            </div>
            
            <div class="col-1 mb-3">
                <label class="text-label">IBGE</label>
                 <div class="input-grupo">
                 <input type="text" value="<?php echo ($empresa->ibge) ? $empresa->ibge: null ?>" name="ibge" id="ibge" placeholder="Digite aqui..." class="form-campo ibge">
					 
                 </div>
            </div>
           
                </div>
        </div>
	  </div>
	  <div id="tab-3">
		<div class="p-2">
			<span class="d-block mt-4 mb-4 h4 border-bottom text-uppercase">Dados Fiscais</span>
			<div class="rows">									
				

				<div class="col-6 mb-3">
						<label class="text-label">CNAE</label>	
						<input type="text" name="cnae" value="<?php echo ($empresa->cnae) ? $empresa->cnae: null ?>" placeholder="Digite aqui..." class="form-campo">
				</div>
				<div class="col-6 mb-3">
						<label class="text-label">Regime Tributário</label>	
						<select name="regime_tributario" id="regime_tributario" class="form-campo">
							<option value="1">Simples Nacional </option>
							<option value="2">Lucro Presumido </option>
							<option value="3">Lucro Real </option>
						</select>
				</div> 
			</div>
		</div>
	</div>
	  
 </div>

		<div class="col-12 text-center pb-4">
			<input type="hidden" name="id_empresa" value="<?php echo isset($empresa->id_empresa) ? $empresa->id_empresa : null ?>">
			<input type="submit" value="Salvar" class="btn btn-laranja m-auto">
		</div>
 </form>