
   
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row" style="margin-top: -20px;">
			<ol class="breadcrumb">
				<li><a href="<?php echo BASE_URL ?>login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý nhà sản xuất</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" >
			<div class="col-lg-5" >
				<h1 class="page-header" style="font-size: 40px;" >Danh sách nhà sản xuất</h1>
			</div>
      
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="<?php echo BASE_URL ?>/nhasanxuatController/add_nhasanxuat" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm nhà sản xuất
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
										<th>Tên nhà sản xuất </th>
										<th>Hình ảnh</th>
										<th>Chức năng</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$i = 0;
									foreach($nhasanxuat as $key =>$value){
										$i++;
									?>
										<tr>
											<td ><?php echo $i ?></td>
											<td><?php echo $value['tennsx'] ?></td>
											<td><img src="<?php echo BASE_URL ?>/public/uploads/nhasanxuat/<?php echo $value['hinh'] ?> " height="100" > </td>
											<td class="form-group">
												<a href="<?php echo BASE_URL ?>/nhasanxuatController/edit_nhasanxuat/<?php echo $value['mansx']?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
												<a href="<?php echo BASE_URL ?>/nhasanxuatController/delete_nhasanxuat/<?php echo $value['mansx']?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
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
        
