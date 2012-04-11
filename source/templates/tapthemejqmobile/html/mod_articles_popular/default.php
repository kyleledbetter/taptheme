<?php
/**
 * @version		$Id: default.php 22338 2011-11-04 17:24:53Z github_bot $
 * @package		Joomla.Site
 * @subpackage	mod_articles_popular
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$data_inset = strpos($moduleclass_sfx, '-inset') !== false ? true : false;
$collapsible = strpos($moduleclass_sfx, '-collapsible') !== false ? true : false;

//var_dump($module);
?>

<?php 
if ($collapsible) {
	echo "<div data-role='collapsible' class='mostread_".$module->id."'>";
	echo "<h3>".$module->title."</h3>";
	$module->showtitle = false;
}
?>

<ul class="mostread<?php echo $moduleclass_sfx; ?>" data-role="listview" data-inset="<?php echo $data_inset;?>">
<?php foreach ($list as $item) : ?>
	<li>
		<a href="<?php echo $item->link; ?>">
			<?php echo $item->title; ?></a>
	</li>
<?php endforeach; ?>
</ul>

<?php 
if ($collapsible) {
	echo "</div>";
}
?>