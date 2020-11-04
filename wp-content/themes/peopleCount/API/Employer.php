<?

class Employer{

	private  $name;
	private $employer_id;
	private $company_name;
	private $state;
	private $zip_code;
	private $city;
	private $jobs_posted;
	// array for each listing
	private $listings;
	private $email;
	private $slogan;
	private $website;
	private $applications;

	public function getName(){
		return $this->name;
	}
	public function setName($named){
		$this->name = $named;
	}
	public function getEmployerId(){
		return $this->employer_id;
	}

	public function setEmployerId($employer_id){
		$this->employer_id = $employer_id;
	}

	public function getCompanyName(){
		return $this->company_name;
	}

	public function setCompanyName($company_name){
		$this->company_name = $company_name;
	}

	public function getState(){
		return $this->state;
	}

	public function setState($state){
		$this->state = $state;
	}

	public function getZipCode(){
		return $this->zip_code;
	}

	public function setZipCode($zip_code){
		$this->zip_code = $zip_code;
	}

	public function getcity(){
		return $this->city;
	}

	public function setcity($city){
		$this->city = $city;
	}

	public function getJobsPosted(){
		return $this->jobs_posted;
	}

	public function setJobsPosted($jobs_posted){
		$this->jobs_posted = $jobs_posted;
	}

	public function getlistings(){
		return $this->listings;
	}

	public function setlistings(array $listings){
		$this->listings = $listings;
	}

	public function getemail(){
		return $this->email;
	}

	public function setemail($email){
		$this->email = $email;
	}

	public function getslogan(){
		return $this->slogan;
	}

	public function setslogan($slogan){
		$this->slogan = $slogan;
	}

	public function getwebsite(){
		return $this->website;
	}

	public function setwebsite($slogan){
		$this->website = $website;
	}

	public function getApplications(){
	return $this->applications;
}
public function setApplications(array $applications){
	$this->applications = $applications;
}



}


?>