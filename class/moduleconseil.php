
<?php 
    
    /**
    * module conseil
    */
    class ConseilCtrl {


      public $all;
      public $connex;
      
      function __construct()
      {
       $this->connex = DataBaseCtrl::isThere(); 
      $modConseil = $this->connex->prepare ("SELECT * FROM conseil ORDER BY date_time_publication DESC;"); //dans ma modal je charge les élèment de la DB articles et le les classe par ordre décroissant de publication

      $modConseil->execute(); //execute ce qui suit
      $result = $modConseil->fetchAll(PDO::FETCH_ASSOC); // PDO = objet... FETCH_assoc a demandé 
      $this->all = $result;
      }


      function getConseilPresentation (){

        $tab_result = $this->connex->prepare ('SELECT * FROM categorie_conseil ORDER BY id ASC');
        $tab_menu = '';
        $tab_content = '';
        global $tab_menu, $tab_content;
        $i = 0;
        $tab_result->execute(array());

        while($row = $tab_result->fetch()){
         if($i == 0){

          $tab_menu .= '
           <li class="active"><a href="#'.$row["id"].'" data-toggle="tab">'.$row["nom"].'</a></li>
          ';
          $tab_content .= '
           <div id="'.$row["id"].'" class="tab-pane fade in active">
          ';
         }
         else{

          $tab_menu .= '
           <li><a href="#'.$row["id"].'" data-toggle="tab">'.$row["nom"].'</a></li>
          ';
          $tab_content .= '
           <div id="'.$row["id"].'" class="tab-pane fade">
          ';
         }

         $conseil_result = $this->connex->prepare ("SELECT * FROM conseil WHERE categorie_id = '".$row["id"]."'");
         $conseil_result->execute(array());

         while($sub_row = $conseil_result->fetch()){

          $tab_content .= '
           <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <img class="img-responsive" src="'.$sub_row["image"].'">
                <div class="caption">
                  <h3>'.$sub_row["titre"].'</h3>
                  <p>'.$sub_row["description"].'</p>
                  <p><a href="blogarticle.php?id_conseil='.$sub_row["id"].'" class="btn btn-primary" target="_blank" role="button">Lire</a></p>
                </div>
              </div>
            </div>
          ';
         }

         $tab_content .= '<div style="clear:both"></div></div>';
         $i++;
        }
      }  
    }
?>