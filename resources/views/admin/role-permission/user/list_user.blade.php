@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
   <div class="row"  style="position: fixed; width: 82%; z-index: 1000;">
      <ol class="breadcrumb" style="background-color: aliceblue;">
         <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
         <li class="active">Quản lý nhân sự</li>
      </ol>
   </div><!--/.row-->

   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header" style="font-size: 40px; margin-top: 50px;">Danh sách users</h1>
      </div>
   </div><!--/.row-->

   <div id="toolbar" class="btn-group">
      <a href="{{ url('users/create') }}" class="btn btn-success">
         <i class="glyphicon glyphicon-plus"></i> Thêm users
      </a>
      <br>
   </div>
   
   @if(session()->has('status'))
      <div class="alert alert-info" role="alert">
         {{ session('status') }}
      </div>
   @endif

   <div class="row">
      <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-body">
               <table id="table_id" class="table table-striped table-bordered">
                  <thead>
                     <tr>
                        <th style="text-align: center; vertical-align: middle; width:10px;">stt</th>
                        <th style="text-align: center; vertical-align: middle;">Tên</th>
                        <th style="text-align: center; vertical-align: middle;">Email</th>
                        <th style="text-align: center; vertical-align: middle;">vai trò</th>
                        <th style="text-align: center; vertical-align: middle;width:80px;">Chức năng</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php $i = 0; @endphp
                     @foreach ($users as $user)
                        @php $i++; @endphp
                        @if ($user->roles->isNotEmpty()) {{-- Kiểm tra xem người dùng có role không --}}
                           <tr>
                              <td>{{ $i }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>
                                 @foreach ($user->getRoleNames() as $rolename)
                                    <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                 @endforeach
                              </td>
                              <td>
                                 <div class="form-group" style="display: -webkit-inline-box;">
                                    <a href="{{ url('users/'.$user->user_id.'/edit') }}" class="btn btn-success">
                                       <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    <a href="{{ url('users/'.$user->user_id.'/delete') }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                                       <i class="glyphicon glyphicon-remove"></i>
                                    </a>
                                 </div>
                              </td>
                           </tr>
                        @endif
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div><!--/.row-->
</section>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
@endsection

@section('css')

@endsection
@section('js')

@endsection
