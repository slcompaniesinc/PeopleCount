<?php 

//wraps the wp user object to extend 
//workflow capabilities 
class userWorkflow {
	// needs to be of type WP_User
	private $userProp;
	private $status;

    public function __construct($userObj) {
      $this->userProp = $userObj;
      $this->status = 1;
    }

    public function getUser(){
     return $this->userProp;
    }

    public function setUser($userObj){
      $this->userProp = $userObj;
    }

    public function getStatus(){
     return $this->status;
    }

    public function setStatus($statusNum){
      $this->status = $statusNum;
    }

}
?>