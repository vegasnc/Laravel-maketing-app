 <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li class="sidebar-item active ">
                <a href="{{ route('home') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="sidebar-item">
                <a href="{{ route('barang.index') }}" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Data Barang</span>
                </a>
             <!--    <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="component-alert.html">Alert</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="component-badge.html">Badge</a>
                    </li>
                </ul> -->
            </li>
             <li class="sidebar-item">
                <a href="{{ route('member.index') }}" class='sidebar-link'>
                    <i class="bi bi-people"></i>
                    <span>Data Member</span>
                </a>
            </li>
             <li class="sidebar-item">
                <a href="{{ route('payouts.index') }}" class='sidebar-link'>
                    <i class="bi bi-basket-fill"></i>
                    <span>Payout</span>
                </a>
            </li>
             <li class="sidebar-item">
                <a href="{{ route('growth.index') }}" class='sidebar-link'>
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>FP-Growth</span>
                </a>
            </li>
            <li class="sidebar-item has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person-circle"></i>
                    <span>User</span>
                </a>
                  <ul class="submenu">
                    <li class="submenu-item ">
                        <a href="#">Profile</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('logout') }}">Lagout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>