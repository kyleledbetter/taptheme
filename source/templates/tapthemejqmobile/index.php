<?php
/**
 * @copyright	Copyright (C) 2009-2012 Pixel Praise LLC. All rights reserved.
 * @license		All derivate Joomla! code is GNU/GPL, all images and are bound by the Pixel Praise Proprietary License.
 */

// no direct access
defined('_JEXEC') or die;
require_once dirname(__FILE__).'/helper.php';
$helper = new JQMobileHelper($this->params);
?>
<!DOCTYPE html>
<html>
	<head>
		<jdoc:include type="head" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/images/apple-touch-icon.png" />
		<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/jqm/jquery.mobile.structure.min.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/jqm/custom.min.css" type="text/css" />

		<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
		
		<?php echo $helper->writeCSS(); ?>

		<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/js/jquery.min.js"></script>
		<script type="text/javascript">
			jQuery.noConflict();
		    (function($) {
				$(document).bind("mobileinit", function(){
		        	$.mobile.page.prototype.options.addBackBtn = true;
		    	});
				$(document).bind('pagebeforecreate', function() {
					$('p.readmore a, .k2ReadMore, .pagenav li').attr('data-role', 'button');
					$('ul.menusitemap, .categories-list ul').attr('data-role', 'listview').attr('data-inset', 'true');
					$('.k2Pagination a').attr('data-role', 'button').attr('data-inline', 'true');
					$('.categories-list .item-title a').addClass('ui-li-heading');
					$('ul.pagenav').attr('data-role', 'controlgroup').attr('data-type', 'horizontal');
				});
			})(jQuery)
		</script>
		<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/jqm/jquery.mobile.min.js"></script>
	</head>

	<body class="<?php echo $helper->get('body_class');?>">
		<div data-role="page" id="data_page" <?php echo $helper->get('jqmobile_theme');?>>

			<div data-role="header" id="data_header" <?php echo $helper->get('jqmobile_theme');?>>
				<h1><?php echo $this->title;?></h1>
				<?php if ($this->countModules('jqmobile-modalmenu')) : ?>
					<a href="#modalmenu" data-role="button" data-icon="grid" data-rel="dialog" data-transition="flip" class="ui-btn-right" data-inline="true">Menu</a>
				<?php elseif ($helper->getParam('home_button') && !$helper->get('is_home')) : ?>
					<a href="<?php echo JURI::root();?>" data-role="button" data-icon="home" data-iconpos="notext" class="ui-btn-right" data-inline="true">'.JText::_('TPL_JQMOBILE_HOME').'</a>
				<?php endif; ?>
			</div><!-- /header -->
			
			<div data-role="content" id="data_content">
				
				<!-- Logo goes here -->
								
				<?php if ($this->countModules('jqmobile-search')) : ?>
					<div id="jqmobile-search">
						<jdoc:include type="modules" name="jqmobile-search" />
					</div>
				<?php endif; ?>
				
				<?php if ($this->countModules('jqmobile-dropdown-top')) : ?>
					<div id="jqmobile-menu-top">
						<jdoc:include type="modules" name="jqmobile-dropdown-top" data-active-theme="<?php echo $helper->getParam('jqmobile_active_menu_theme', 'default');?>" style="dropdownmenu" />
					</div>
				<?php endif; ?>

				<?php if ($this->countModules('jqmobile-top1')) : ?>
					<div id="jqmobile-top1">
						<jdoc:include type="modules" name="jqmobile-top1" style="xhtml"/>
					</div>
				<?php endif; ?>
				
				<?php if ($this->countModules('jqmobile-cpanel') && $helper->get('is_home')) : ?>
					<div  data-role="navbar" data-iconpos="top" id="jqmobile-cpanel">
						<jdoc:include type="modules" name="jqmobile-cpanel" />
					</div>
				<?php elseif ($this->countModules('jqmobile-cpanel') && !$helper->get('is_home')): ?>
					<div  data-role="navbar" data-iconpos="top" id="jqmobile-cpanel">
						<jdoc:include type="modules" name="jqmobile-cpanel" />
					</div>
					<div class="jqmobile-content">
						<jdoc:include type="message" />
						<jdoc:include type="component" />
					</div>
				<?php else : ?>
					<div class="jqmobile-content">
						<jdoc:include type="message" />
						<jdoc:include type="component" />
					</div>
				<?php endif; ?>
				
				<?php if ($this->countModules('jqmobile-bottom1')) : ?>
					<div id="jqmobile-bottom1">
						<jdoc:include type="modules" name="jqmobile-bottom1" style="xhtml"/>
					</div>
				<?php endif; ?>

				<?php if ($this->countModules('jqmobile-dropdown-bottom')) : ?>
					<div id="jqmobile-menu-bottom">
						<jdoc:include type="modules" name="jqmobile-dropdown-bottom" data-active-theme="<?php echo $helper->getParam('jqmobile_active_menu_theme', 'default');?>" style="dropdownmenu" />
					</div>
				<?php endif; ?>
				
				<?php if ($this->countModules('jqmobile-footer')) : ?>
					<div data-role="footer" data-position="fixed" data-id="jqmobile-footer" id="jqmobile-footer">
						<div data-role="navbar">
							<jdoc:include type="modules" name="jqmobile-footer" style="none"/>
						</div>
					</div>
				<?php endif; ?>
			</div><!-- /content -->

		</div>
		<?php if ($this->countModules('jqmobile-modalmenu')) : ?>
			<jdoc:include type="modules" name="jqmobile-modalmenu" data-active-theme="<?php echo $helper->getParam('jqmobile_active_menu_theme', 'default');?>" style="modalmenu" />
		<?php endif; ?>
	</body>
</html>