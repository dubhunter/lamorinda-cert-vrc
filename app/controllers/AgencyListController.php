<?php

use Dubhunter\Talon\Http\Response;

class AgencyListController extends UsersController {

	public function get() {
		$template = $this->getTemplate('agency-list');

		foreach (Agency::find() as $agency) {
			$template->add('agencies', [
				'id' => $agency->getId(),
				'name' => $agency->getName(),
				'street' => $agency->getStreet(),
				'city' => $agency->getCity(),
				'phone' => $agency->getPhone(),
				'contact' => $agency->getContact(),
				'position' => $agency->getPosition(),
				'phoneDirect' => $agency->getPhoneDirect(),
				'fax' => $agency->getFax(),
				'phoneCell' => $agency->getPhoneCell(),
				'email' => $agency->getEmail(),
				'radio' => $agency->getRadio(),
				'comment' => $agency->getComment(),
			]);
		}

		return Response::ok($template);
	}

	public function post() {
		try {
			if (!$this->security->checkToken()) {
				throw new Exception('Something went wrong. Please try again.');
			}

			$agency = new Agency();

			if ($this->request->hasPost('name')) {
				$agency->setName($this->request->getPost('name', 'string'));
			}
			if ($this->request->hasPost('street')) {
				$agency->setStreet($this->request->getPost('street', 'string'));
			}
			if ($this->request->hasPost('city')) {
				$agency->setCity($this->request->getPost('city', 'string'));
			}
			if ($this->request->hasPost('phone')) {
				$agency->setPhone($this->request->getPost('phone', 'phone'));
			}
			if ($this->request->hasPost('contact')) {
				$agency->setContact($this->request->getPost('contact', 'string'));
			}
			if ($this->request->hasPost('position')) {
				$agency->setPosition($this->request->getPost('position', 'string'));
			}
			if ($this->request->hasPost('phoneDirect')) {
				$agency->setPhoneDirect($this->request->getPost('phoneDirect', 'phone'));
			}
			if ($this->request->hasPost('fax')) {
				$agency->setFax($this->request->getPost('fax', 'phone'));
			}
			if ($this->request->hasPost('phoneCell')) {
				$agency->setPhoneCell($this->request->getPost('phoneCell', 'phone'));
			}
			if ($this->request->hasPost('email')) {
				$agency->setEmail($this->request->getPost('email', 'email'));
			}
			if ($this->request->hasPost('radio')) {
				$agency->setRadio($this->request->getPost('radio', 'string'));
			}
			if ($this->request->hasPost('comment')) {
				$agency->setComment($this->request->getPost('comment', 'string'));
			}
			$agency->save();

			$this->flash->success('Agency successfully saved!');
			return Response::temporaryRedirect(['for' => 'agency-list']);
		} catch (Exception $e) {
			$this->saveValues();
			$this->flash->error($e->getMessage());
			return Response::temporaryRedirect(['for' => 'agency-create']);
		}
	}
}
