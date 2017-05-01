<div class="modal fade" id="MapModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog .modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Ma carte de route!</h3>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
			<p>
				N'hésitez pas à zoomer, pour suivre mes trajets et cliquer sur mes destinations.
			</p>
				<div id='travellerspoint-map874715'>
					<script src='http://www.travellerspoint.com/badges/badge_membermap.cfm?user=Alternatrip&amp;badgeid=travellerspoint-map874715&amp;height=300&amp;width=auto' async>
					</script>
					<a href='https://secure.travellerspoint.com/member_map.cfm' target="_blank">
						Je veux faire la même carte.
					</a>
					<a class="pull-right" href='https://secure.travellerspoint.com/member_map.cfm?user=Alternatrip' target="_blank">
						Plein écran.
					</a>
				</div>
			</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<script>
    $('#MapModal').on('hidden.bs.modal', function() {
      $(this).removeData('bs.modal');
      $(this).window.location.reload();
    });
  </script>