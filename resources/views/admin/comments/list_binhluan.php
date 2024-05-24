
   
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row" style="margin-top: -20px;">
			<ol class="breadcrumb">
				<li><a href="<?php echo BASE_URL ?>login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý bình luận</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" >
			<div class="col-lg-5" >
				<h1 class="page-header" style="font-size: 40px;" >Danh sách bình luận</h1>
			</div>
      
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="<?php echo BASE_URL ?>/binhluanController/add_binhluan" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm bình luận
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
										<th>Tên sản phẩm</th>
										<th>Tên khách hàng</th>
										<th>Hình sản phẩm</th>
										<th>Số điện thoại</th>
										<th>Ngày giờ</th>
										<th>Chức năng</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$i = 0;
									foreach($binhluan as $key =>$value){
										
										$i++;
									?>
										<tr>
											<td ><?php echo $i ?></td>
											<td><?php echo $value['tensp'] ?></td>
											<td><?php echo $values['tenkh'] ?></td>
											<td><img src="<?php echo BASE_URL ?>/public/uploads/sanpham/<?php echo $values['hinh'] ?> " height="100" width="100"> </td>
											<td><?php echo $values['sodienthoai'] ?></td>
											<td><?php echo $values['ngaygio'] ?></td>
											<td><?php echo $values['noidung'] ?></td>
											<td><?php 
											?>
											</td>
											<td class="form-group">
												<a href="<?php echo BASE_URL ?>/product/edit_product/<?php echo $value['mabl']?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
												<a href="<?php echo BASE_URL ?>/product/delete_product/<?php echo $value['mabl']?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
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
        
