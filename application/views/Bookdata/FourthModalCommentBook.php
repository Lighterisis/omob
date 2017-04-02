<!-- FourthModal -->
<script type="text/javascript">
	$(function(){
		$('form#comment').on('submit',function(){
			var url= "<?=$this->router->class.'/FourthModalCommentBook'?>"; 
	        var dataSet = {cm : $("#message").val(), id : $("#bid").attr("value")};
	        $.post(url,dataSet,function(data){
	        	$('#modal').append(data).fadeIn('slow')
	        });
			return false;
		});
	});
</script>
	<div class="modal-dialog modal-lg">  					      
		<div class="modal-content">
			<!-- Modal header-->
			<div class="modal-header">
		        <div class="text-center col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<h style="font-size:30px;"><b>แสดงความคิดเห็น</b></h>
				</div>
				
			</div> 
			<!-- Modal header-->
			<!-- Modal footer--> 
			<form method="post" enctype="multipart/form-data" id="comment">
				<div class="modal-footer"> 				
					<!-- left-block-->
					<div class="left-block col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
							<div class="media">
								<?foreach($showbook as $b){?>
									<div class="form-group hidden">
										<input type="text" name="bid" id="bid" value="<?echo $b->id;?>">
									</div>
									<img src="<?=base_url()."img/".$b->img;?>" name="img" id="pic" 
									class="img-thumbnail media-object img-fluid" style="width:404px; height:290px;">								
								<?}?>
							</div>
						</div>
					</div>	
					<!-- left-block-->
					<!-- right-block-->
					
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<!-- Comment-->
									<div class="row">
										<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div id="commentPanel" style="max-height: 317px; overflow-y: auto" class="panel-group">
												<?foreach($bookc as $c){?>
													<div class="panel panel-info">
											            <div class="panel-heading">
											                <h class="pull-left"><strong><?=$c->usn;?> </strong><small><?=$c->cmd;?></small></h>
											                <button class="btn btn-info btn-circle-micro tooltip-test" type="button" title="edit comment">
																<i class="glyphicon btn-glyphicon glyphicon-pencil img-circle text-info"></i>
															</button>
											            </div>
											            <div class="panel-body text-left" style="word-wrap: break-word;">
											                <p><?=$c->cm;?></p>
											            </div>
											        </div>
											    <?}?>
										    </div>
									    </div>
									</div>
									<!-- Comment-->
								<div class="form-group">                   
								    <textarea class="form-control counted" maxlength="180" name="message" id="message" placeholder="Type in your message" rows="2" style="margin-bottom:10px;"></textarea>
								    <h6 class="pull-left" id="counter">180</h6>
								    <input id="postc" class="btn btn-primary" type="submit" value="Post Comment">
								</div>
							</div>
						</div>
					<!-- right-block -->
				</div>
			</form>
			<!--Modal footer-->					    
		</div>
	</div>
<!-- FourthModal -->