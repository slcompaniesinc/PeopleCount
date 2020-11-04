<?php 


class Job {

	private  $applications;
	private  $job_id
	private  $employer_id; 
	private  $job_title;  
	private  $job_desc;
	private  $createdAt;
	private  $modifiedAt;
	private  $company_name;
	private  $company_url;
	private  $company_email;
	private  $is_approved; 
	private  $is_active;
	private  $is_filled;
	private  $is_feautured;


public function getApplications(){
	return $this->applications;
}
public function setApplications($applications){
	$this->applications = $applications;
}

public function getJobId(){
	return $this->job_id;
}
public function setJobId($job_id)){
	$this->job_id = $job_id;
}
 public function getEmployerId(){
 	return $this->employer_id;
 }

 public function setEmployerId($employer_id){
 	$this->employer_id = $employer_id;
 }

 public function getJobTitle(){
 	return $this->job_title;
 }

 public function setJobTitle($job_title){
 	$this->job_title = $job_title;
 }

 public function getJobDesc(){
 	return $this->job_desc;
 }

 public function setJobDesc($job_desc){
 	$this->job_desc = $job_desc;
 }

 public function getCreatedAt(){
 	return $this->createdAt;
 }

 public function setCreatedAt($createdAt){
 	$this->createdAt = $createdAt;
 }

 public function getmodifiedAt(){
 	return $this->modifiedAt;
 }

 public function setmodifiedAt($modifiedAt){
 	$this->modifiedAt = $modifiedAt;
 }

 public function getcompany_name(){
 	return $this->company_name;
 }

 public function setcompany_name($company_name){
 	$this->company_name = $company_name;
 }

 public function getcompany_url(){
 	return $this->company_url;
 }

 public function setcompany_url($company_url){
 	$this->company_url = $company_url;
 }

 public function getcompany_email(){
 	return $this->company_email;
 }

 public function setcompany_email($company_email){
 	$this->company_email = $company_email;
 }

 public function getis_approved(){
 	return $this->is_approved;
 }
 public function setis_approved($is_approved){
 	$this->is_approved = $is_approved;
 }
 public function getis_active(){
 	return $this->is_active;
 }
 public function setis_active($is_active){
 	$this->is_active = $is_active;
 }
 public function getis_filled(){
 	return $this->is_filled;
 }
 public function setis_filled($is_filled){
 	$this->is_filled = $is_filled;
 }
 public function getis_featured(){
 	return $this->is_featured;
 }
 public function setis_featured($is_featured){
 	$this->is_featured = $is_feautured;
 }



}




 ?>