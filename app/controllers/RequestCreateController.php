<?php

use Talon\Http\Response;

class RequestCreateController extends UsersController {

	public function get() {
		$template = $this->getTemplate('request-instance');

		foreach (Agency::find() as $agency) {
			$template->add('agencies', array(
				'id' => $agency->getId(),
				'name' => $agency->getName(),
			));
		}

		foreach (Jurisdiction::find() as $jurisdiction) {
			$template->add('jurisdictions', array(
				'id' => $jurisdiction->getId(),
				'jurisdiction' => $jurisdiction->getJurisdiction(),
			));
		}

		return Response::ok($template);
	}
}