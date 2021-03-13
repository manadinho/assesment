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
    <a style="margin-bottom:25px" href="{{ route('super-dashboard-add-user-view', 0) }}" class="btn btn-primary">Add User</a>
    <div class="col-md-12">
        <table id="super-table" class="table table-hover">
            <thead>
                <tr>
                    <th>Sr no.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Impoersonate</th>
                    <th width="10%">Edit</th>
                    <th width="10">Delete</th>
                </tr>
            </thead>
            <tbody id="users-table-body"></tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $('#overlay').fadeIn(300);
        $(document).ready(function(){
            getAllUsers();
            $('#overlay').fadeOut(300);
        })


        const getAllUsers = () => {
            $.ajax({
                url: '{{ route("super-dashboard-all-users") }}',
                method: 'GET',
                dataType: 'JSON',
                success: response => {
                    let users = '';
                    response.forEach((res, index) => {
                        users+=`<tr>
                            <td>${index+1}</td>
                            <td>${res.name}</td>
                            <td>${res.email}</td>
                            <td>${res.type}</td>
                            <td><a href="{{ url('/super/impersonate') }}/${res.id}" class="btn btn-info">Impersonate</a></td>
                            <td><a href="{{ url('/super/add')}}/${res.id}" class="btn btn-primary">Edit</a></td>
                            <td><button onclick="deleteUser(${res.id})" class="btn btn-danger">Delete</button></td>
                        </tr>`
                    })
                    $('#users-table-body').html(users)
                    $('#super-table').DataTable();
                }
            })
        }

        const deleteUser = id => {
            $('#overlay').fadeIn(300);
            $.ajax({
                url: '{{ route("super-dashboard-delete-user") }}',
                data:{id},
                method: 'GET',
                dataType: 'JSON',
                success: response => {
                    $('#overlay').fadeOut(300);
                    if(response.success) {
                        swal({
                            title: 'User deleted.',
                            padding: '2em'
                        })
                    }
                    getAllUsers();
                }
            })
        }
        
    </script>
@endsection