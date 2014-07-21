<?php
    if (empty($referencias))
    {
        ?>
        <div class="alert alert-block info">
            <i class="fam-information"></i> Você ainda não cadastrou referencias e bancárias
        </div>
        <?php
    } else
    {
        ?>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($referencias as $row)
                {
                    ?>
                    <tr>
                        <td><?php echo $row->nome_referencia?></td>
                        <td><?php echo $row->endereco_referencia?></td>
                        <td><?php echo $row->telefone_referencia?></td>
                        <td>
                            <div align="center">
                                <a class="excluir tooltipped tooltipped-n" aria-label="Excluir esta referencia" href="#" data-id="<?php echo $row->id ?>">
                                    <i class="octicon octicon-trashcan"></i>
                                </a>
                                <a data-toggle="modal" data-target="#update" class="editar tooltipped tooltipped-n" aria-label="Editar este dependente" href="#" data-url="<?php echo app_baseurl().'painel/referencias/editar_referencia/'.$row->id ?>">
                                    <i class="octicon octicon-pencil"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
?>

<!-- Formulário que receberá os dados para edição -->
<form id="atualiza_referencia">
    <div id="update" class="modal hide fade" data-backdrop="false" data-keyboard="false">
        <div class="modal-header">
            <h3>Edição de Referência</h3>
        </div>
        <div class="modal-body" id="dados_edicao"></div>
        <div class="modal-footer">
            <button type="button" class="btn danger" data-dismiss="modal" onclick="limpar_campos()">Cancelar</button>
            <button type="submit" class="btn primary">Atualizar referência</button>
        </div>
    </div>
</form>
<!--*************************************************************************-->
<script type="text/javascript">
    /** Início do Jquery **/
    $(document).ready(function(){
        
        /** Função que exclui uma referencia **/
        $('.excluir').click(function(e){
            e.preventDefault();
            
            var id = $(this).data('id');
            
            $.SmartMessageBox({
                title: '<i class="fa fa-times" style="color:red"></i> Atenção',
                content: 'Você está prestes a excluir uma referência. Deseja prosseguir?',
                buttons: '[Sim, excluir o registro][Não excluir]'
            }, function(e){
                if(e == 'Não excluir')
                {
                    return false;
                }
                else
                {
                    $.post('<?php echo app_baseurl().'painel/referencias/excluir'?>', {id: id}, function(sucesso){
                        if (sucesso == 1)
                        {
                            $.smallBox({
                                title: "<i class='fa fa-check'></i> Sucesso",
                                content: "<strong>Referência excluida</strong>",
                                iconSmall: "fa fa-thumbs-up bounce animated",
                                color: "#3b5998",
                                timeout: 5000
                            });
                            buscar_referencias();
                        }
                        else
                        {
                            $.smallBox({
                                title: "<i class='fa fa-check'></i> Erro",
                                content: "<strong>Não foi possível excluir a referência. Tente novamente</strong>",
                                iconSmall: "fa fa-thumbs-down bounce animated",
                                color: "#FE1A00",
                                timeout: 5000
                            });
                        }
                    }).fail(function(){
                        $.smallBox({
                            title: "<i class='fa fa-check'></i> Erro",
                            content: "<strong>Ocorreu um erro. Tente novamente</strong>",
                            iconSmall: "fa fa-thumbs-down bounce animated",
                            color: "#FE1A00",
                            timeout: 5000
                        });
                    });
                }
            });
        });
        
        /** Função desenvolvida para edição dos dados de um registro **/
        $('.editar').click(function(e){
            e.preventDefault();
            
            url = $(this).data('url');
            
            $.get(url, function(e){
                $('#dados_edicao').html(e);
            });
        });
    });
</script>