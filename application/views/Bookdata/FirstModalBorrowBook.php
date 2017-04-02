<!--FirstModal -->
<script type="text/javascript">
	var showOnlyOptionsSimilarToText = function (selectionEl, str, isCaseSensitive) {
    if (typeof isCaseSensitive == 'undefined')
        isCaseSensitive = true;
    if (isCaseSensitive)
        str = str.toLowerCase();

    var $el = $(selectionEl);

    $el.children("option:selected").removeAttr('selected');
    $el.val('');
    $el.children("option").hide();

    $el.children("option").filter(function () {
        var text = $(this).text();
        if (isCaseSensitive)
            text = text.toLowerCase();

        if (text.indexOf(str) > -1)
            return true;

        return false;
    }).show();

};
$(document).ready(function () {
	var timeout;
	$("#SearchBox").on("keyup", function () {
		var userInput = $("#SearchBox").val();
		window.clearTimeout(timeout);
		timeout = window.setTimeout(function() {
			showOnlyOptionsSimilarToText($("#SelectBox"), userInput, true);
		}, 500);

	});
});
</script>
<script>
	var lastShown;
	$('#SelectBox').on('click','option', function(){
	  var index = $(this).index();
	    if(lastShown)
	        lastShown.hide();
	    lastShown = $('#images img:eq('+index+')')
	    lastShown.show();
	});
</script>
	<div class="modal-dialog modal-lg">  					      
		<div class="modal-content">
			<!-- Modal header -->
			<div class="modal-header"> 
				<div class="row">
					<div class="text-center col-lg-8 col-md-8 col-sm-6 col-xs-6">
						<h style="font-size:30px;"><b>ยืมหนังสือ</b></h>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
						<button class="btn btn-primary btn-block active" type="button">
						USERNAME...</button>
					</div>
				</div>
			</div> 
			<!-- Modal header -->

			<!-- Modal footer-->
			<div class="modal-footer">
					<div class="left-block col-lg-6 col-md-6 col-sm-4 col-xs-12"> 	
						<div class="form-group">
							<div class="media" id="images">
								<?foreach ($booklibrary as $b){?>
								<img src="<?=base_url()."img/".$b->img;?>" name="pic" id="pic" class="img-thumbnail media-object img-fluid" 
									style="width:404px; height:290px; display:none;">	
								<?}?>					
							</div>
						</div>
					</div>
					<div class="right-block col-lg-6 col-md-6 col-sm-8 col-xs-12">
						<form class="form-group">
							  <div class="form-group has-danger has-feedback">
							    <input type="text" class="form-control" id="SearchBox" class="search-query form-control" placeholder="Search...">
							    <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
							  </div>
						</form>
						<div class="form-group">
							<select multiple class="form-control btn-default" size="13" id="SelectBox" >
								<?foreach ($booklibrary as $book){?>
									<option><?echo $book->na;?></option>
								<?}?>
							</select>							
						</div>
					</div>	
					
				<button type="button" class="btn btn-primary">OK</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			<!-- Modal footer-->
		</div>
	</div>
<!-- FirstModal-->