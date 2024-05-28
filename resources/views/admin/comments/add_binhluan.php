
		

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL ?>login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="<?php echo BASE_URL ?>/binhluanController/list_binhluan">Quản lý bình luận</a></li>
				<li class="active">Thêm bình luận</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Thêm bình luận</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                            <form action="<?php echo BASE_URL ?>/binhluanController/insert_binhluan" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input required name="tennsx" class="form-control" placeholder="Tên sản phẩm...">
                                </div>
								<div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <input required name="tenkh" class="form-control" placeholder="Tên khách hàng...">
                                </div>
                                <div class="form-group">
                                    <label>Hình sản phẩm</label>
                                    <input required name="hinh" type="file" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input required name="tenkh" class="form-control" placeholder="Số điện thoại...">
                                </div>
								<div class="form-group">
                                    <label>Ngày giờ</label>
                                    <input type="date" id="start" >
                                </div>
								
                                <button name="sbm" type="submit" class="btn btn-success">Thêm</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>                             
                              
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	