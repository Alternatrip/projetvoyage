<?php
if(isset($_POST['pseudo']) && isset($_POST['motdepasse']) && isset($_POST['email'])){
include('class/usersCtrl.php');

if($_POST['motdepasse'] === $_POST['password_confirmation']) {
$u = new usersCtrl();
$u->create($_POST);
//echo "<script>document.location.href='index.php'</script>;";
}

}else{
?>
<div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">enregistrer un utilisateur <small>It's free!</small></h3>
            </div>
            <div class="panel-body">
              <form role="form" method="POST" action="#">
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="pseudo" id="pseudo" class="form-control input-sm" placeholder="First Name">
                    </div>
                  </div>

                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                </div>

                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="password" name="motdepasse" id="motdepasse" class="form-control input-sm" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                    </div>
                  </div>
                </div>
                
                <input type="submit" value="Register" class="btn btn-info btn-block">
              
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php

  }
  ?>