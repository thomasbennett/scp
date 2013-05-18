<table class="carbon-container <?php echo $container_tag_class_name ?>" data-type="<?php echo $container_type ?>" data-options='<?php echo json_encode($container_options) ?>'>
	<?php foreach ($this->fields as $field): 
		$field->load();
		$help_text = $field->get_help_text();
	?>
		
		<?php if( $field->type == 'Separator' ) : ?>
			<tr class="carbon-separator">
				<td>
					<?php 
					echo $field->get_label(); 
					?>
					<?php if( !empty( $help_text ) ) :  ?><div class="help-text"><em><?php echo $help_text; ?></em></div> <?php endif; ?>
				</td>
			</tr>
		<?php continue; endif; ?>


		<tr>
			<td>
				<label for="<?php echo $field->get_id() ?>">
					<?php 
						echo $field->get_label(); 
						if ( $field->is_required() ) {
							echo ' <span class="carbon-required">*</span>';
						}
					?>
				</label>
				<div class="carbon-field carbon-<?php echo $field->type ?>" data-type="<?php echo $field->type ?>" data-name="<?php echo $field->get_name() ?>">
					<?php echo $field->render(); ?>
				</div>
				<?php if( !empty( $help_text ) ) :  ?><div class="help-text"><em><?php echo $help_text; ?></em></div> <?php endif; ?>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<?php wp_nonce_field($this->get_nonce_name(), $this->get_nonce_name(), /*referer?*/ false, /*echo?*/ true); ?>