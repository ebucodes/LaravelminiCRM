@extends('layouts.app')

@section('content')
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
            <img src="../AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="../avatar.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="#" class="d-block">Naruto Uzumaki</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ url('/') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                    </a>
                </li>
                {{-- Companies --}}
                <li class="nav-item">
                    <a href="{{ route('companies.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Companies
                    </p>
                    </a>
                </li>
                {{-- Employee --}}
                <li class="nav-item">
                    <a href="{{ route('employees.index') }}" class="nav-link active">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                       Employees
                    </p>
                    </a>
                </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
<main class="content-wrapper">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Company Details</strong>
            </div>           
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="first_name" class="col-md-3 col-form-label">Company Name</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $company->name }}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="last_name" class="col-md-3 col-form-label">Email</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $company->email }}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label">Website</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $company->website }}</p>
                    </div>
                  </div>
                  <div class="logo-wrapper">
                    <img class="company-image" src="{{ $company->logo ? asset('storage/' . $company->logo) : 'http://via.placeholder.com/100x100'  }}"  alt="..." style="">
                  </div>
                  <hr>
                  <div class="form-group row mb-0">
                    <div class="col-md-9 offset-md-3">
                        {{-- <a href="{{ route('companies.edit', $company->id ) }}" class="btn btn-info">Edit</a>
                        <a href="{{ route('companies.destroy', $company->id) }}" class="btn-delete btn btn-outline-danger">Delete</a> --}}
                        <a href="{{ route('companies.index')}}" class="btn btn-secondary">Cancel</a>

                        {{-- @include('layouts._delete-form') --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  @endsection

  @section('title', 'CRM App | Company Details')