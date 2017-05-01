


<div class="modal fade bs-example-modal-lg" id="menuArticleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel">Voici la liste des articles rédigés dans mon carnet.</h3>
      </div>
      <div class="modal-body page">
        <div class="container contModalArticle">
          <div class="row">
            <div class="panel-body col-md-12">
                <div class="pull-left">
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-lg btn-filter" data-target="all" id="dropdownMenu1" aria-haspopup="true" aria-expanded="true">Tous les pays
                    </button>
                    <button type="button" class="btn btn-info dropdown-toggle btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a type="button" class="btn btn-info btn-filter" data-target="Thailande">Thailande</a></li>
                      <li><a type="button" class="btn btn-info btn-filter" data-target="Laos">Laos</a></li>
                      <li><a type="button" class="btn btn-info btn-filter" data-target="Cambodge">Cambodge</a></li>
                      <li><a type="button" class="btn btn-info btn-filter" data-target="Malaisie">Malaisie</a></li>
                      <li><a type="button" class="btn btn-info btn-filter" data-target="Vietnam">Vietnam</a></li>
                      <li><a type="button" class="btn btn-info btn-filter" data-target="Philippines">Philippines</a></li>
                      <li><a type="button" class="btn btn-info btn-filter" data-target="Angleterre">Angleterre</a></li>
                      <li><a type="button" class="btn btn-warning btn-filter" disabled="disabled" data-target="Inde">Inde</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a type="button" class="btn btn-warning btn-filter" disabled="disabled" data-target="Népal">Népal</a></li>
                    </ul>
                  </div>
                </div>

                <?php 
                 foreach($b->getAll() as $t){?>
                   <table class="table table-filter ombre">
                    <tbody>
                      <tr data-status='<?php echo $t['pays'];?>'>
                        <td>
                            <i class="glyphicon glyphicon-star"></i>
                        </td>
                        <td>
                          <div class="media post_it">
                              <img src="<?php echo $t['image_mini'];?>" class="media-photo pull-left">
                            <div class="media-body bodyTitre pull-right">
                              <span class="media-meta"><?php echo $t['date_time_publication'];?></span>
                              <h4 class="title">
                              <a href="blogarticle.php?id=<?php echo $t['id'];?>" target="_blank">
                                <?php echo $t['titre'];?>
                                </a>
                                <div class="pull-right pagado villeTitre"><?php echo $t['ville'];?></div>
                              </h4>
                              <p class="summary"><?php echo $t['description'];?></p>
                              <?php echo strtoupper($t['pays']);?>
                            </div>
                          </div>
                        </td>
                        </tr>
                    </tbody>
                  </table><?php
                 }

                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>


<script>
  $(document).ready(function () {
    $('.btn-filter').on('click', function () {
      var $target = $(this).data('target');
      if ($target != 'all') {
        $('.table tr').css('display', 'none');
          $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
      } else {
        $('.table tr').css('display', 'none').fadeIn('slow');
      }
    });
  });
</script>