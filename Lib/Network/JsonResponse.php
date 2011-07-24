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

App::uses('CakeResponse', 'Network');

/**
 * JsonResponse
 * 
 */
class JsonResponse extends CakeResponse {

/**
 * Constructor
 *
 * @param mixed $response
 * @param array $options See CakeResponse::__construct()
 * @return void
 */
	public function __construct($response, $options = array()) {
		$options += array('body' => json_encode($response), 'type' => 'json');
		parent::__construct($options);
	}

}
