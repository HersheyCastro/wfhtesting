 <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->firstname." ".Auth::user()->lastname }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>{{ Auth::user()->division->division_name }}</a>
            </div>
        </div>