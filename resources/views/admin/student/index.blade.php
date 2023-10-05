@extends('admin.layouts.app')
@include('admin.layouts.dataTableStyle')
@section('content')
    <section class="content-header">

        <div class="container-fluid">

            @if ($message = Session::get('success'))
                <div class="alert alert-success text-center">
                    <!-- you missed this line of code -->
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{ $message }}
                </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>{{ $page_name }} Management</h2>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $page_name }} Management</li>
                    </ol>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- /.card -->

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">{{ $page_name }} List</h3>

                <div class="ml-auto">
                    <a class="btn btn-success btn-md" href="{{ route('student.create') }}"><i
                            class="nav-icon fas fa-plus"></i></a>
                </div>


            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped  student_tbl">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key => $student)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $student->first_name . ' ' . $student->last_name }}</td>
                                <td>{{ $student->class }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->date_of_birth }}</td>
                               
                                <td>
                                    <div class="btn-group">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('student.show', $student->id) }}">
                                                    <i class="fa fa-fw fa-eye mr-2"></i>View
                                                </a>
                                                <hr>
                                                <a class="dropdown-item" href="{{ route('student.edit', $student->id) }}">
                                                    <i class="fa fa-fw fa-edit mr-2"></i>Edit
                                                </a>
                                                <hr>
                                                <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button  type="submit" class="btn btn-dangers">
                                                        <i class="fa fa-fw fa-trash"></i>Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                
                            </tr>
                        @endforeach


                    </tbody>

                </table>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection('content')


<!-- /.content-wrapper -->
