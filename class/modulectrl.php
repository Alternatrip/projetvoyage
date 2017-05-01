<?php 

	include("util/databasectrl.php");


	class ModuleCtrl {

		public $all;
		public $current;

		public $connex;

		function __construct()
		{
			$this->connex = DataBaseCtrl::isThere(); 
			$module = $this->connex->prepare ("SELECT * FROM modules;");

			$module->execute();
			$result = $module->fetchAll(PDO::FETCH_ASSOC);
			$this->all = $result;
		}

		function getText(){
			return json_encode($this->all);
		}


		function getHtmlString() {
			
			foreach($this->all as $a){
				?>
				 <div class="col-lg-3">
		          <img class="img-circle" src="<?php echo $a['image'];?>" alt="Generic placeholder image" width="140" height="140">
		          <h2><?php echo $a['titre'];?></h2>
		          <p class="description"><?php echo $a['description'];?></p>
		          <p><?php echo $a['bouton'];?></p>
		        </div>
        <?php
			}
		}


		function getNews(){

			$showNews = $this->connex->prepare ('SELECT * FROM news ORDER BY id DESC LIMIT 0, 3');

			while ($donnees = $showNews->fetch()){
			?>

			<div class="news container">
			<div class="row">
			    <h3>
				    <?php echo $donnees['titre']; ?>
				    <em>le <?php echo date('d/m/Y à H\hi', $donnees['timestamp']); ?></em>
			    </h3>
			    <p>
				    <?php
				    // On enlève les éventuels antislashs, PUIS on crée les entrées en HTML (<br />).
				    $contenu = nl2br(stripslashes($donnees['contenu']));
				    echo $contenu;
			    	?>
			    </p>
			    </div>
			</div>
			<?php
			} // Fin de la boucle des <italique>news</italique>.
		}




	}



 ?>