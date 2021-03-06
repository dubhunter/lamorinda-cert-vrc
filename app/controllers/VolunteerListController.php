<?php

use Dubhunter\Talon\Http\Response;

class VolunteerListController extends UsersController {

	public function get() {
		$template = $this->getTemplate('volunteer-list');

		$options = [];

		$search = $this->request->getQuery('q', ['string', 'trim']);

		if (!empty($search)) {
			$search = strtolower($search);

			$options['conditions'] = 'LOWER(name_first) = :search: OR LOWER(name_last) = :search:';
			$options['conditions'] .= ' OR LOWER(email) = :search:';
			$options['conditions'] .= ' OR phone_day = :search: OR phone_eve = :search: OR phone_cell = :search:';
			$options['bind'] = array(
				'search' => $search,
			);
		}

		foreach (Volunteer::find($options) as $volunteer) {
			$template->add('volunteers', [
				'id' => $volunteer->getId(),
				'nameFirst' => $volunteer->getNameFirst(),
				'nameLast' => $volunteer->getNameLast(),
				'nameMiddle' => $volunteer->getNameMiddle(),
				'address' => $volunteer->getAddress(),
				'city' => $volunteer->getCity(),
				'state' => $volunteer->getState(),
				'zip' => $volunteer->getZip(),
				'phoneDay' => $volunteer->getPhoneDay(),
				'phoneEve' => $volunteer->getPhoneEve(),
				'phoneCell' => $volunteer->getPhoneCell(),
				'email' => $volunteer->getEmail(),
				'minor' => $volunteer->getMinor(),
				'dob' => $volunteer->getDOB(),
				'guardianName' => $volunteer->getGuardianName(),
				'idType' => $volunteer->getIdType(),
				'idNumber' => $volunteer->getIdNumber(),
				'idState' => $volunteer->getIdState(),
				'agency' => $volunteer->getAgency(),
				'training' => $volunteer->getTraining(),
				'emergencyContactName' => $volunteer->getEmergencyContactName(),
				'emergencyContactPhone' => $volunteer->getEmergencyContactPhone(),
				'intakeBy' => $volunteer->getIntakeBy(),
				'intakeTime' => $volunteer->getIntakeTime(),
				'backgroundBy' => $volunteer->getBackgroundBy(),
				'backgroundTime' => $volunteer->getBackgroundTime(),
				'backgroundPass' => $volunteer->getBackgroundPass(),
				'screenBy' => $volunteer->getScreenBy(),
				'screenTime' => $volunteer->getScreenTime(),
				'reviewBy' => $volunteer->getReviewBy(),
				'reviewTime' => $volunteer->getReviewTime(),
				'entryBy' => $volunteer->getEntryBy(),
				'entryTime' => $volunteer->getEntryTime(),
				'comment' => $volunteer->getComment(),
				'available' => $volunteer->getAvailable(),
			]);
		}

		return Response::ok($template);
	}

