<?php
    if (!$observacoes)
    {
        ?>
        <div class="alert info">
            <i class="fa fa-times"></i> Não há observações cadastradas
        </div>
        <?php
    } else
    {
        ?>
        <table class="table table-hover" id="observacoes">
            <thead>
                <tr>
                    <th>Observação</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($observacoes as $row)
                {
                    ?>
                    <tr>
                        <td data-id="<?php echo $row->id ?>"><?php echo $row->observacao ?></td>
                        <td>
                            <div align="center">
                                <a href="#" class="alterar tooltipped tooltipped-n" aria-label="Alterar" data-id="<?php echo $row->id ?>">
                                    <i class="octicon octicon-pencil"></i>
                                </a>
                                <a href="#" class="excluir tooltipped tooltipped-n" aria-label="Excluir" data-id="<?php echo $row->id ?>">
                                    <i class="octicon octicon-x"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <!-- Modal que será utilizado para atualizar a observação do usuario -->
        <form id="atualiza_observacao">
            <div id="updt_observacao" class="modal hide fade" data-backdrop="false">
                <div class="modal-header">
                    <img src="./img/logo.gif" alt="Pentáurea Clube" class="logo">
                    <h4 class="pull-right">Editar observação</h4>
                </div>
                <div class="modal-body">
                    <div align="center" class="form-edicao"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn danger" type="reset" data-dismiss="modal" onclick="limpar_campos($('#atualiza_observacao'))">
                        Fechar
                    </button>
                    <button class="btn primary" type="submit">
                        Salvar observação
                    </button>
                </div>
            </div>
        </form>
        <!--*****************************************************************-->
        <?php
    }
?>
<script type="text/javascript">
    /** Chama os dados para edição **/
    $('.alterar').click(function(e) {
        e.preventDefault();

        id_tupla = $(this).data('id');

        $.get('<?php echo app_baseurl() . 'administrativo/propostas/buscar_byId/' ?>' + id_tupla, function(e) {
            $('.form-edicao').html(e);
        });

        $('#updt_observacao').modal('show');
    });
    //**************************************************************************

    /**
     * Faz o submit dos novos dados via AJAX
     */
    $('#atualiza_observacao').submit(function(e) {
        e.preventDefault();

        observacao = $('#nova_observacao').val();
        id_tupla = $('#id_tupla').val();

        $.ajax({
            url: '<?php echo app_baseurl() . 'administrativo/propostas/atualizar' ?>',
            type: 'POST',
            data: {observacao: observacao, id: id_tupla},
            dataType: 'html',
            success: function(sucesso)
            {
                if(sucesso == 1)
                {
                    msg_sucesso('Observação atualizada');
                    limpar_campos($('#atualiza_observacao'));
                    load_observacoes();
                    $('#updt_observacao').modal('hide');
                }
                else
                {
                    msg_erro('Não foi possível atualizar. Tente novamente');
                }
                                
            },
            error: function()
            {
                msg_erro('Ocorreu um erro. Tente mais tarde');
            }
        });
    });
    //**************************************************************************
    
    /**
     * Exclui um registri via ajax
     */
    $('.excluir').click(function(e){
        e.preventDefault();
        
        id_tupla = $(this).data('id');
        
        $.post('<?php echo app_baseurl().'administrativo/propostas/apagar'?>', {id: id_tupla}, function(sucesso){
            if(sucesso == 1)
            {
                msg_sucesso('Observação excluida');
                load_observacoes();
            }
            else
            {
                msg_erro('Não foi possível atualizar. Tente novamente');
            }
        }).fail(function (){
            msg_erro('Ocorreu um erro. Tente mais tarde');
        });
    });
</script>