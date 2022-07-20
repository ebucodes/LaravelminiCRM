@extends('layouts.app')

@section('title', 'EbuCodes Mini-CRM App | Employees')

@section('content')
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
            <img src="AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="avatar.png" class="img-circle elevation-2" alt="User Image">
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
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                      <div class="card-header card-title">
                        <div class="d-flex align-items-center">
                          <h2 class="mb-0">All Employees</h2>
                          <div class="ml-auto">
                            <a href="{{ route('employees.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i></a>
                          </div>
                        </div>
                      </div>
                    <div class="card-body">
                        @include('employees/partials/_filter')
                      <table class="table table-striped table-hover table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if ($message = session('message'))
                                <div class="alert alert-success">{{ $message }}</div>
                            @endif
                            @if ($employees->count())
                                @foreach ($employees as $index => $employee)
                                <tr>
                                    <th scope="row">{{ $index + $employees->firstItem() }}</th>
                                    <td>{{ $employee->first_name}}</td>
                                    <td>{{ $employee->last_name}}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td width="150">
                                      <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info" title="Show"><i class="fa fa-eye"></i></a>
                                      <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                      <a href="{{ route('employees.destroy', $employee->id) }}" class="btn-delete btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                  </tr>
                                @endforeach
                                @include('layouts._delete-form')
                            @endif
                        </tbody>
                      </table> 

                      {{ $employees->appends(request()->only('company_id'))->links() }}

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </main>



@endsection