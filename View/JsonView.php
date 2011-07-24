<?php
/**
 * JsonResponse
 *
 * PHP 5
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('JsonResponse', 'Json.Network');
App::uses('View', 'View');

/**
 * JsonView
 * 
 */
class JsonView extends View {

/**
 * Constructor
 *
 * @param Controller $controller
 */
	public function __construct($controller) {
		if (is_object($controller)) {
			foreach (array('viewVars', 'viewPath', 'view', 'response') as $var) {
				$this->{$var} = $controller->{$var};
			}
			$this->response->type('json');
		}
		Object::__construct();
	}

/**
 * This method will try to load the view file, the view file must set the json variable in view class,
 * using $this->set('json', 'my custom value');
 * If the view file is not found, this method will try to use the 'json' variabel set in controller.
 *
 * @param string $view
 * @param string $layout
 * @return string
 */
	public function render($view = null, $layout = null) {
		if ($view !== false && $viewFileName = $this->_getViewFileName($view)) {
			$this->_render($viewFileName);
		}

		$data = isset($this->viewVars['json']) ? $this->viewVars['json'] : null;

		return $this->output = json_encode($data);
	}

}
