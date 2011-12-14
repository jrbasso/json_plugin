# Json Plugin

This behavior is designed to CakePHP 2.0 and give a performed way to response JSON requests.

## Installation
- Clone from github: from your app directory, run `git clone git://github.com/jrbasso/json_plugin.git Plugin/Json`
- Add as a git submodule: from you app directory, run `git submodule add git://github.com/jrbasso/json_plugin.git Plugin/Json`
- Download an archive from github and extract it in `app/Plugin/Json`

If you are not using `CakePlugin::loadAll()`, add `CakePlugin::load('Json');` in your bootstrap.

## Usage

### Directly from your Controller

	<?php
	App::uses('JsonResponse', 'Json.Network');
	class UserController extends AppController {
		public function index() {
			$data = $this->User->find('all');
			return new JsonResponse($data);
		}
	}
	?>

This way is not compatible with MVC archicture, but is the most easy and fast way to response JSON requests.

### Setting json variable in Controller

	<?php
	class UserController extends AppController {
		public $view = 'Json.Json';
		public function index() {
			$data = $this->User->find('all');
			$this->set('json', $data);
		}
	}
	?>

This is the fast way in MVC, but do not load helpers and view files. Just transform the `$data` in JSON.

### Using view files (recommended)

Set the data in your controller:

	<?php
	class UserController extends AppController {
		public $view = 'Json.Json';
		public function index() {
			$users = $this->User->find('all');
			$this->set(compact('users'));
		}
	}
	?>

Format the json in your view file:

	<?php
	$json = array('users' => array());
	foreach ($users as $user) {
		$json['users'][] = $user['User']['username'];
	}
	$this->set(compact('json'));
	?>


## License

MIT License (http://www.opensource.org/licenses/mit-license.php)