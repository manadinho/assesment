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


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <table id="super-table" class="table table-hover">
                <thead>
                    <tr>
                        <th>Sr no.</th>
                        <th>title</th>
                        <th>body</th>
                        <th width="10%">Comments</th>
                    </tr>
                </thead>
                <tbody id="posts-table-body"></tbody>
            </table>
        </div>

        <div class="col-md-4" id="comments-section">
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $('#overlay').fadeIn(300);
        $(document).ready(function(){
            getAllPosts();
            $('#overlay').fadeOut(300);
        })


        const getAllPosts = () => {
            $.ajax({
                url: 'https://jsonplaceholder.typicode.com/posts',
                method: 'GET',
                dataType: 'JSON',
                success: response => {
                    let posts = '';
                    response.forEach((res, index) => {
                        posts+=`<tr>
                            <td>${index+1}</td>
                            <td>${res.title}</td>
                            <td>${res.body}</td>
                            <td><button onclick="getComments(${res.id})" class="btn btn-primary">Comments</button></td>
                        </tr>`
                    })
                    $('#posts-table-body').html(posts)
                    $('#super-table').DataTable();
                }
            })
        }

        const getComments = (id) => {
            $('#overlay').fadeIn(300);
            $.ajax({
                url: `https://jsonplaceholder.typicode.com/posts/${id}/comments`,
                method: 'GET',
                dataType: 'JSON',
                success: response => {
                    $('#overlay').fadeOut(300);
                    let comments = `<table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                        </tr>
                    </thead><tbody>`;
                    response.forEach((res, index) => {
                        comments+=`<tr>
                            <td>${res.name}</td>
                            <td>${res.email}</td>
                            <td>${res.body}</td>
                        </tr>`
                    })
                    comments+=`</tbody></table>`;
                    $('#comments-section').html(comments)
                }
            })
        }



        
    </script>
@endsection