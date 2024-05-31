
   
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row" style="margin-top: -20px;">
			<ol class="breadcrumb">
				<li><a href="<?php echo BASE_URL ?>login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" >
			<div class="col-lg-5" >
				<h1 class="page-header" style="font-size: 40px;" >Danh sách sản phẩm</h1>
			</div>
      
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="<?php echo BASE_URL ?>/sanphamController/add_sanpham" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
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
										<th>Tên sản phẩm </th>
										<th>Hình </th>
										<!-- <th>Mô tả </th> -->
										<th>Số lượng</th>
										<th>Loại sản phẩm </th>
										<th>Nhà sản xuất </th>
										<th>Khuyến mãi</th>
										<th>Giá</th>

										<th>Chức năng</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$i = 0;
									foreach($sanpham as $key =>$value){
										$i++;
									?>
										<tr>
											<td ><?php echo $i ?></td>
											<td><?php echo $value['tensp'] ?></td>
											<td><img src="<?php echo BASE_URL ?>/public/uploads/sanpham/<?php echo $value['hinhsp']?>" height="100" width="100"></td>
											<!-- <td><?php echo $value['mota'] ?></td> -->
											<td><?php echo $value['soluong'] ?></td>
											<td><?php echo $value['tenloai'] ?></td>
											<td><?php echo $value['tennsx'] ?></td>
											<td><?php echo $value['tenkm'] ?></td>
											<td><?php echo $value['gia'] ?></td>

											<td class="form-group">
												<a href="<?php echo BASE_URL ?>/sanphamController/edit_sanpham/<?php echo $value['masp']?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
												<a href="<?php echo BASE_URL ?>/sanphamController/delete_sanpham/<?php echo $value['masp']?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
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
        
