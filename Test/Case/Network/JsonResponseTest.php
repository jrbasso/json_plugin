<?php
/**
 * JsonResponseTest
 *
 * PHP 5
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('JsonResponse', 'Json.Network');

/**
 * JsonResponseTest
 * 
 */
class JsonResponseTest extends CakeTestCase {

/**
 * testConstructor method
 *
 * @return void
 */
	public function testConstruct() {
		$data = null;
		$obj = new JsonResponse($data);
		$this->assertIdentical(json_encode($data), $obj->body());
		$this->assertIdentical('application/json', $obj->type());

		$data = array('user' => 'fake', 'list' => array('item1', 'item2'));
		$obj = new JsonResponse($data);
		$this->assertIdentical(json_encode($data), $obj->body());
		$this->assertIdentical('application/json', $obj->type());
	}

}
