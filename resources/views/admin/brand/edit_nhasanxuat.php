
				
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
				<li><a href="<?php echo BASE_URL ?>/login/dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="<?php echo BASE_URL ?>/nhasanxuatController/list_nhasanxuat">Quản lý nhà sản xuất</a></li>
				<li class="active">Sửa nhà sản xuất </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;"  >Sửa nhà sản xuất</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <?php
                            foreach($nhasanxuat as $key => $values){
                            ?>
                            <form action="<?php echo BASE_URL ?>/nhasanxuatController/update_nhasanxuat/<?php echo $values['mansx']?>" method="POST" enctype="multipart/form-data" >
                            <div class="form-group" >
                                <label>Tên nhà sản xuất</label>
                                <input type="text" value="<?php echo $values['tennsx']?>" name= "tennsx" class="form-control" placeholder="Tên nhà sản xuất...">
                                <br>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input  name="hinh" type="file" class="form-control">
                                    <br>
                                    <div>
                                        <img  style="filter: drop-shadow(0 0 5px rgb(119, 119, 145));" width="100px"  height="100px" src="<?php echo BASE_URL ?>/public/uploads/nhasanxuat/<?php echo $values['hinh']?>">
                                    </div>
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

