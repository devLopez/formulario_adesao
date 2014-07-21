<?php
    if(empty($referencia))
    {
        ?>
        <div class="alert alert-block erro">
            <h4><i class="fa fa-times"></i> Erro</h4>
            <p>Ocorreu um erro ao buscar os dados.</p>
        </div>
        <?php
    }
    else
    {
        foreach($referencia as $row)
        {
            ?>
            <input type="hidden" id="id_referencia" value="<?php echo $row->id ?>">
            <div class="control-group">
                <label><strong>Nome:</strong></label>
                <div class="controls">
                    <input class="span5" type="text" id="ed_nome_referencia" value="<?php echo $row->nome_referencia ?>">
                </div>
            </div>

            <div class="control-group">
                <label><strong>Endereço:</strong></label>
                <div class="controls">
                    <input type="text" class="span5" id="ed_endereco_referencia" required value="<?php echo $row->endereco_referencia?>">
                </div>
            </div>

            <div class="control-group">
                <label><strong>Telefone</strong></label>
                <div class="controls">
                    <input class="span5" type="text" id="ed_telefone_referencia" required="" value="<?php echo $row->telefone_referencia ?>">
                </div>
            </div>
            <?php
        }
    }
?>
<script type="text/javascript">
    
    /** Salva as novas informações do dependente **/
    $('#atualiza_referencia').submit(function(e) {
        e.preventDefault();
        
        $.ajax({
            url: '<?php echo app_baseurl().'painel/referencias/atualizar_dados' ?>',
            type: 'POST',
            data: {
                id: $('#id_referencia').val(),
                ed_nome_referencia: $('#ed_nome_referencia').val(),
                ed_endereco_referencia: $('#ed_endereco_referencia').val(),
                ed_telefone_referencia: $('#ed_telefone_referencia').val()
            },
            dataType: 'html',
            success: function(sucesso)
            {
                if (sucesso == 1)
                {
                    $.smallBox({
                        title: "<i class='fa fa-check'></i> Sucesso",
                        content: "<strong>Referência atualizada</strong>",
                        iconSmall: "fa fa-thumbs-up bounce animated",
                        color: "#3b5998",
                        timeout: 5000
                    });
                    buscar_referencias();
                    $('#update').modal('hide');
                }
                else
                {
                    $.smallBox({
                        title: "<i class='fa fa-check'></i> Erro",
                        content: "<strong>Não foi possível atualizar a referência. Tente novamente</strong>",
                        iconSmall: "fa fa-thumbs-down bounce animated",
                        color: "#FE1A00",
                        timeout: 5000
                    });
                }
            },
            error: function()
            {
                $.smallBox({
                    title: "<i class='fa fa-check'></i> Erro",
                    content: "<strong>Ocorreu um erro. Tente novamente</strong>",
                    iconSmall: "fa fa-thumbs-down bounce animated",
                    color: "#FE1A00",
                    timeout: 5000
                });
            }
        });
    });
</script>