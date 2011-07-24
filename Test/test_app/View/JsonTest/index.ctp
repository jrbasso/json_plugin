<?php

$formatted = array(
	'user' => $user['User']['username'],
	'list' => array()
);
foreach ($user['Item'] as $item) {
	$formatted['list'][] = $item['name'];
}

$this->set('json', $formatted);
