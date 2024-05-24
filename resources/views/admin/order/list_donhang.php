
   
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row" style="margin-top: -20px;">
			<ol class="breadcrumb">
				<li><a href="<?php echo BASE_URL ?>login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý đơn hàng</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" >
			<div class="col-lg-5" >
				<h1 class="page-header" style="font-size: 40px;" >Danh sách đơn hàng</h1>
			</div>
      
		</div><!--/.row-->
		
		
        
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table data-toolbar="#toolbar" data-toggle="table" id="table_id" class="table table-striped">
									<thead>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Code đơn hàng</th>
                                        <th>Tổng tiền</th>
										<th>Ngày đặt</th>
                                        <th>Ghi chú</th>
                                        <th>Trạng thái</th>
                                        <th>Quản lý</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$i = 0;
									foreach($donhang as $key =>$value){
										$i++;
									?>
										<tr>
											<td ><?php echo $i ?></td>
											<td><?php echo $value['codedonhang'] ?></td>
											<td><?php echo $value['tongtien'] ?></td>
											<td><?php echo $value['ngaydat'] ?></td>
											<td><?php echo $value['ghichu'] ?></td>
											<td><?php if($value['trangthai']==0) {echo 'đơn hàng mới';}else{echo 'đã xử lý';} ?></td>
											<td class="form-group">
												<a href="<?php echo BASE_URL ?>/donhangController/xemdonhang_donhang/<?php echo $value['madh']?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
											</td>
										</tr>
                                        <?php
                                        }
                                        ?>

									</tbody>
								</table>
							</div>
							
			</div>
		</div><!--/.row-->
         
        </div>	<!--/.main-->
        
