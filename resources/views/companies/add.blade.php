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
              <li class="breadcrumb-item"><a href="{{ url('/companies') }}">{{ trans('master.companies') }}</a></li>
              <li class="breadcrumb-item active">{{ isset($company)?trans('master.update') :trans('master.add') }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


<form id="addCompany" method="post" class="form-horizontal col-md-8" action='{{ isset($company) ? route("companies.update","$company->id") :route("companies.store") }}' role="form" enctype="multipart/form-data">
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
                    <label for="name">{{ trans('master.company_name') }}</label>
                    <input type="text" class="form-control" name="name" placeholder="{{ trans('master.enter_company_name') }}" value="{{ isset($company)?$company->name :''}}">
                  </div>
                  <div class="form-group">
                    <label for="email">{{ trans('master.email') }}</label>
                    <input type="email" name="email" class="form-control"  placeholder="{{ trans('master.email') }}" value="{{ isset($company)?$company->email :''}}">
                  </div>
                   <div class="form-group">
                    <label for="email">{{ trans('master.website') }}</label>
                    <input type="text" name="website" class="form-control"  placeholder="{{ trans('master.website') }}" value="{{ isset($company)?$company->website :''}}">
                  </div>
                  <div class="form-group">
                    <label for="logo">{{ trans('master.company_logo') }}</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="logo" class="custom-file-input" id="logo">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                 
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{ isset($company)?trans('master.update') :trans('master.add') }}</button>
                </div>
                                      
             </form>

        </div>
    </div>
</section>
</div>
   

@endsection