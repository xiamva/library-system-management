@extends('index')
@section('title', 'Book')

@section('isihalaman')
    <h3><center>Daftar Book Perpustakaan Universitas Semarang</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBookAdd"> 
        Add Book Data 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">Book Id</td>
                <td align="center">Book Code</td>
                <td align="center">Book Title</td>
                <td align="center">Author</td>
                <td align="center">Category</td>
                <td align="center">Action</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($book as $index=>$bk)
                <tr>
                    <td align="center" scope="row">{{ $index + $book->firstItem() }}</td>
                    <td>{{$bk->book_id}}</td>
                    <td>{{$bk->book_code}}</td>
                    <td>{{$bk->title}}</td>
                    <td>{{$bk->author}}</td>
                    <td>{{$bk->category}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalBookAdd{{$bk->book_id}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Book -->
                        <div class="modal fade" id="modalBookAdd{{$bk->book_id}}" tabindex="-1" role="dialog" aria-labelledby="modalBookAddLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalBookAddLabel">Book Data Edit Form</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formbookedit" id="formbookedit" action="/book/edit/{{ $bk->book_id}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="book_id" class="col-sm-4 col-form-label">Book Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="book_code" name="book_code" placeholder="Enter Book Code">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="title" class="col-sm-4 col-form-label">Book Title</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="title" name="title" value="{{ $bk->title}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="author" class="col-sm-4 col-form-label">Author Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="author" name="author" value="{{ $bk->author}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="category" class="col-sm-4 col-form-label">Category</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="category" name="category" value="{{ $bk->category}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="closed" class="btn btn-secondary" data-dismiss="modal">closed</button>
                                                <button type="submit" name="addbook" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data Book -->
                        |
                        <a href="book/delete/{{$bk->book_id}}" onclick="return confirm('are you sure you want to delete it?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $book->currentPage() }} <br />
    Jumlah Data : {{ $book->total() }} <br />
    Data Per Halaman : {{ $book->perPage() }} <br />

    {{ $book->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Book -->
    <div class="modal fade" id="modalBookAdd" tabindex="-1" role="dialog" aria-labelledby="modalBookAddLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBookAddLabel">Form Input Book Data</h5>
                </div>
                <div class="modal-body">
                    <form name="formbookadd" id="formbookadd" action="/book/add " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="book_id" class="col-sm-4 col-form-label">Code Book</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="book_code" name="book_code" placeholder="Enter Book Code">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Title Book</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter the Book Title">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="author" class="col-sm-4 col-form-label">Author Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="author" name="author" placeholder="Enter Author Name">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="category" class="col-sm-4 col-form-label">Category</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="Category" name="Category" placeholder="Enter Category">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="closed" class="btn btn-secondary" data-dismiss="modal">Closed</button>
                            <button type="submit" name="bookadd" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Book -->
    
@endsection