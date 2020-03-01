@extends('site.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ trans('master.dashboard') }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ trans('master.home') }}</a></li>
              <li class="breadcrumb-item active"><a href="#">{{ trans('master.employees') }}</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
 <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ trans('master.employees') }}</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              @if(!empty($employees))
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>{{ trans('master.first_name') }}</th>
                      <th>{{ trans('master.last_name') }}</th>
                      <th>{{ trans('master.phone') }}</th>
                      <th>{{ trans('master.company') }}</th>
                      <th>{{ trans('master.actions') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($employees as $employee)

                   
                    <tr id="{{$employee->id}}">
                      <td>{{$employee->first_name}}</td>
                      <td>{{$employee->last_name}}</td>
                      <td>{{$employee->phone}}</td>
                      <td>{{$employee->Company->name}}</td>
                      <td>
                                        <a  href='{{ url("/employees/$employee->id/edit")}}'><i class="fa fa-edit"></i></a>
                                            <a onclick='deleteObject("{{$employee->id}}")'><i class="fa fa-trash"></i></a>
                                               <a  href='{{ url("/employees/$employee->id")}}'><i class="fa fa-eye"></i></a>
                                            
                                  </td>
                    </tr>
                     @endforeach
                  </tbody>
                </table>
              </div>
               @else
              <div class="alert alert-info">{{trans('master.you_have_no_data')}}</div>
              @endif
              <!-- /.card-body -->
              {{$employees->links()}}
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
    </section>
  </div>
  @endsection