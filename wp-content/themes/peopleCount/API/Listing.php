<?php 


class Lisitng {

	private var $employer_id; 
	private var $job_title;  
	private var $job_desc;
	private var $createdAt;
	private var $modifiedAt;
	private var $company_name;
	private var $company_url;
	private var $company_email;
	private var $is_approved; 
	private var $is_active;
	private var $is_filled;
	private var $is_feautured;

 public function getEmployerId(){
 	return $employer_id;
 }

 public function setEmployerId($employer_id){
 	$this->employer_id = $employer_id;
 }

 public function getJobTitle(){
 	return $job_title;
 }

 public function setJobTitle($job_title){
 	$this->job_title = $job_title;
 }

 public function getJobDesc(){
 	return $job_desc;
 }

 public function setJobDesc($job_desc){
 	$this->job_desc = $job_desc;
 }

 public function getCreatedAt(){
 	return $createdAt;
 }

 public function setCreatedAt($createdAt){
 	$this->createdAt = $createdAt;
 }

 public function getmodifiedAt(){
 	return $modifiedAt;
 }

 public function setmodifiedAt($modifiedAt){
 	$this->modifiedAt = $modifiedAt;
 }

 public function getcompany_name(){
 	return $company_name;
 }

 public function setcompany_name($company_name){
 	$this->company_name = $company_name;
 }

 public function getcompany_url(){
 	return $company_url;
 }

 public function setcompany_url($company_url){
 	$this->company_url = $company_url;
 }

 public function getcompany_email(){
 	return $company_email;
 }

 public function setcompany_email($company_email){
 	$this->company_email = $company_email;
 }

 public function getis_approved(){
 	return $is_approved;
 }
 public function setis_approved($is_approved){
 	$this->is_approved = $is_approved;
 }
 public function getis_active(){
 	return $is_active;
 }
 public function setis_active($is_active){
 	$this->is_active = $is_active;
 }
 public function getis_filled(){
 	return $is_filled;
 }
 public function setis_filled($is_filled){
 	$this->is_filled = $is_filled;
 }
 public function getis_featured(){
 	return $is_featured;
 }
 public function setis_featured($is_featured){
 	$this->is_featured = $is_feautured;
 }



}




 ?>