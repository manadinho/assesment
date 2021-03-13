@extends('layouts.app')
@section('content')
<style>
        #overlay{	
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height:100%;
            background: rgba(0,0,0,0.6);
        }
        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;  
        }
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px #ddd solid;
            border-top: 4px #2e93e6 solid;
            border-radius: 50%;
            animation: sp-anime 0.8s infinite linear;
        }
        @keyframes sp-anime {
            100% { 
                transform: rotate(360deg); 
            }
        }
    </style>

    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>


<p><center><b style="font-size: 30px;">Super Admin dashboard</b></center></p>
<div class="container">
    <div class="col-md-12">
        <form id='user-form'>
            @csrf()
            <input type="hidden" id="method" name="method" value="{{($user->id > 0) ? 'update' : 'create'}}">
            <input type="hidden" id="id" name="id" value="{{($user->id > 0) ? $user->id : 0}}">
            <input class="form-control" type="text" id="name" name="name" value="{{($user->id > 0) ? $user->name : ''}}" Placeholder="Name"><br>
            <input class="form-control" type="email" id="email" name="email" Placeholder="Email" value="{{($user->id > 0) ? $user->email : ''}}"><br>
            <select name="type" id="type" class="form-control">
                <option value="">Select user type</option>
                
                <option value="admin" {{ ($user->type == 'admin') ? 'selected': '' }}>Admin</option>
                <option value="user" {{ ($user->type == 'user') ? 'selected': '' }}>User</option>
            </select><br>
            <input class="form-control" type="password" name="password" id="password" Placeholder="Password"><br>
            <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </div>
</div>

@endsection

@section('js')
    <script>
        var success_message = "{{($user->id > 0)? 'User updated' : 'User created'}}";
        $('#overlay').fadeIn(300);
        $(document).ready(function(){
            $('#overlay').fadeOut(300);
            $('#user-form').submit(function(e){
                $('#overlay').fadeIn(300);
                e.preventDefault();
                const formData = {
                    id: $('#id').val(),
                    method: $('#method').val(),
                    name: $('#name').val(),
                    email: $('#email').val(),
                    type: $('#type').val(),
                    password: $('#password').val(),
                    _token: $('input[name="_token"]').val()
                }
                addUpdateUser(formData);
            })
        })


        const addUpdateUser = data => {
            $.ajax({
                url: '{{ route("super-dashboard-add-user") }}',
                method: 'POST',
                data:data,
                dataType: 'JSON',
                success: response => {
                    $('#overlay').fadeOut(300);
                    if(response.success){
                        swal({
                            title: 'Success!',
                            text: success_message,
                            type: 'success',
                            padding: '2em'
                        });
                    }
                    else{
                        swal({
                        title: "Error!",
                        text: "Something went wrong",
                        padding: '2em'
                    })
                    }
                },
                error: response => {
                    $('#overlay').fadeOut(300);
                    swal({
                        title: "Error!",
                        text: response.responseJSON.message,
                        padding: '2em'
                    })
                }
            })
        }
        
    </script>
@endsection