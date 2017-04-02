<!-- FifthModal -->
	<div class="modal-dialog modal-lg">  					      
		<div class="modal-content">
			<!-- Modal header-->
			<div class="modal-header">
				<div class="row">
					<div class="col-lg-12 text-center"> 
						<h style="font-size:50px;"><b>แก้ไขข้อมูลหนังสือ</b></h>
					</div>
				</div>
			</div> 
			<!-- Modal header-->
			<!-- Modal footer--> 
			<div class="modal-footer"> 				
				<!-- left-block-->
				<form action="<?=$this->router->class.'/update'?>" method="post" enctype="multipart/form-data">
					<?foreach($showbook as $b){?>
						<div class="left-block col-lg-6">
							<div class="form-group hidden">
								<input type="text" name="id" value="<?echo $b->id;?>">
							</div>
							<div class="form-group">
								<div class="media">
									<img src="<?=base_url()."img/".$b->img;?>" name="img" id="pic" class="img-thumbnail media-object img-fluid" 
										style="width:404px; height:290px;">							
								</div>
							</div>
							<div class="input-group">
								<input type="text" class="form-control" value="<?=$b->img;?>" readonly>
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
								<input type="text" name="na" class="form-control" placeholder="ชื่อหนังสือ ภาษาหลัก" value="<?echo $b->na;?>">
							</div>
							<div class="form-group">
								<input type="text" name="na_2" class="form-control" placeholder="ชื่อหนังสือ ภาษารอง" value="<?echo $b->na_2;?>">
							</div>
							<div class="form-group">
								<input type="text" name="page" class="form-control" placeholder="จำนวนหน้าของหนังสือ" value="<?echo $b->page;?>">
							</div>
							<div class="form-group">
								<input type="text" name="price" class="form-control" placeholder="ราคาของหนังสือ" value="<?echo $b->price;?>">
							</div>										
							<!-- Dropdown -->
							<div class="form-group">
								<select class="form-control" name="rcmb" id="sel1">
								  	<?foreach ($us as $u){?>
									    <option value ="<?=$u->usn;?>"
									    		<?if ($b->rcmb == $u->id){
		                                                echo " selected";
		                                        };?>>
		                                <?=$u->usn;?></option>     
		                            <?}?>
								</select>
							</div>
							<div class="form-group">
							  <select class="form-control" name="cst" id="sel1">
									<option <?=$b->cst == 'In the library' ? 'selected' : ' ';?>>In the library</option>
									<option <?=$b->cst == 'Borrowed' ? 'selected' : ' ';?>>Borrowed</option>
									<option <?=$b->cst == 'Personal book' ? 'selected' : ' ';?>>Personal book</option>
							  </select>

							</div>
							<!-- Dropdown-->
							<!-- Comment box-->
							<div class="form-group">								      
								<textarea type="text" class="form-control" name="introduction" placeholder="บทนำหรือข้อความแนะนำหนังสือ" rows="3"><?=$b->introduction;?></textarea>
							</div>
							<!-- Comment box-->  
							<div class="form-group pull-left">
								<div class="radio">
							      <label><input type="radio" name="st" value="Active" <?=$b->st == 'Active' ? 'checked' : ' ';?>>Active</label>
							      <label><input type="radio" name="st" value="Inactive" <?=$b->st == 'Inactive' ? 'checked' : ' ';?>>Inactive</label>
							    </div>
						    </div>	 
						</div>
						<!-- right-block -->
						<input type="submit" class="btn btn-primary" value="Save">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<?}?>
				</form>
			</div>
			<!--Modal footer-->					    
		</div>
	</div>
<!-- FifthModal -->