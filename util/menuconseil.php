<!-- Nav tabs -->

<?php 

  include("class/moduleconseil.php");

  $c = new ConseilCtrl();

?>


<ul class="nav nav-tabs" id="tabConseil" role="tablist">
  <?php $c->getConseilPresentation();
  echo $tab_menu;
  ?>
</ul>

<!-- Tab panes -->
<div class="tab-content">
       <?php
       echo $tab_content;
       ?>
</div>