
		

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
        <li><a href="<?php echo BASE_URL ?>login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="<?php echo BASE_URL ?>/khachhangController/list_khachhang">Quản lý khách hàng</a></li>
				<li class="active">Thêm khách hàng</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Thêm khách hàng</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                            <form action="<?php echo BASE_URL ?>/khachhangController/insert_khachhang" method="POST" >
                                <div class="form-group">
                                    <label>Tên khách hàng</label>
                                    <input required name="tenkh" class="form-control" placeholder="Tên khách hàng...">
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input required name="sdt" class="form-control" placeholder="Số điện thoại...">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required name="email" class="form-control" placeholder="Email...">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input required name="diachi" class="form-control" placeholder="Địa chỉ...">
                                </div>                         
                                <div class="form-group">
                                    <label>Password</label>
                                    <input required name="password" class="form-control" placeholder="Password...">
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