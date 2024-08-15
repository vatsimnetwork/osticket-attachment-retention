<h3 class="drag-handle"><?= __('Delete Attachments'); ?></h3>
<b><a class="close" href="#"><i class="icon-remove-circle"></i></a></b>
<div class="clear"></div>
<hr>
<form method="post" action="#attachment-retention/ticket/<?= $ticket->getId(); ?>/delete-all">
    <table width="100%">
        <tbody>
            <tr>
                <td>
                    <p>
                        <?= __('Are you sure you want to delete all attachments in this ticket?'); ?>
                    </p>
                    <p>
                        <?= __('Attachments cannot be recovered after deletion.'); ?>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <p class="full-width">
        <span class="buttons pull-left">
            <input type="button" name="cancel" class="close" value="<?= __('Cancel'); ?>">
        </span>
        <span class="buttons pull-right">
            <input type="submit" class="red button" value="<?= __('Delete'); ?>">
        </span>
    </p>
</form>
<div class="clear"></div>
