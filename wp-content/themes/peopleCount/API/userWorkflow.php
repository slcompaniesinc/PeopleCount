<?php 

//wraps the wp user object to extend 
//workflow capabilities 
class userWorkflow {
	// needs to be of type WP_User
	private $userProp;
	private $status;  
    public function __construct($username) {
       $user_id = 0;
      $mysqli = new mysqli( 'localhost', 'finalpeo_wp763' , 'Sp)s7o5J1.' , 'finalpeo_wp763' );
      $result = $mysqli->query("SELECT * FROM wp4s_status WHERE userName = '$username'");
      while( $row = $result->fetch_assoc() ){
        $this->status = $row['workflow_status'];
        $user_id = $row['user_ID'];
      }
      $this->userProp = get_userdata( $user_id );
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