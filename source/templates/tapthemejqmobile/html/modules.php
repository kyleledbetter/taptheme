<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

function modChrome_dropdownmenu($module, &$params, &$attributes) {
	$xml = simplexml_load_string($module->content);
	$xml->addAttribute('data-role', 'listview');
	if ($attributes['data-active-theme'] != 'default') {
		foreach($xml->li as $li) {
			$class = explode(" ", $li->attributes()->class);
			if (in_array('active', $class)) {
				$li->addAttribute('data-theme', $attributes['data-active-theme']);
			}
		}
	}
	
	$string = $xml->asXML();
	$lines = explode("\n", $string);
	$output = implode("\n", array_slice($lines, 1));
	?>
	<div data-role="collapsible" class="module<?php echo $params->get('moduleclass_sfx', '');?>">
		<h3><?php echo $module->title;?></h3>
		<?php echo $output; ?>
	</div>
	
	<?php
}

function modChrome_modalmenu($module, &$params, &$attributes) {
	$xml = simplexml_load_string($module->content);
	$xml->addAttribute('data-role', 'listview');
	if ($attributes['data-active-theme'] != 'default') {
		foreach($xml->li as $li) {
			$class = explode(" ", $li->attributes()->class);
			if (in_array('active', $class)) {
				$li->addAttribute('data-theme', $attributes['data-active-theme']);
			}
		}
	}
	
	$string = $xml->asXML();
	$lines = explode("\n", $string);
	$output = implode("\n", array_slice($lines, 1));
	?>
	<div data-role="page" id='modalmenu'>
		<div data-role="header">
        	<h1><?php echo $module->title;?></h1>
        </div>
        <div data-role="content">
			<?php echo $output; ?>
		</div>
		<div data-role="footer">&nbsp;</div>
	</div>
	<?php
}