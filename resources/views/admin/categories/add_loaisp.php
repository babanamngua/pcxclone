
		

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
        <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="/loaisanphamController/list_loaisp">Quản lý loại sản phẩm</a></li>
				<li class="active">Thêm sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Thêm loại sản phẩm</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                            <form action="/loaisanphamController/insert_loaisp" method="POST" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label>Tên loại sản phẩm</label>
                                    <input required name="tenloai" class="form-control" placeholder="Tên loại sản phẩm...">
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    
                                    <input  name="anhloaisp" type="file" class="form-control">
                                    <br>
                                    
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