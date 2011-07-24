<?php
/**
 * JsonViewTest
 *
 * PHP 5
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('CakeRequest', 'Network');
App::uses('CakeResponse', 'Network');
App::uses('JsonView', 'Json.View');

/**
 * JsonViewTest
 * 
 */
class JsonViewTest extends CakeTestCase {

/**
 * testRenderWithoutView method
 *
 * @return void
 */
	public function testRenderWithoutView() {
		$request = new CakeRequest();
		$response = new CakeResponse();
		$controller = new Controller($request, $response);
		$data = array('user' => 'fake', 'list' => array('item1', 'item2'));
		$controller->set('json', $data);
		$view = new JsonView($controller);
		$output = $view->render(false);

		$this->assertIdentical(json_encode($data), $output);
		$this->assertIdentical('application/json', $response->type());
	}

/**
 * testRenderWithView method
 *
 * @return void
 */
	public function testRenderWithView() {
		App::build(array('View' => array(dirname(dirname(dirname(__FILE__))) . DS . 'test_app' . DS . 'View' . DS . 'JsonTest')));
		$request = new CakeRequest();
		$response = new CakeResponse();
		$controller = new Controller($request, $response);
		$data = array(
			'User' => array(
				'username' => 'fake'
			),
			'Item' => array(
				array('name' => 'item1'),
				array('name' => 'item2')
			)
		);
		$controller->set('user', $data);
		$view = new JsonView($controller);
		$output = $view->render('index');

		$expected = json_encode(array('user' => 'fake', 'list' => array('item1', 'item2')));
		$this->assertIdentical($expected, $output);
		$this->assertIdentical('application/json', $response->type());
	}

}
