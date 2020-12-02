<?
 class FilterWorkflow{

 	// have database with applicant from the staffing site
 	// map each applicant with the employer whose job they applied for
 	// this template will wrap workflow information into an object for
 	// manipulation
 	//insert applicant id, name, date, 
 	
 	//workflow properties
 	private $Placed;
 	private $Applied;
 	private $Active;
 	private $Inactive;
 	private $Terminated;
 	//needs to be of type userWorkflow
 	private $user;

 	function __construct($userObj){
 		$Placed = false;
 		$Active = false;
 		$Inactive = false;
 		$Terminated = false;
 		$this->user =$userObj;
 	}
 	function new_applicant($user){
 	  //adds user to applied table.
 	  $user->setStatus(1);
 	  $user_info = $user->userProp;
 	  // get login of the current user
 	  $username = $user_info->user_login;
      $wpdb->insert('wp4s_status', array(
    	'userName' => $username,
    	'workflow_status' => $user->getStatus() // ... and so on
      ));
      $wpdb->insert('wp4s_applied_associates', array(
    	'user_ID' => $user_info->id,
    	'first_name' => $userName,
    	'last_name' => $userName,
    	'date_approved' => date("Y-m-d")// ... and so on
      ));
 	}

 	
 	/*function terminate($user){
      //moves user to the terminate table.
      
 	}

 	function activate($user){
 	  //moves user to active table
 	  
 	}
 	function place($user){
 	  //moves user to active table
 	}
 	function deactivate($user){
 	  //moves user to the inactive table
 	}
	*/
 	public function isPlaced(){
 		return $Placed;
 	}
 	public function isActive(){
 		return $Active;
 	}
 	public function isApplied(){
 		return $Applied;
 	}
 	public function isInactive(){
 		return $Inactive;
 	}
 	public function isTerminated(){
 		return $Terminated;
 	}
 	public function isPlaced(){
 		return $Placed;
 	}

 }









?>