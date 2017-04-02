<html>
	<head>
		<script type="text/javascript">
			$(function(){
				$(':button[data-toggle="modal"]').on('click',function(){
					func = ($(this).data('mcall'));
					id = ($(this).data('id'));
					$('#globalModal').load("<?=$this->router->class.'/'?>"+func,{id:id});
				})
			})
		</script>
		<style>
			.btn-circle {
				  width: 49px;
				  height: 49px;
				  text-align: center;
				  padding: 5px 0;
				  font-size: 20px;
				  line-height: 2.00;
				  border-radius: 30px;
			}
			.btn-circle-sm {
				  width: 35px;
				  height: 35px;
				  text-align: center;
				  padding: 2px 0;
				  font-size: 20px;
				  line-height: 1.65;
				  border-radius: 30px;
			}
			.btn-circle-micro {
				  width: 19px;
				  height: 19px;
				  text-align: center;
				  padding: 1px 0;
				  font-size: 13px;
				  line-height: 0.1;
				  border-radius: 30px;
			}
		</style>
	</head>
<div id="globalModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"></div>	
<div class="container-fluid">
	<div class="row">
		<div class="center-block col-lg-8 col-md-8 col-sm-6 col-xs-12">
			<h style="text-align:right;font-size:40px;" class="pull-right"><b>ข้อมูลหนังสือทั้งหมด</b></h>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-0">
			<div class="pull-right">
			<button type="button" class="btn btn-danger btn-circle tooltip-test" title="ยืมหนังสือ" data-toggle="modal" data-target="#globalModal" data-mcall="FirstModalBorrowBook">
				<i class="glyphicon glyphicon-list-alt"></i></button>							
			<button type="button" class="btn btn-success btn-circle tooltip-test" title="คืนหนังสือ" data-toggle="modal" data-target="#globalModal" data-mcall="SecondModalRestoreBook">
				<i class="glyphicon glyphicon-book"></i></button>
			<button type="button" class="btn btn-warning btn-circle tooltip-test" title="เพิ่มหนังสือ" data-toggle="modal" data-target="#globalModal" data-mcall="ThirdModalAddBook">
				<i class="glyphicon glyphicon-plus"></i></button>
			</div>
		</div>	
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<table class="table table-striped" style="width:100%;">
		  		<tr>
			        <th class="text-center">No.</th>
			        <th class="text-center">Image</th>
			        <th class="text-center">ชื่อหนังสือ</th>
			        <th class="text-center">จำนวนหน้า</th>
			        <th class="text-center">ผู้แนะนำหนังสือเล่มนี้</th>
			        <th class="text-center">สถานะ</th>
			        <th class="text-center"></th>
		      	</tr>
			<?foreach($book as $b){?>      	
		        <tr>
			        <td><?echo $b->id;?></td>
			        <td class="text-center">
						<div>
							<img src="<?=base_url()."img/".$b->img;?>" id="pic" class="img-thumbnail img-fluid" style="width:80px; height:80px;">
						</div>
					</td>
			        <td><?echo $b->na;?></td>
			        <td><?echo $b->page;?></td>
			        <td><?foreach ($us as $u){
			        	if($b->rcmb == $u->id){
			        		echo $u->usn;
			        	}
			        	}?>
					</td>
			        <td><?echo $b->cst;?></td>
			        <td>
			        	<div class="pull-right">
							<button type="button" data-id="<?echo $b->id;?>" class="btn btn-info btn-circle-sm tooltip-test" title="comment" 
								data-toggle="modal" data-target="#globalModal" data-mcall="FourthModalCommentBook">
								<i class="glyphicon glyphicon-comment"></i></button>

							<button type="button" id="edit" data-id="<?echo $b->id;?>" class="btn btn-primary btn-circle-sm tooltip-test" title="edit" 
								data-toggle="modal" data-target="#globalModal" data-mcall="FifthModalEditBook">
								<i class="glyphicon glyphicon-pencil"></i></button>

						</div>
			        </td>
		      	</tr>
			<?}?>
    		</table>
    	</div>
    </div>
</div> 
</html>
