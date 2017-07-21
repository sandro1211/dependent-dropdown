<?php
include('dbConfig.php');

if(isset($_POST["id"]) && !empty($_POST["id"])){
    $query = $db->query("SELECT * FROM cc_desks WHERE id_callcenter = ".$_POST['id']." ORDER BY desk_name ASC");
    
    $rowCount = $query->num_rows;
    
 
    if($rowCount > 0){
        echo '<option value="">Desk</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['desk_name'].'</option>';
        }
    }else{
        echo '<option value="">Desk not available</option>';
    }
}

if(isset($_POST["deskid"]) && !empty($_POST["deskid"])){
    $query = $db->query("SELECT * FROM cc_teams WHERE id_desk = ".$_POST['deskid']." ORDER BY team_name ASC");
    
    $rowCount = $query->num_rows;

    if($rowCount > 0){
        echo '<option value="">Team</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['team_name'].'</option>';
        }
    }else{
        echo '<option value="">Team not available</option>';
    }
}

    if(isset($_POST["teamid"]) && !empty($_POST["teamid"])){
    $query = $db->query("SELECT * FROM cc_users WHERE team_id = ".$_POST['teamid']." ORDER BY stage_name ASC");
    
    $rowCount = $query->num_rows;

    if($rowCount > 0){
        echo '<option value="">Sales</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['user_id'].'">'.$row['stage_name'].'</option>';
        }
    }else{
        echo '<option value="">Sales not available</option>';
    }

}
?>