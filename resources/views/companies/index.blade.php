@extends('layouts.app')

@section('title', 'EbuCodes Mini-CRM App | Companies')

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
                    <a href="{{ route('companies.index') }}" class="nav-link active">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Companies
                    </p>
                    </a>
                </li>
                {{-- Employee --}}
                <li class="nav-item">
                    <a href="{{ route('employees.index') }}" class="nav-link">
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
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Companies</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Companies</li>
                  </ol>
                </div>
              </div>
            </div>
            <!-- /.container-fluid -->
          </section>
          <!-- /.content-header -->
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">New Companies</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                          <a href="{{ route('companies.create') }}" class="btn btn-success">
                              <i class="fa fa-plus-circle"></i> Add New
                          </a>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">List of Companies</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Logo</th>
                          <th scope="col">Company Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Website</th>
                          <th scope="col">Actions</th>
                        </tr>
                        </thead>
                      <tbody>
                        @if ($message = session('message'))
                          <div class="alert alert-success">{{ $message }}</div>
                        @endif
                          @if ($companies->count())
                              @foreach ($companies as $index => $company)
                              <tr>
                                  <th scope="row">{{ $index + $companies->firstItem() }}</th>
                                  <td width="100"> @include('companies._logo')</td>
                                  <td>{{ $company->name }}</td>
                                  <td>{{ $company->email }}</td>
                                  <td>{{ $company->website }}</td>
                                  <td width="150">
                                    <a href="{{ route( 'companies.show', $company->id ) }}" class="btn btn-sm btn-info" title="Show"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route( 'companies.edit', $company->id ) }}" class="btn btn-sm btn-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route( 'companies.destroy', $company->id ) }}" class="btn-delete btn-sm btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                  </td>
                                </tr>
                              @endforeach
                              @include('layouts._delete-form')
                          @endif
                      </tbody>
                      </table>
                      {{ $companies->links() }}
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
        </div>
        <!-- /.content-wrapper -->
<script>
  document.querySelectorAll('.btn-delete').forEach((button)=> {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        if (confirm("Are you sure?")) {
            let action = this.getAttribute('href');
            let form = document.getElementById('form-delete');
            form.setAttribute('action', action);
            form.submit();
        }
    })
})
</script>
@endsection


