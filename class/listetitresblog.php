<?php 

	class ArticleCtrl { //je crée la classe titrearticlectrl


		public $all;

		public $connex;
		public $table;

		public $c_id;

		function __construct($table) //je crée une fonction constructeur Les classes qui possèdent une méthode constructeur appellent cette méthode à chaque création d'une nouvelle instance de l'objet
		{
			$this->connex = DataBaseCtrl::isThere(); 
			$this->table = $table;
			$modalarticle = $this->connex->prepare ("SELECT * FROM ".$table." ORDER BY date_time_publication DESC;"); //dans ma modal je charge les élèment de la DB articles et le les classe par ordre décroissant de publication

			$modalarticle->execute(); //execute ce qui suit
			$result = $modalarticle->fetchAll(PDO::FETCH_ASSOC); // PDO = objet... FETCH_assoc a demandé 
			$this->all = $result;
		}

		function getText(){
			return json_encode($this->all); //json_encode est qqch d'obscur... j'ai supprimé, rien ne change ca marche... maaa fois
		}

		function getAll() { //ca j'ai bien compris !!! content !!

 				return $this->all;
			
    		}


    	/*function getById($id) {

    		if (isset(intval($_GET['id']))) {




    	}*/
function get($id){
	//Preparing request
$blog = $this->connex->prepare("SELECT id, titre, image, contenu, DATE_FORMAT(date_time_publication, \"%d/%m/%Y à %Hh%imin%ss\") AS date_time_publication_fr FROM ".$this->table." WHERE id = ?");
//Trying, to ensure no error happened
try{
	//Executing the request with the $id parameter
	$blog->execute(array($id));
	//getting the elements from the request
	$article = $blog->fetch();
	// IF ERROR HAPPENED 
} catch(Exception $e){
?>
<!-- PRINTING IN ALERT THE ERROR -->
<script type="text/javascript">alert(<?php var_dump($e);?>);</script>;
<?php
//Exiting the script, obviously :)
//TODO: redirection
die();
}

return $article;

}


		

		function getComments($id){
$tablename = "commentaires";
$tablename .= ($this->table === "conseil") ?"_conseil" : "";
			$com = $this->connex->prepare ("SELECT auteur, contenu, DATE_FORMAT(date_time_publication, \"%d/%m/%Y à %Hh%imin%ss\") AS date_time_publication_fr FROM ".$tablename." WHERE id_billet = ? ORDER BY date_time_publication DESC");

				try{
				$com->execute(array($id));

				while ($comment = $com->fetch()) {

			?>

						<div class="media">
                    <a class="pull-left" href="#">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo htmlspecialchars($comment['auteur']); ?>
                            <small><?php echo $comment['date_time_publication_fr']; ?></small>
                        </h4>
                        <?php echo nl2br(htmlspecialchars($comment['contenu'])); ?>
                   </div>
               </div>

			<?php
						
		}


}catch(Exception $e){
	echo "erreur";
}

			
	}


		function sendComments($id, $data){
			$tablename = "commentaires";
$tablename .= ($this->table === "conseil") ?"_conseil" : "";

			$send = $this->connex->prepare ("INSERT INTO ".$tablename." (id_billet, auteur, contenu, date_time_publication) VALUES ( ? , ? , ? , NOW())");

			if (isset($data['billet']) AND isset($data['auteur']) AND isset($data['contenu'])) {
				
				$send->execute(array($data['billet'], $data['auteur'], $data['contenu']));

			} else if (empty($id) AND empty($data['auteur']) AND empty($data['contenu'])) {
				echo "vous ne pouvez pas poster de commentaire";

			} else if (isset($id) AND empty($data['auteur']) AND empty($data['contenu'])) {
				echo "n'hésitez pas a poster un commentaire";
			}

		}	

	}

 ?>