	public function post() {
		try {
			if (!$this->security->checkToken()) {
				throw new Exception('Something went wrong. Please try again.');
			}

			$volunteer = new Volunteer();

			if ($this->request->hasPost('nameFirst')) {
				$volunteer->setNameFirst($this->request->getPost('nameFirst', 'string'));
			}
			if ($this->request->hasPost('nameLast')) {
				$volunteer->setNameLast($this->request->getPost('nameLast', 'string'));
			}
			if ($this->request->hasPost('nameMiddle')) {
				$volunteer->setNameMiddle($this->request->getPost('nameMiddle', 'string'));
			}
			if ($this->request->hasPost('address')) {
				$volunteer->setAddress($this->request->getPost('address', 'string'));
			}
			if ($this->request->hasPost('city')) {
				$volunteer->setCity($this->request->getPost('city', 'string'));
			}
			if ($this->request->hasPost('state')) {
				$volunteer->setState($this->request->getPost('state', 'string'));
			}
			if ($this->request->hasPost('zip')) {
				$volunteer->setZip($this->request->getPost('zip', 'string'));
			}
			if ($this->request->hasPost('phoneDay')) {
				$volunteer->setPhoneDay($this->request->getPost('phoneDay', 'phone'));
			}
			if ($this->request->hasPost('phoneEve')) {
				$volunteer->setPhoneEve($this->request->getPost('phoneEve', 'phone'));
			}
			if ($this->request->hasPost('phoneCell')) {
				$volunteer->setPhoneCell($this->request->getPost('phoneCell', 'phone'));
			}
			if ($this->request->hasPost('email')) {
				$volunteer->setEmail($this->request->getPost('email', 'email'));
			}
			$volunteer->setMinor($this->request->getPost('minor', 'int'));
			if ($this->request->hasPost('dob')) {
				$volunteer->setDOB($this->request->getPost('dob', 'date'));
			}
			if ($this->request->hasPost('guardianName')) {
				$volunteer->setGuardianName($this->request->getPost('guardianName', 'string'));
			}
			if ($this->request->hasPost('idType')) {
				$volunteer->setIdType($this->request->getPost('idType', 'string'));
			}
			if ($this->request->hasPost('idNumber')) {
				$volunteer->setIdNumber($this->request->getPost('idNumber', 'string'));
			}
			if ($this->request->hasPost('idState')) {
				$volunteer->setIdState($this->request->getPost('idState', 'string'));
			}
			if ($this->request->hasPost('agency')) {
				$volunteer->setAgency($this->request->getPost('agency', 'string'));
			}
			if ($this->request->hasPost('training')) {
				$volunteer->setTraining($this->request->getPost('training', 'string'));
			}
			if ($this->request->hasPost('emergencyContactName')) {
				$volunteer->setEmergencyContactName($this->request->getPost('emergencyContactName', 'string'));
			}
			if ($this->request->hasPost('emergencyContactPhone')) {
				$volunteer->setEmergencyContactPhone($this->request->getPost('emergencyContactPhone', 'string'));
			}
			if ($this->request->hasPost('intakeBy')) {
				$volunteer->setIntakeBy($this->request->getPost('intakeBy', 'string'));
			}
			if ($this->request->hasPost('intakeTime')) {
				$volunteer->setIntakeTime($this->request->getPost('intakeTime', 'date'));
			}
			if ($this->request->hasPost('backgroundBy')) {
				$volunteer->setBackgroundBy($this->request->getPost('backgroundBy', 'string'));
			}
			if ($this->request->hasPost('backgroundTime')) {
				$volunteer->setBackgroundTime($this->request->getPost('backgroundTime', 'date'));
			}
			$volunteer->setBackgroundPass($this->request->getPost('backgroundPass', 'int'));
			if ($this->request->hasPost('screenBy')) {
				$volunteer->setScreenBy($this->request->getPost('screenBy', 'string'));
			}
			if ($this->request->hasPost('screenTime')) {
				$volunteer->setScreenTime($this->request->getPost('screenTime', 'date'));
			}
			if ($this->request->hasPost('reviewBy')) {
				$volunteer->setReviewBy($this->request->getPost('reviewBy', 'string'));
			}
			if ($this->request->hasPost('reviewTime')) {
				$volunteer->setReviewTime($this->request->getPost('reviewTime', 'date'));
			}
			if ($this->request->hasPost('entryBy')) {
				$volunteer->setEntryBy($this->request->getPost('entryBy', 'string'));
			}
			if ($this->request->hasPost('comment')) {
				$volunteer->setComment($this->request->getPost('comment', 'string'));
			}
			$volunteer->setAvailable($this->request->getPost('available', 'int'));
			/** @var \Phalcon\Http\Request\File $file */
			foreach ($this->request->getUploadedFiles() as $file) {
				if (!$file->isUploadedFile() || $file->getKey() != 'image') {
					continue;
				}
				$volunteer->uploadImage($file);
			}
			$volunteer->save();

			$this->flash->success('Volunteer successfully saved!');
			return Response::temporaryRedirect(['for' => 'volunteer-list']);
		} catch (Exception $e) {
			$this->saveValues();
			$this->flash->error($e->getMessage());
			return Response::temporaryRedirect(['for' => 'volunteer-create']);
		}
	}
}
