<style>
.btn-success:hover {
    color: #fff;
    background-color: #218838;
    border-color: #1e7e34;
}
.btn:hover {
    color: #fff;
    text-decoration: none;
}
.btn-group-lg > .btn, .btn-lg {
    padding: .5rem 1rem;
    font-size: 1.25rem;
    line-height: 1.5;
    border-radius: .3rem;
}
.btn-success {
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
    box-shadow: none;
}
.btn {
	text-decoration: none;
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
	padding: 5px 20px;
}
.btn-group-sm>.btn, .btn-sm {
    padding: -0.75rem .5rem;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
}
.btn-success {
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
    box-shadow: none;
}

</style>
<table cellpadding="0" cellspacing="0" border="0" class="display groceryCrudTable" id="<?php echo uniqid(); ?>">
	<thead>
		<tr>
			<?php foreach($columns as $column){?>
				<th><?php echo $column->display_as; ?></th>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<th class='actions'><?php echo $this->l('list_actions'); ?></th>
			<?php }?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($list as $num_row => $row){ ?>
		<tr id='row-<?php echo $num_row?>'>
			<?php foreach($columns as $column){?>
				<td><?php echo $row->{$column->field_name}?></td>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<td class='actions'>
				<?php
				if(!empty($row->action_urls)){
					foreach($row->action_urls as $action_unique_id => $action_url){
						$action = $actions[$action_unique_id];
				?>
						<a
                                href="<?php echo $action_url; ?>"
                                class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary"
                                role="button"
                            <?php if ($action->new_tab) { ?>
                                target="_blank"
                            <?php } ?>
                        >
							<span class="<?php echo $action->css_class; ?>"></span><span class="ui-button-text">&nbsp;<?php echo $action->label?></span>
						</a>
				<?php }
				}
				?>
				<?php if(!$unset_read){?>
					<a href="<?php echo $row->read_url?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
						<span class="ui-button-icon-primary ui-icon ui-icon-document"></span>
						<span class="ui-button-text">&nbsp;<?php echo $this->l('list_view'); ?></span>
					</a>
				<?php }?>

                <?php if(!$unset_clone){?>
                    <a href="<?php echo $row->clone_url?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
                        <span class="ui-button-icon-primary ui-icon ui-icon-copy"></span>
                        <span class="ui-button-text">&nbsp;<?php echo $this->l('list_clone'); ?></span>
                    </a>
                <?php }?>

				<?php if(!$unset_edit){?>
					<a href="<?php echo $row->edit_url?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
						<span class="ui-button-icon-primary ui-icon ui-icon-pencil"></span>
						<span class="ui-button-text">&nbsp;<?php echo $this->l('list_edit'); ?></span>
					</a>
				<?php }?>

				<?php if(!$unset_delete){?>
					<a onclick = "javascript: return delete_row('<?php echo $row->delete_url?>', '<?php echo $num_row?>')"
						href="javascript:void(0)" class="delete_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
						<span class="ui-button-icon-primary ui-icon ui-icon-circle-minus"></span>
						<span class="ui-button-text">&nbsp;<?php echo $this->l('list_delete'); ?></span>
					</a>
				<?php }?>
			</td>
			<?php }?>
		</tr>
		<?php }?>
	</tbody>
	<tfoot>
		<tr>
			<?php foreach($columns as $column){?>
				<th><input type="text" name="<?php echo $column->field_name; ?>" placeholder="<?php echo $this->l('list_search').' '.$column->display_as; ?>" class="search_<?php echo $column->field_name; ?>" /></th>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
				<th>
					<a href="javascript:void(0)" role="button" class="clear-filtering ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary floatR">
						<span class="ui-button-icon-primary ui-icon ui-icon-arrowrefresh-1-e"></span>
						<span class="ui-button-text"><?php echo $this->l('list_clear_filtering');?></span>
					</a>
				</th>
			<?php }?>
		</tr>
	</tfoot>
</table>
