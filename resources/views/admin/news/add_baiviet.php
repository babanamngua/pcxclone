
		

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
        <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="/baivietController/list_baiviet">Quản lý bài viết</a></li>
				<li class="active">Thêm bài viết</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Thêm bài viết</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                            <form action="/baivietController/insert_baiviet" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên bài viết</label>
                                    <input required name="tenbv" class="form-control" placeholder="Tên bài viết...">
                                </div>
                                <div class="form-group">
                                    <label>Ảnh bài viết</label>
                                    <input required name="anh" type="file" class="form-control">
                                    <br>
                                    
									<div class="form-group">
                                      <label for="pwd">Nội dung bài viết</label>
                                      
                                      <textarea id="chi_tiet_bv" name="mota" style="resize: none;" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                    <label>Ngày đăng</label>
                                    <input required name="ngaydang" class="form-control" placeholder="Ngày đăng...">
                                </div>
                                </div>
                                <button name="sbm" type="submit" class="btn btn-success">Thêm</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>                             
                              
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	