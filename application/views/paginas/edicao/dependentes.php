<?php
    if(empty($dependente))
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
        foreach($dependente as $row)
        {
            ?>
            <input type="hidden" id="id_dependente" value="<?php echo $row->id ?>">
            <div class="control-group">
                <label>Nome do dependente</label>
                <div class="controls">
                    <input class="span5" type="text" id="ed_nome_dependente" value="<?php echo $row->nome_dependente ?>">
                </div>
            </div>

            <div class="control-group">
                <label>Grau de parentesco</label>
                <div class="controls">
                    <select class="span5" id="ed_parentesco_dependente" required></select>
                </div>
            </div>

            <div class="control-group">
                <label>Data de nascimento</label>
                <div class="controls">
                    <input class="span5" type="text" id="ed_data_nascimento_dependente" required="" value="<?php echo $row->data_nascimento_dependente ?>">
                </div>
            </div>

            <div class="control-group">
                <label>Estado civil</label>
                <div class="controls">
                    <select class="span5" id="ed_estado_civil_dependente" required="">
                        <option value="">Selecione uma opção</option>
                        <option value="Casado">Casado</option>
                        <option value="Solteiro">Solteiro</option>
                        <option value="Viúvo">Viúvo</option>
                        <option value="Desquitado ou divorciado">Desquitado ou divorciado</option>
                        <option value="Marital">Marital</option>
                    </select>
                </div>
            </div>
            <?php
        }
    }
?>
<script type="text/javascript">
    /** Chama função que busca o parentesco **/
    busca_parentesco();
    /** Salva as novas informações do dependente **/
    $('#atualiza_dependente').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo app_baseurl().'painel/dependentes/atualizar_dependente' ?>',
            type: 'POST',
            data: {
                id: $('#id_dependente').val(),
                nome_dependente: $('#ed_nome_dependente').val(),
                parentesco_dependente: $('#ed_parentesco_dependente').val(),
                data_nascimento_dependente: $('#ed_data_nascimento_dependente').val(),
                estado_civil_dependente: $('#ed_estado_civil_dependente').val()
            },
            dataType: 'html',
            success: function(sucesso)
            {
                if (sucesso == 1)
                {
                    $.smallBox({
                        title: "<i class='fa fa-check'></i> Sucesso",
                        content: "<strong>Dependente atualizado</strong>",
                        iconSmall: "fa fa-thumbs-up bounce animated",
                        color: "#3b5998",
                        timeout: 5000
                    });
                    $('#atualiza_dependente').modal('hide');
                    limpar_capos();
                    buscar();
                }
                else
                {
                    $.smallBox({
                        title: "<i class='fa fa-check'></i> Erro",
                        content: "<strong>Não foi possível atualizar o dependente. Tente novamente</strong>",
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