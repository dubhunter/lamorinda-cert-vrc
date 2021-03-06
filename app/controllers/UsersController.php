<?php

use Dubhunter\Talon\Http\Response;
use Dubhunter\Talon\Http\RestRequest;
use Dubhunter\Talon\Mvc\RestDispatcher;

class UsersController extends SiteController {

	/** @var User $user */
	protected $user;

	/**
	 * @param RestDispatcher $dispatcher
	 * @return bool
	 */
	public function beforeExecuteRoute($dispatcher) {
		$auth = $this->session->get('auth');
		if (!$auth) {
			/** @var RestRequest $request */
			$request = $this->request;
			$this->session->set('target', $request->getURI());
			$this->flash->warning('You must login first.');
			$dispatcher->setReturnedValue(Response::temporaryRedirect(['for' => 'home']));
			return false;
		}
		return true;
	}

	public function	initialize() {
		parent::initialize();

		$auth = $this->session->get('auth');
		$this->user = User::findFirst($auth['id']);
	}

	protected function getAppGlobal() {
		$app = parent::getAppGlobal();
		$app['user'] = array(
			'id' => $this->user->getId(),
			'username' => $this->user->getUsername(),
			'admin' => $this->user->isAdmin(),
		);
		return $app;
	}

}
