<div>
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{route('admin.dashboard')}}" class="app-brand-link">
              <img src="{{asset('backend/assets/DreamMart.svg')}}" class="app-brand-logo demo" />
          </a>
        </div>
    
        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : ''}}">
            <a href="{{route('admin.dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
          </li>
      
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">management</span>
        </li>
            <!-- Products -->
          <li class="menu-item {{ request()->routeIs('product.add') || request()->routeIs('product.view') ? 'active' : ''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Products">Products</div>
              </a>
      
              <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('product.add') ? 'active' : ''}}">
                  <a href="{{route('product.add')}}" class="menu-link">
                      <div data-i18n="Add Product">Add Product</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('product.view') ? 'active' : ''}}">
                  <a href="{{route('product.view')}}" class="menu-link">
                      <div data-i18n="View Product">View Product</div>
                    </a>
                </li>
              </ul>
          </li>

         
          <!-- Categories -->
          <li class="menu-item {{ request()->routeIs('categories.view') ? 'active' : ''}}">
            <a href="{{route('categories.view')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category-alt"></i>
                <div data-i18n="Analytics">View Categories</div>
              </a>
          </li>

         
          <!-- Role Managment -->
          <li class="menu-item {{ request()->routeIs('role.*') ? 'active' : ''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Roles">Manage Roles</div>
              </a>
      
              <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('role.view') ? 'active' : ''}}">
                  <a href="{{route('role.view')}}" class="menu-link">
                      <div data-i18n="View Role">View Roles</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('role.add') ? 'active' : ''}}">
                  <a href="{{route('role.add')}}" class="menu-link">
                      <div data-i18n="Add Role">Add Role</div>
                    </a>
                </li>
                
              </ul>
          </li>
          
      
          
        </ul>
      </aside>
</div>