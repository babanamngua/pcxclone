
				
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
				<li><a href="<?php echo BASE_URL ?>/login/dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="<?php echo BASE_URL ?>/loaisanphamController/list_loaisp">Quản lý loại sản phẩm</a></li>
				<li class="active">Sửa loại sản phẩm </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;"  >Sửa loại sản phẩm</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <?php
                            foreach($loaisanpham as $key => $values){
                            ?>
                            <form action="<?php echo BASE_URL ?>/loaisanphamController/update_loaisp/<?php echo $values['maloai']?>" method="POST"  enctype="multipart/form-data">
                            <div class="form-group" >
                                <label>Tên loại</label>
                                <input type="text" value="<?php echo $values['tenloai']?>" name= "tenloai" class="form-control" placeholder="Tên loại...">
                                <br>
                               
                            </div>
                            <div class="form-group">
                                    <label>Hình ảnh</label>
                                    
                                    <input  name="anhloaisp" type="file" class="form-control">
                                    <br>
                                    <div>
                                        <img  style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));" width="100px"  height="100px" src="<?php echo BASE_URL ?>/public/uploads/loaisanpham/<?php echo $values['anhloaisp']?>">
                                    </div>
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

