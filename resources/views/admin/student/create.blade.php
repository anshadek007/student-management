@extends('admin.layouts.app')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <a class="btn-sm btn-success" href="{{ route('student.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        <!-- <h1>Show Role</h1> -->
        <div class="pull-right">
        </div>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Create New {{$page_name}}</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>



<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="card-header">
      <h3 class="card-title">Create New {{$page_name}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    {!! Form::open(array('route' => 'student.store','method'=>'POST')) !!}
    <div class="card-body">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
              <strong>First Name:</strong>
              {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control', 'required' => 'required')) !!}
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Last Name:</strong>
            {!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control', 'required' => 'required')) !!}
        </div>
    </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
              <strong>Class:</strong>
              <select class="form-control select2 select2-hidden-accessible" name="class" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
              <option selected="selected" value="">-- Select --</option>
              <option value="1st">1st </option>
              <option value="2nd">2nd</option>
              <option value="3rd">3rd</option>
              <option value="4th">4th </option>
              </select>
          
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Gender:</strong>
            <select class="form-control select2 select2-hidden-accessible" name="gender" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
            <option selected="selected" value="">-- Select --</option>
            <option value="Male">Male</option>
            <option value="Female">Female </option>
            </select>
        </div>
    </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4">
          <div class="form-group">
              <strong>Date Of Birth:</strong>
              {!! Form::Date('date_of_birth', null, array('placeholder' => 'Date Of Birth','class' => 'form-control', 'required' => 'required' )) !!}
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <strong>Emergency Contact:</strong>
            {!! Form::number('emergency_contact', null, array('placeholder' => 'Emergency Contact','class' => 'form-control', 'required' => 'required')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4">
      <div class="form-group">
          <strong>Status:</strong>
          <select class="form-control select2 select2-hidden-accessible" name="status" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
          <option selected="selected" value="">-- Select --</option>
          <option value="1">Activate</option>
          <option value="0">Deactivate </option>
          </select>
      
      </div>
  </div>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    {!! Form::close() !!}
  </div>
  <!-- /.card -->
</div>
@endsection
