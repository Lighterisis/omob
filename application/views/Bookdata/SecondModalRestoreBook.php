<!--SecondModal -->
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
			<!-- Modal header-->
			<div class="modal-header"> 
				<div class="row">
					<div class="text-center col-lg-8 col-md-8 col-sm-6 col-xs-6">
						<h style="font-size:30px;"><b>คืนหนังสือ</b></h>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
						<button class="btn btn-primary btn-block active" type="button">
						USERNAME...</button>
					</div> 
 				</div>				
			</div> 
			<!-- Modal header-->
			<!-- Modal footer--> 
			<div class="modal-footer"> 				
				<!-- left-block-->
				<div class="left-block col-lg-6 col-md-6 col-sm-4 col-xs-12">
					<div class="form-group">
						<div class="media" id="images">
							<?foreach ($bookborrow as $b){?>
								<img src="<?=base_url()."img/".$b->img;?>" name="pic" id="pic" class="img-thumbnail media-object img-fluid" 
								style="width:404px; height:290px; display:none;">	
							<?}?>					
						</div>
					</div>
				</div>
				<!-- left-block-->
				<!-- right-block-->
				<div class="modal-right-block col-lg-6">
					<!-- Selected -->
					<div class="form-group">
						<select multiple class="form-control btn-default" size="6" id="SelectBox">
							<?foreach ($bookborrow as $book){?>
								<option><?echo $book->na;?></option>
							<?}?>
						</select>							
					</div>
					<!-- Selected -->
					<!-- Comment box-->
					<div class="form-group">								      
						<textarea class="form-control" rows="6" id="comment" placeholder="บทนำหรือข้อความแนะนำหนังสือ"></textarea>
					</div>
					<!-- Comment box-->   
				</div>
				<!-- right-block -->
				<button type="button" class="btn btn-primary">OK</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			<!--Modal footer-->					    
		</div>
	</div>
<!-- SecondModal-->