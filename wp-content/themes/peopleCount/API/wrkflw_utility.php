<?php 
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


?>