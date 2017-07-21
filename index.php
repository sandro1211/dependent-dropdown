<!DOCTYPE html>
<html>
<title>Task</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="jquery.min.js"></script>
    
<style>
.select-boxes{width: 280px;text-align: center;}
select {
    font-size: 14px;
    height: 39px;
    padding: 7px 8px;
    width: 250px;
    outline: none;
    margin: 10px 0 10px 0;
}
select option{
    font-family: Georgia;
    font-size: 14px;
}

.select-boxes{

  margin-left: 40%;
}

.save{

    background-color: green;
}

</style>
    <script type="text/javascript">
$(document).ready(function(){
    $('#call').on('change',function(){
        var callid = $(this).val();
        if(callid){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'id='+callid,
                success:function(html){
                    $('#desk').html(html);
                    $('#team').html('<option value="">Team</option>'); 
                }
            }); 
        }else{
            $('#desk').html('<option value="">Select call center first</option>');
            $('#team').html('<option value="">Select desk first</option>'); 
        }
    });
    
    $('#desk').on('change',function(){
        var deskid = $(this).val();
        if(deskid){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'deskid='+deskid,
                success:function(html){
                    $('#team').html(html);
                    $('#sales').html('<option value="">Sales</option>');
                }
            }); 
        }else{
            $('#team').html('<option value="">Select desk first</option>'); 
            $('#sales').html('<option value="">Select team center first</option>'); 
        }
    });
    $('#team').on('change',function(){
        var teamid = $(this).val();
        if(teamid){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'teamid='+teamid,
                success:function(html){
                    $('#sales').html(html);
                    //$('#sales').html('<option value="">Sales</option>');
                }
            }); 
        }else{
            //$('#team').html('<option value="">Select desk first</option>'); 
            $('#desk').html('<option value="">Select Call center first</option>'); 
        }
    });
});
</script>
      
    
<body class="w3-light-grey">

<div class="w3-content" style="max-width:1600px">

  <div class="w3-row w3-padding w3-border">

    <div class="w3-col l12 s12">
    
      <div class="w3-container w3-white w3-margin w3-padding-large">
      
          <br>
          <div class="select-boxes">
    <?php
    include('dbConfig.php');
    $query = $db->query("SELECT * FROM cc_callcenters ORDER BY name ASC");
    $rowCount = $query->num_rows;
    ?>
    <select name="call" id="call" >
        <option value="">Call Center</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
            }
        }else{
            echo '<option value="">Call Centers not available</option>';
        }
        ?>
    </select>
    <hr>
    <select name="desk" id="desk">
        <option value="">Desk</option>
    </select>
    <hr>
    <select name="team" id="team">
        <option value="">Team</option>
    </select>
<hr>
    <select name="sales" id="sales">
        <option value="">Sales</option>
    </select>
<hr>
    <select name="status" id="status">
        <option value="">Lead Status</option>
        <option value="">New</option>
        <option value="">Old</option>
    </select>
    <hr>

    <button>Close</button> <button class="save">Save</button>
    </div>

          
            
      </div>
      
    </div>

  </div>

</div>

</body>
</html>
















 
