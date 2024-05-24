
				
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row"  style="margin-top: -20px;">
			<ol class="breadcrumb">
				<li><a href="<?php echo BASE_URL ?>/login/dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="<?php echo BASE_URL ?>/khachhangController/list_khachhang">Quản lý khách hàng</a></li>
				<li class="active">Sửa khách hàng </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;"  >Sửa khách hàng</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <?php
                            foreach($khachhang as $key => $values){
                            ?>
                            <form action="<?php echo BASE_URL ?>/khachhangController/update_khachhang/<?php echo $values['makh']?>" method="POST"  >
                            <div class="form-group" >
                                <label>Tên khách hàng</label>
                                <input type="text" value="<?php echo $values['tenkh']?>" name= "tenkh" class="form-control" placeholder="Tên khách hàng...">
                                <br>
                                <label>Số điện thoại</label>
                                <input type="text" value="<?php echo $values['sdt']?>" name= "sdt" class="form-control" placeholder="Số điện thoại...">
                                <br>
                                <label>Email</label>
                                <input type="text" value="<?php echo $values['email']?>" name= "email" class="form-control" placeholder="Email...">
                                <br>
                                <label>Địa chỉ</label>
                                <input type="text" value="<?php echo $values['diachi']?>" name= "diachi" class="form-control" placeholder="Địa chỉ...">
                                <br>
                                <label>Password</label>
                                <input type="text" value="<?php echo $values['password']?>" name= "password" class="form-control" placeholder="Password...">
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

