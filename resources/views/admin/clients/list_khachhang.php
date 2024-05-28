
   
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row" style="margin-top: -20px;">
			<ol class="breadcrumb">
				<li><a href="<?php echo BASE_URL ?>login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý khách hàng</li>
			</ol>			
		</div><!--/.row-->
		
		<div class="row" >
			<div class="col-lg-5" >
			<h1 class="page-header" style="font-size: 40px;" >Danh sách khách hàng</h1>
			</div>
      
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="<?php echo BASE_URL ?>/khachhangController/add_khachhang" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm khách hàng
            </a>
			<br>
        </div>
		
        
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table data-toolbar="#toolbar" data-toggle="table" id="table_id" class="table table-striped">
									<thead>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Tên khách hàng </th>
										<th>Số điện thoại </th>
										<th>Email </th>
										<th>Địa chỉ </th>
										<th>Password </th>
										<th>Chức năng</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$i = 0;
									foreach($khachhang as $key =>$values){
									$i++;
									?>
										<tr>
											<td ><?php echo $i ?></td>
											<td><?php echo $values['tenkh'] ?></td>
											<td><?php echo $values['sdt'] ?></td>
											<td><?php echo $values['email'] ?></td>
											<td><?php echo $values['diachi'] ?></td>
											<td><?php echo ($values ['password']) ?></td>
											<td class="form-group">
											<a href="<?php echo BASE_URL ?>/khachhangController/edit_khachhang/<?php echo $values['makh']?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
											<a href="<?php echo BASE_URL ?>/khachhangController/delete_khachhang/<?php echo $values['makh']?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
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
        
