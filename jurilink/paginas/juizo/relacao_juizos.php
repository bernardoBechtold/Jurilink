<?php
require_once '../template/header.php'; //chama o header
require_once '../config.php';     //chama as configurações de página!
require_once "../classes/CConexao.php";

$conexao = new CConexao();
$conexao1 = $conexao->novaConexao();


$pesq = pg_query($conexao1, "SELECT id_comarca, nome FROM comarca");
$result = pg_fetch_object($pesq);


if (!$result) {
    echo "Um erro ocorreu.\n";
    exit;
}
?>

<div class="container content">
    <div class="row">
        <div class ="esquerda"> <h1>Juízos</h1> </div>        
    </div>

    <div class="divisor_horizontal_view"></div>    

    <div class="row">
        <div class ="esquerda"> 
            <a href="cadastrar_juizo.php">
                <button type="button" class="btn btn-small btn-success">
                    <i class="icon-plus icon-white"></i>
                    INCLUIR JUÍZO     
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

<!-- Modal para edição de JUÍZO -->
<div id="myModal" class="modal hide">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h3>Edição de Juízo</h3>
    </div>   
    <div class="modal-body">

        <div id="msg_resultado">

        </div>

        <form id="form_juizo" class="form-horizontal altera_juizo_Ajax" method="post" action="../operacoes/CJuizo/editar_juizo_op.php">
            <fieldset>

                <!--Campos formulário --> 
                <div id="nome" class="control-group">
                    <label class="control-label" for="Nome">Nome</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge aviso" id="nome_input" name="nome">                       
                        <span  class="help-inline ">Minimo 2 caracteres</span>                    
                    </div>
                </div>
                <div id="comarca" class="control-group">
                    <label class="control-label" for="comarca">Comarca</label>
                    <div class="controls">                    
                        <select  name="id_comarca" id="comarca_option">
                            <option value="-1">-</option>
                            <?php
                            if ($result->id_comarca != NULL) {
                                do {
                                    echo "<option value=$result->id_comarca>$result->nome</option>";
                                } while ($result = pg_fetch_object($pesq));
                            }
                            ?>                     
                        </select>
                    </div>
                </div>
                <input type="hidden" class="input-xlarge aviso" id="id_input" name="id">    


            </fieldset>
        </form> 

        <div class="modal-footer"> 
            <a href="#" class="btn cancelar-modal-senha" data-dismiss="modal">Cancelar</a>
            <button id ="nome" type="button" class="btn btn-primary ok-modal-juizo">OK</button>
        </div>
    </div>


</body>
<?php
require_once '../template/scripts.php'; //chama scripts comuns as paginas
require_once 'script_relacao_juizo.php'; //chama scripts comuns as paginas
?>
</html>
