<?php
    if (!$observacoes)
    {
        ?>
        <div class="alert info">
            <i class="fa fa-check"></i> Você não possui observações
        </div>
        <?php
    }
    else
    {
        ?>
        <table class="table">
            <?php
            foreach ($observacoes as $row)
            {
                ?>
                <tr>
                    <td><strong><i><?php echo date('d/m/Y h:m', strtotime($row->data_hora))?></i></strong></td>
                    <td><?php echo $row->observacao?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }