<?php

use Talon\Http\Response;
use Talon\Http\Response\Json as JsonResponse;

class VolunteerSkillCreateController extends UsersController {

	public function get($volunteerId) {
		/** @var Volunteer $volunteer */
		$volunteer = Volunteer::findFirst($volunteerId);
		if (!$volunteer) {
			return Response::notFound();
		}

		$template = $this->getTemplate('volunteer-skill-instance');

		$template->set('volunteerId', $volunteer->getId());

		foreach (Skill::find() as $skill) {
			$template->add('skills', array(
				'code' => $skill->getCode(),
				'skill' => $skill->getSkill(),
			));
		}

		return Response::ok($template);
	}
}