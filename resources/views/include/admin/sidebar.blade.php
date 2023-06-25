  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{asset('image/food-logo-2.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('image/no-user.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->username}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">DASHBOARD</li>
            @if (auth()->check() && auth()->user()->role->role == 'admin')
                <li class="nav-item">
                    <a href="{{route('slider.index')}}" class="nav-link" id="slider">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Slider
                        </p>
                    </a>
                </li>
                <li class="nav-item" id="products">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-gift"></i>
                        <p>
                            Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="product-item">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product Items</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/product-size" class="nav-link" id="product-size">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product Sizes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" id="vendors">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Vendors
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('approvedVendorIndex')}}" class="nav-link" id="approved-vendors">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Approved Vendors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('pendingVendorIndex')}}" class="nav-link" id="pending-vendors">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Vendors</p>
                            </a>
                        </li>
                    </ul>
                </li>

            @elseif (auth()->check() && auth()->user()->role->role == 'vendor')
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Welcome
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('product.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-gift"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
            @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>