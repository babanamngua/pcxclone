
				
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
				<li><a href="<?php echo BASE_URL ?>/login/dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="<?php echo BASE_URL ?>/baivietController/list_baiviet">Quản lý bài viết</a></li>
				<li class="active">Sửa bài viết </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;"  >Sửa bài viết</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <?php
                            foreach($baiviet as $key => $values){
                            ?>
                            <form action="<?php echo BASE_URL ?>/baivietController/update_baiviet/<?php echo $values['mabv']?>" method="POST" enctype="multipart/form-data" >
                            <div class="form-group" >
                                <label>Tên bài viết</label>
                                <input type="text" value="<?php echo $values['tenbv']?>" name= "tenbv" class="form-control" placeholder="Tên bài viết...">
                                <br>
                                <div class="form-group">
                                    <label>Hình bài viết</label>
                                    <input  name="anh" type="file" class="form-control">
                                    <br>
                                    <div>
                                        <img  style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));" width="100px"  height="100px" src="<?php echo BASE_URL ?>/public/uploads/baiviet/<?php echo $values['anh']?>">
                                    </div>
                                </div>
                                <label>Nội dung bài viết</label>
                                <textarea id="chi_tiet_bv" name="mota" style="resize: none;" row="5" class="form-control" > <?php echo $values['mota']?></textarea>
                                <br>
                                <label>Ngày đăng</label>
                                <input type="text" value="<?php echo $values['ngaydang']?>" name= "ngaydang" class="form-control" placeholder="Ngày đăng...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-success">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    	</form>
                        <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
	</div>		

