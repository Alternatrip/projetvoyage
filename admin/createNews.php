<?php

if (!empty($_POST['titre']) && !empty($_POST['contenu'])) {


  include('class/newsCtrl.php');

  $save = new newsCtrl();
  $save->save($_POST);

  echo "<script>document.location.href='admin/index.php';</scrip>";

}else{

?>


<div class="container">
	<div class="row">
		<form role="form" id="contact-form" class="contact-form" action="#" method="POST">
                    <div class="row">
                		<div class="col-md-6">
                  		<div class="form-group">
                            <input type="text" class="form-control" name="titre" autocomplete="off" id="titre" placeholder="titre">
                  		</div>
                  	</div>
                  	</div>
                  	<div class="row">
                  		<div class="col-md-12">
                  		<div class="form-group">
                            <textarea class="form-control textarea" rows="3" name="contenu" id="contenu" placeholder="Message"></textarea>
                  		</div>
                  	</div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                  <button type="submit" class="btn main-btn pull-left">Send a message</button>
                  </div>
                  </div>
                </form>
	</div>
</div>

<?php 

} 


?>