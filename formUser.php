 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
<?php
include("config.php");
$array_res=array();
if (isset($_GET["g"])) {
    $id = $_GET["g"];
    $queryE = "SELECT * FROM balink.users where user_ID='$id';";
 
    $sql = $db->prepare($queryE);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_OBJ);
    foreach ($result as $res) {
        array_push($array_res, $res);
    }
    $type='Edit';
}
else{
    $id='';
    $type='Add';
    for($i=0;$i<5;$i++){
         $array_res[$i]='';
    }
}

?>
<link rel="stylesheet" type="text/css" href="styleSheet.css" />
<h3 id="title_h3"><span id="type" data-id="<?= $id ?>"><?=$type ?></span> User</h3>
<div class="contain">
     <form id="idForm">
<div class="row">
                       
                            <div class="form-group">
                                <!--<div class="div_label">-->
                                  <label class="control-label">First name</label>
                                <!--</div>-->
                                <input type="text" id="first_name" value="<?=$array_res[1] ?>" class="form-control" size="40" name="user_first_name" placeholder="First name
                                
                                " data-parsley-required="" data-parsley-trigger="focusout" data-parsley-error-message="Entrez un nom valide" data-parsley-id="4">
                                <br>
                                <small class="help-block form-text" id="error-firstname">*Enter first name</small>		
                            </div>
                        </div>
                        
                    

                    <div class="row">
                       
                            <div class="form-group">
                                 <!--<div class="div_label">-->
                            <label class="control-label">Last name</label>
                                 <!--</div>-->
                                <input type="text" id="last_name" name="user_last_name" value="<?=$array_res[2] ?>" size="40" class="form-c" placeholder="Last name" 
                                       data-parsley-required="" data-parsley-trigger="focusout" data-parsley-error-message="Entrez un nom" data-parsley-id="4">
                                <small class="help-block form-text" id="error-lastname">*Enter last name</small>
                            </div>
                            </div>
                        <div class="row">
                                    <div class="form-group">
                                         <!--<div class="div_label">-->
                                         <label class="control-label" style="margin-right:35px">Age</label>
                                         <!--</div>-->
                                <select name="user_age" id="age" class="form-control" data-req="yes"   placeholder="Age">
                                    <?php
                                    for ($i=10;$i<=80;$i++ ){
                                        echo "<option value='$i' ";
                                        if($i==$array_res[3])echo "selected";
                                            echo ">$i</option>";
                                    }
                                    ?>
                                </select>			
                            </div>
                                
                    </div>
    <div class="row">
                       
                            <div class="form-group">
                                 <!--<div class="div_label">-->
                                 <label class="control-label" style="margin-right: 23px;">Phone</label>
                                 <!--</div>-->
                                <input type="text" id="phone" name="user_phone" value="<?=$array_res[4] ?>" size="40" class="form-c" placeholder="Phone" 
                                       data-parsley-required="" data-parsley-trigger="focusout" data-parsley-error-message="Entrez le telephone" data-parsley-id="4">
                                <small class="help-block form-text" id="error-tel">*Enter valid phone</small>
                            </div>
                            </div>
    <div class="row">
         <div class="footer">
                    <button type="button" class="btn btn-default record"  style="    background: #ebf2f8;">Save</button>
                    
                    <button type="button" class="btn btn-default back" style="    background: rgb(202, 234, 168);">Back</button>
               <?php
                    if($id!=''){
                        echo '  <button type="button" class="btn btn-default delete_row"  style="">Delete User</button>
                    ';    
                    
                    }
                    ?>
         </div>
    </div>
</div>
<script src="main.js"></script>


