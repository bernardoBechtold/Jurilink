<?php
require_once '../template/header.php'; //chama o header
require_once '../config.php';     //chama as configurações de página!

?>

<div class="container content">
    <div class="row">
        <div class ="esquerda"> <h1>Naturezas de Ação</h1> </div>        
    </div>
    
    <div class="divisor_horizontal_view"></div>
    
    <div class="row">
        <div class ="esquerda"> 
            <a href="cadastrar_natureza_acao.php">
                <button type="button" class="btn btn-small btn-success">
                    <i class="icon-plus icon-white"></i>
                    INCLUIR NATUREZA DE AÇÃO     
                </button>
            </a> 
        </div>   
        <div class ="direita">
            
        </div>
        <br/>
    </div>
    
    
    <div class="row row_relacao">
        <div id="tabela_container">
            <div id="tabela"> 
                
            </div>
        </div>
    </div>
  
    
    

</div><!-- CONTAINER -->

</body>
<?php
require_once '../template/scripts.php'; //chama scripts comuns as paginas
require_once 'script_relacao_natureza.php'; //chama scripts comuns as paginas
?>
</html>