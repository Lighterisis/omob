<!-- ThirdModal -->
	<div class="modal-dialog modal-lg">  					      
		<div class="modal-content">
			<!-- Modal header-->
			<div class="modal-header">
				<div class="row">
					<div class="col-lg-12 text-center"> 
						<h style="font-size:50px;"><b>เพิ่มหนังสือ</b></h>
					</div>
				</div>
			</div> 
			<!-- Modal header-->
			<!-- Modal footer--> 
			<div class="modal-footer"> 				
				<!-- left-block-->
				<form action="<?=$this->router->class.'/insertbook'?>" method="post" enctype="multipart/form-data">
				<div class="left-block col-lg-6">
					<script>
						$(function() {
						  // We can attach the `fileselect` event to all file inputs on the page
						  $(document).on('change', ':file', function() {
						    var input = $(this),
						        numFiles = input.get(0).files ? input.get(0).files.length : 1,
						        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
						    input.trigger('fileselect', [numFiles, label]);
						  });

						  // We can watch for our custom `fileselect` event like this
						  $(document).ready( function() {
						      $(':file').on('fileselect', function(event, numFiles, label) {

						          var input = $(this).parents('.input-group').find(':text'),
						              log = numFiles > 1 ? numFiles + ' files selected' : label;

						          if( input.length ) {
						              input.val(log);
						          } else {
						              if( log ) alert(log);
						          }
						      });
						  });						  
						});
					</script>
					<div class="form-group">
						<div class="media">
							<img id="pic" class="img-thumbnail media-object img-fluid" 
								style="width:404px; height:290px;">							
						</div>
					</div>
					<div class="input-group">
						<input type="text" class="form-control" readonly>
		                <label class="input-group-btn">
		                    <span class="btn btn-default">
		                    	<input type="file" style="display: none;" multiple name="featured" id="featured" 
		                    	onchange="document.getElementById('pic').src = window.URL.createObjectURL(this.files[0])">
		                    	<i class="glyphicon glyphicon-picture"></i> 
		                    </span>
		                </label>
		            </div>
				</div>
				<!-- left-block-->
				
				<!-- right-block-->
				<div class="right-block col-lg-6">
					
					<div class="form-group">
						<input type="text" name="na" class="form-control" placeholder="ชื่อหนังสือ ภาษาหลัก">
					</div>
					<div class="form-group">
						<input type="text" name="na_2" class="form-control" placeholder="ชื่อหนังสือ ภาษารอง">
					</div>
					<div class="form-group">
						<input type="text" name="page" class="form-control" placeholder="จำนวนหน้าของหนังสือ">
					</div>
					<div class="form-group">
						<input type="text" name="price" class="form-control" placeholder="ราคาของหนังสือ">
					</div>										
					<!-- Dropdown -->
					<div class="form-group">
					  <select class="form-control" name="rcmb" id="sel1">
					    <?foreach ($us as $b) {?>
									<option><?echo $b->usn;?></option>
						<?}?>
					  </select>
					</div>
					<!-- Dropdown-->
					<!-- Comment box-->
					<div class="form-group">								      
						<textarea class="form-control" name="introduction" rows="3" id="comment" placeholder="บทนำหรือข้อความแนะนำหนังสือ"></textarea>
					</div>
					<!-- Comment box-->  
					 
				</div>
				<!-- right-block -->
					<input type="submit" class="btn btn-primary" value="Add">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
			<!--Modal footer-->					    
		</div>
	</div>
	<!-- </div> -->
<!-- ThirdModal -->

