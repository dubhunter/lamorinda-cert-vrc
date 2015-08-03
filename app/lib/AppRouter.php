<?php

use Phalcon\Text;

class AppRouter extends Phalcon\Mvc\Router\Group {

	protected static $routes = array(
		'/' => 'home',
		'/logout' => 'logout',
		'/change-password' => 'changePassword',
		'/dashboard' => 'dashboard',
		'/volunteers' => 'volunteerList',
		'/volunteers/create' => 'volunteerCreate',
		'/volunteers/{id:[0-9]+}' => 'volunteerInstance',
		'/volunteers/{id:[0-9]+}/image' => 'volunteerInstanceImage',
		'/volunteers/{volunteerId:[0-9]+}/skills' => 'volunteerSkillList',
		'/volunteers/{volunteerId:[0-9]+}/skills/create' => 'volunteerSkillCreate',
		'/volunteers/{volunteerId:[0-9]+}/skills/{id:[0-9]+}' => 'volunteerSkillInstance',
		'/requests' => 'requestList',
		'/users' => 'userList',
		'/users/create' => 'userCreate',
		'/users/{id:[0-9]+}' => 'userInstance',
	);

	public function initialize() {
		foreach (self::$routes as $route => $controller) {
			$name = str_replace('_', '-', Text::uncamelize($controller));
			$this->add($route, $controller)->setName($name);
		}
	}

}