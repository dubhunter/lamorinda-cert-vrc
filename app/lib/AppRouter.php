<?php

use Dubhunter\Talon\Mvc\Router\NamedGroup;

class AppRouter extends NamedGroup {

	const ROUTES = [
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
		'/volunteers/{volunteerId:[0-9]+}/availability' => 'volunteerAvailabilityList',
		'/volunteers/{volunteerId:[0-9]+}/availability/create' => 'volunteerAvailabilityCreate',
		'/volunteers/{volunteerId:[0-9]+}/availability/{id:[0-9]+}' => 'volunteerAvailabilityInstance',
		'/volunteers/{volunteerId:[0-9]+}/placements' => 'volunteerPlacementList',
		'/volunteers/{volunteerId:[0-9]+}/placements/create' => 'volunteerPlacementCreate',
		'/volunteers/{volunteerId:[0-9]+}/placements/{id:[0-9]+}' => 'volunteerPlacementInstance',
		'/volunteers/{volunteerId:[0-9]+}/placements/{id:[0-9]+}/badge' => 'volunteerPlacementInstanceBadge',
		'/volunteers/{volunteerId:[0-9]+}/dsw' => 'volunteerDswList',
		'/volunteers/{volunteerId:[0-9]+}/dsw/create' => 'volunteerDswCreate',
		'/volunteers/{volunteerId:[0-9]+}/dsw/{id:[0-9]+}' => 'volunteerDswInstance',
		'/requests' => 'requestList',
		'/requests/create' => 'requestCreate',
		'/requests/{id:[0-9]+}' => 'requestInstance',
		'/requests/{requestId:[0-9]+}/details' => 'requestDetailList',
		'/requests/{requestId:[0-9]+}/details/create' => 'requestDetailCreate',
		'/requests/{requestId:[0-9]+}/details/{id:[0-9]+}' => 'requestDetailInstance',
		'/agencies' => 'agencyList',
		'/agencies/create' => 'agencyCreate',
		'/agencies/{id:[A-Z]+}' => 'agencyInstance',
		'/requests/{agencyId:[A-Z]+}/details' => 'agencyRequestList',
		'/jurisdictions' => 'jurisdictionList',
		'/jurisdictions/create' => 'jurisdictionCreate',
		'/jurisdictions/{id:[0-9]+}' => 'jurisdictionInstance',
		'/skills' => 'skillList',
		'/skills/create' => 'skillCreate',
		'/skills/{code:[A-Z\-0-9]+}' => 'skillInstance',
		'/dsw-classes' => 'dswClassList',
		'/dsw-classes/create' => 'dswClassCreate',
		'/dsw-classes/{id:[0-9]+}' => 'dswClassInstance',
		'/users' => 'userList',
		'/users/create' => 'userCreate',
		'/users/{id:[0-9]+}' => 'userInstance',
	];

}
