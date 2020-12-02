<?
include_once get_template_directory(). '/db-templates/dbConnection.php';
include_once get_template_directory(). '/API/userWorkflow.php';

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
  private $mysqli;
  //needs to be of type userWorkflow



  function __construct(){
    $Placed = false;
    $Active = false;
    $Inactive = false;
    $Terminated = false;
    $this->mysqli = new mysqli("localhost", "finalpeo_wp763", "Sp)s7o5J1.", "finalpeo_wp763");
  }

  function new_applicant(userWorkflow $user){
    //adds user to applied table.
      $user_info = $user->getUser(); // returns WP_User obj
      $user->setStatus(1);

     connectdb($this->mysqli);
     $stmt = $this->mysqli->prepare( "
        INSERT INTO wp4s_applied_associates 
        ( user_ID, userName, date_applied )
        VALUES ( ?, ?, ? )
      ");
     $stmt->bind_param("iss", $user_info->id, $user_info->user_login, date('Y-m-d'));
     if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
  }
  $stmt->close();
  }

  function activate(userWorkflow $user){
    $user_info = $user->getUser();
    $username = $user_info->user_login; 
      // get the current status of the user 
      // to determine which table the user 
      // will need to be removed from
      $wf_status = $wpdb->get_col( $wpdb->prepare( 
    "
        SELECT      workflow_status
        FROM        $wpdb->status
        WHERE       userName = %s 
    ",
    $user_info->user_login
  ) ); 
    //moves user to active table
    $user->setStatus( 2 );
    $user_info = $user->getUser();
    insertStatus( $user );
  }

  /**
   * [insertStatus initially binds a user with a status in database]
   * @param  [WP_User] $user_info [WP_User object]
   * @param  [int] $status    [current status of the user]
   * @return [mixed] $insert  [return value from SQL
   * statement. Returns false on error, rows affected on success]
   */
  function insertStatus( userWorkflow $user ){
    $user_info =$user->getUser();
    $username = $user_info->user_login;
    $stmt = $this->mysqli->prepare( "
        INSERT INTO wp4s_status 
        ( userName, workflow_status, status_date )
        VALUES ( ?, ?, ?, ?)
      ");
    $stmt->bind_param("sis", $user_info->user_login, $user->getStatus() , date('Y-m-d'));
    if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    $stmt->close();
 }

 
/**
 * [updateStatus updates the workflow status of a user.]
 * @param  [WP_User] $user_info [WP_User Object]
 * @param  [int] $status    [current status of the user]
 * @return [void]            
 */
  function updateStatus( $user_info, $status ){
    $wpdb->update('wp4s_status', array(
      'userName' => $username,
      'workflow_status' => $status // ... and so on
      ));
  }


/**
 * [getDBTable get the database name that is associated with
 * user's current status]
 * @param  [int] $status [user's current status]
 * @return [String]         [the database name associated 
 * with users of a particular status]
 */
  function getDBTable( $status ){
    switch( $status ){
      case 1:
        return "wp4s_applied_associates";
      case 2:
        return "wp4s_active_associates";
      case 3:
        return "wp4s_inactive_associates";
      case 4:
        return "wp4s_placed_associates";
      case 5:
        return "wp4s_terminated_associates";
    }
  }

/**
 * [getStatus get the database name that is associated with
 * user's current status]
 * @param  [int] $status [user's current status]
 * @return [String]         [the status name associated 
 * with users of a particular status]
 */

  function getStatus( $status ){
    switch( $status ){
      case 1:
        return "Applied";
      case 2:
        return "Active";
      case 3:
        return "Inactive";
      case 4:
        return "Placed";
      case 5:
        return "Terminated";
    }
  }


  
  /*function terminate($user){
      //moves user to the terminate table.
      
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
 }









?>