@if(session('status'))
 <div class="alert alert-success">
    {{session('status')}}
 </div>
 @endif
<form action="{{ route('loginAdminCheck') }}" method="POST">
    {{csrf_field()}} 
    <table>
        <tr>
            <td>email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            
            <td>
                <button type="submit" class="btn btn-primary">Submit</button>
            </td>
        </tr>
    </table>
</form>

@section('css')

@endsection
@section('js')

@endsection