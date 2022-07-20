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
                    <strong>Add New Employee</strong>
                  </div>           
                  <div class="card-body">
                    <form action="{{ route('employees.store') }}" method="POST">
                      @csrf
                      @include('employees._form')
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>

  @endsection

  @section('title', 'EbuCodes Mini-CRM App | Add New Employee')