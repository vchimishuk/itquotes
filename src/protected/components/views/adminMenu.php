<div class="h_bottom">
	<ul>
		<li>
			<?=CHtml::link('Quotes', array('quote/list'), array(
				'class' => $controller == 'quote' ? 'up' : '',
			))?>
		</li>
		<li>
			<?=CHtml::link('Tags', array('tag/list'), array(
				'class' => $controller == 'tag' ? 'up' : '',
			))?>
		</li>
		<li>
			<?=CHtml::link('Profile', array('profile/change_password'), array(
				'class' => $controller == 'profile' ? 'up' : '',
			))?>
		</li>
	</ul>
</div>
