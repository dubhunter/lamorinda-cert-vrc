<?php

/**
 * @method Agency getAgency (array $parameters = array()) {}
 * @method Jurisdiction getJurisdiction (array $parameters = array()) {}
 */
class Request extends Model {

	protected $id;
	protected $agency_id;
	protected $street;
	protected $jurisdiction_id;
	protected $contact;
	protected $phone_work;
	protected $fax;
	protected $phone_cell;
	protected $email;
	protected $radio;
	protected $comment;
	protected $open;

	/**
	 * @param array $parameters
	 * @return self[]
	 */
	public static function find($parameters = array()) {
		if (!isset($parameters['order'])) {
			$parameters['order'] = 'open';
		}
		return parent::find($parameters);
	}

	/**
	 * Set the source table and relationships
	 */
	public function initialize() {
		$this->setSource('requests');
		$this->hasOne('agency_id', 'Agency', 'id');
		$this->hasOne('jurisdiction_id', 'Jurisdiction', 'id');
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getAgencyId() {
		return $this->agency_id;
	}

	/**
	 * @param mixed $agency_id
	 */
	public function setAgencyId($agency_id) {
		$this->agency_id = $agency_id;
	}

	/**
	 * @return mixed
	 */
	public function getStreet() {
		return $this->street;
	}

	/**
	 * @param mixed $street
	 */
	public function setStreet($street) {
		$this->street = $street;
	}

	/**
	 * @return mixed
	 */
	public function getJurisdictionId() {
		return $this->jurisdiction_id;
	}

	/**
	 * @param mixed $jurisdiction_id
	 */
	public function setJurisdictionId($jurisdiction_id) {
		$this->jurisdiction_id = $jurisdiction_id;
	}

	/**
	 * @return mixed
	 */
	public function getContact() {
		return $this->contact;
	}

	/**
	 * @param mixed $contact
	 */
	public function setContact($contact) {
		$this->contact = $contact;
	}

	/**
	 * @return mixed
	 */
	public function getPhoneWork() {
		return $this->phone_work;
	}

	/**
	 * @param mixed $phone_work
	 */
	public function setPhoneWork($phone_work) {
		$this->phone_work = $phone_work;
	}

	/**
	 * @return mixed
	 */
	public function getFax() {
		return $this->fax;
	}

	/**
	 * @param mixed $fax
	 */
	public function setFax($fax) {
		$this->fax = $fax;
	}

	/**
	 * @return mixed
	 */
	public function getPhoneCell() {
		return $this->phone_cell;
	}

	/**
	 * @param mixed $phone_cell
	 */
	public function setPhoneCell($phone_cell) {
		$this->phone_cell = $phone_cell;
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getRadio() {
		return $this->radio;
	}

	/**
	 * @param mixed $radio
	 */
	public function setRadio($radio) {
		$this->radio = $radio;
	}

	/**
	 * @return mixed
	 */
	public function getComment() {
		return $this->comment;
	}

	/**
	 * @param mixed $comment
	 */
	public function setComment($comment) {
		$this->comment = $comment;
	}

	/**
	 * @return mixed
	 */
	public function getOpen() {
		return $this->open == 1;
	}

	/**
	 * @param mixed $open
	 */
	public function setOpen($open) {
		$this->open = $open ? 1 : 0;
	}
}