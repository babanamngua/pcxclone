
		

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL ?>login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="<?php echo BASE_URL ?>/khuyenmaiController/list_khuyenmai">Quản lý khuyến mãi</a></li>
				<li class="active">Thêm khuyến mãi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Thêm khuyến mãi</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                            <form action="<?php echo BASE_URL ?>/khuyenmaiController/insert_khuyenmai" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên khuyến mãi</label>
                                    <input required name="tenkm" class="form-control" placeholder="Tên khuyến mãi...">
                                </div>
                                <div class="form-group">
                                    <label>Phần trăm</label>
                                    <input required name="phantram" class="form-control" placeholder="Phần trăm...">
                                </div>                         
                                
                             
                                <div class="form-group">
                                    <label>Ảnh khuyến mãi</label>
                                    
                                    <input required name="hinh" type="file" class="form-control">
                                   
                                </div>
                                
                                        
                               
                                <button name="sbm" type="submit" class="btn btn-success">Thêm</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	