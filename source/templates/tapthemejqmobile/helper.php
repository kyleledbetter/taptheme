<?php
/**
 * @copyright	Copyright (C) 2009-2011 Pixel Praise LLC. All rights reserved.
 * @license		All derivate Joomla! code is GNU/GPL, all images and are bound by the Pixel Praise Proprietary License.
 */

// no direct access
defined('_JEXEC') or die;

class JQMobileHelper extends JObject {
	
	protected $params		= null;
	protected $body_class = null;
	protected $is_home	= null;
	protected $page_options	= null;
	
	public function __construct($params) {
		
		$option = JRequest::getCmd('option', '');
		$view = JRequest::getCmd('view', '');
		$layout = JRequest::getCmd('layout', '');
		$task = JRequest::getCmd('task', '');
		$itemid = JRequest::getCmd('Itemid', '');
		
		$this->set('params', $params);
		$body_class = $option . " " . $view . " " . $layout . " " . $task . " itemid-" . $itemid;


//		$menu = JFactory::getApplication()->getMenu();
//
//		if ($menu->getActive() == $menu->getDefault()) {
//			$this->set('is_home', true);
//		} else {
//			$this->set('is_home', false);
//		}
		
		if ($this->get('is_home')) {
			$body_class .= ' home';
		}
		
		$this->set('body_class', $body_class);
		
		$jqmobile_theme = new JQMobileOptions();
		if ($this->getParam('jqmobile_theme', 'default') != 'default') {
			$jqmobile_theme->add('data-theme', $this->getParam('jqmobile_theme'));
		}
		$this->set('jqmobile_theme', $jqmobile_theme);
	}
	
	public function getParam($key, $default=null) {
		return $this->params->get($key, $default);
	}

	public function writeCSS() {
		$link_color = $this->getParam('linkColor', '');
		$font_color = $this->getParam('fontColor', '');

		if (!$link_color && !$font_color) {
			return null;
		}

		$output = "<style type='text/css'>\n";
		$output .= $link_color ? "#data_page a.ui-link, #data_page a.ui-link:visited {color: ".$link_color.";}\n" : '';
		$output .= $font_color ? "#data_page, #data_page .ui-dialog {color: ".$font_color.";}\n" : '';
		$output .= "</style>";
		return $output;
	}

}

class JQMobileOptions extends JObject {
	
	protected $properties	= array();
	
	public function __construct($options=array()) {
		foreach($options as $k => $v) {
			$this->add($k, $v);
		}
	}
	
	public function add($key, $value) {
		$this->properties[$key] = $value;
	}
	
	public function __toString() {
		$pieces = array();
		foreach($this->properties as $k => $v) {
			$pieces[] = $k."='".$v."'";
		}
		return implode(" ", $pieces);
	}
}