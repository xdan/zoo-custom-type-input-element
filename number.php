<?php
/**
 * @package   com_zoo
 * @author    YOOtheme http://www.yootheme.com
 * @copyright Copyright (C) YOOtheme GmbH
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// register ElementRepeatable class
App::getInstance('zoo')->loader->register('ElementRepeatable', 'elements:repeatable/repeatable.php');

/*
   Class: ElementNumber
       The Number element class
*/
class ElementNumber extends ElementRepeatable implements iRepeatSubmittable {

	/*
		Function: _hasValue
			Checks if the repeatables element's value is set.

	   Parameters:
			$params - render parameter

		Returns:
			Boolean - true, on success
	*/
	protected function _hasValue($params = array()) {
		$value = $this->get('value', $this->config->get('default'));
		return !empty($value) || $value === '0';
	}

	/*
		Function: _getSearchData
			Get repeatable elements search data.

		Returns:
			String - Search data
	*/
	protected function _getSearchData() {
		return $this->get('value', $this->config->get('default'));
	}

	/*
	   Function: _edit
	       Renders the repeatable edit form field.

	   Returns:
	       String - html
	*/
	protected function _edit() {
		return '<input '.($this->config->get('required', 0) ? 'required="true"' : '').' type="'.$this->config->get('type', 'number').'" name="'.$this->getControlName('value').'" value="'.$this->get('value', $this->config->get('default')).'"/>';;
	}


	/*
		Function: _renderSubmission
			Renders the element in submission.

	   Parameters:
            $params - AppData submission parameters

		Returns:
			String - html
	*/
	public function _renderSubmission($params = array()) {
        return $this->_edit();
	}

}