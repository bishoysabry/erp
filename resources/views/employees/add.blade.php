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
              <li class="breadcrumb-item"><a href="{{ url('/employees') }}">{{ trans('master.employees') }}</a></li>
              <li class="breadcrumb-item active">{{ isset($employee)?trans('master.update') :trans('master.add') }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


<form id="addCompany"  class="form-horizontal col-md-8" action='{{ isset($employee) ? route("employees.update","$employee->id") :route("employees.store") }}' role="form" enctype="multipart/form-data" method="post">
<div class="card-body">
	@csrf
	@if ($errors->any())
	<ul>
		@foreach($errors->all() as $error)
		<li class="alert alert-danger">{{$error}}</li>
		@endforeach
	</ul>
	@endif
                  <div class="form-group">
                    <label for="name">{{ trans('master.first_name') }}</label>
                    <input type="text" class="form-control" name="first_name" placeholder="{{ trans('master.enter_first_name') }}" value="{{ isset($employee)?$employee->first_name :''}}">
                  </div>
                   <div class="form-group">
                    <label for="name">{{ trans('master.last_name') }}</label>
                    <input type="text" class="form-control" name="last_name" placeholder="{{ trans('master.enter_last_name') }}" value="{{ isset($employee)?$employee->last_name :''}}">
                  </div>
                  <div class="form-group">
                    <label for="email">{{ trans('master.email') }}</label>
                    <input type="email" name="email" class="form-control"  placeholder="{{ trans('master.email') }} " value="{{ isset($employee)?$employee->email :''}}" >
                  </div>
                   <div class="form-group">
                    <label for="email">{{ trans('master.company') }}</label>
                   <select class="form-control" name="company">
                     @foreach($companies as $company)
                     <option  value="{{$company->id}}" {{isset($employee) && $employee->company == $company->id ? 'selected':''}}>{{$company->name}}</option>
                     @endforeach
                   </select>
                  </div>
                  <div class="form-group">
                    <label for="phone">{{ trans('master.company_phone') }}</label>
                    <div class="input-group">
                        <input type="tel" name="phone" class="form-control" value="{{ isset($employee)?$employee->phone :''}}">
                    </div>
                  </div>
                 
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{ isset($employee)?trans('master.update') :trans('master.add') }}</button>
                </div>
                                      
             </form>

        </div>
    </div>
</section>
</div>
   

@endsection