@extends('layouts.admin')
@section('title')
   {{$title}}
@endsection

@section('content')
   <section>
    @if($errors->any())
	@foreach ($errors->all() as $errors)
		<div>{{$errors}}</div>
	@endforeach
	@endif			
		<div class="row">
			<ol class="breadcrumb">
        <li><a href="login/quanly"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{url('roles')}}">Quản lý role : {{ $role->name }}</a></li>
				<li class="active" >Role  : {{ $role->name }}</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="font-size: 40px;">Role : {{ $role->name }}</h1>
			</div>
        </div>
        @if(session()->has('status'))
        <div class="alert alert-info" role="alert">
            {{session('status')}}
        </div>
    @endif
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                            <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                @error('permission')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <label for="">Permissions</label>

                                <div class="row">
                                    @foreach ($permissions as $permission)
                                    <div class="col-md-2">
                                        <label>
                                            <input
                                                type="checkbox"
                                                name="permission[]"
                                                value="{{ $permission->name }}"
                                                {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                            />
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection

@section('css')

@endsection
@section('js')

@endsection        
