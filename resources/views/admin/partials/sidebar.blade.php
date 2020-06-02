<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <!-- Sidebar user panel -->
            @include('admin.partials.userpanel')
            
            @if(Guard::allows('dashboard55_access'))
                <li class="treeview @if(Request::segment(2) == 'dashboard55' ) active menu-open @endif"  >
                    <a href="{{ route('admin.dashboard55.index') }}">
                        <i class="fa fa-dashboard"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
            @endif
           
            
@if(Guard::allows('strategicobjectives55_access'))
                <li class="treeview @if(Request::segment(2) == 'strategicobjectives55' ) active menu-open @endif"  >
                    <a href="{{ route('admin.strategicobjectives55.index') }}">
                        <i class="fa fa-archive"></i>
                        <span class="title">Strategic Objectives</span>
                    </a>
                </li>
            @endif
@if(Guard::allows('successindicators55_access'))
                <li class="treeview @if(Request::segment(2) == 'successindicators55' ) active menu-open @endif"  >
                    <a href="{{ route('admin.successindicators55.index') }}">
                        <i class="fa fa-align-justify"></i>
                        <span class="title">Success Indicators</span>
                    </a>
                </li>
            @endif
            @if(Guard::allows('ipcr55_access'))
                <li class="treeview @if(Request::segment(2) == 'ipcr55' ) active menu-open @endif"  >
                    <a href="{{ route('admin.ipcr55.index') }}">
                        <i class="fa fa-bar-chart"></i>
                        <span class="title">Workplan</span>
                    </a>
                </li>
            @endif
             @if(Guard::allows('ipcr55_access'))
                <li class="treeview @if(Request::segment(2) == 'accomplishments' ) active menu-open @endif"  >
                    <a href="{{ route('admin.indexaccomplishments') }}">
                        <i class="fa fa-bullseye"></i>
                        <span class="title">Accomplishments</span>
                    </a>
                </li>
            @endif
             @if(Auth::user()->roles55_id=="4" || Auth::user()->roles55_id=="6" || Auth::user()->roles55_id=="7" )
                           <li class="treeview @if(Request::segment(2) == 'indexdivision' ) active menu-open @endif"  >
                    <a href="{{ route('admin.indexdivision') }}">
                        <i class="fa fa-archive"></i>
                        <span class="title">Division IPCR</span>
                    </a>
                </li>
            @endif
            @if(Auth::user()->roles55_id=="4" || Auth::user()->roles55_id=="6" || Auth::user()->roles55_id=="7" )
                           <li class="treeview @if(Request::segment(2) == 'divisionaccomplishment' ) active menu-open @endif"  >
                    <a href="{{ route('admin.divisionaccomplishment') }}">
                        <i class="fa fa-archive"></i>
                        <span class="title">Division Accomplishment</span>
                    </a>
                </li>
            @endif
@if(Guard::allows('targets55_access'))
                <li class="treeview @if(Request::segment(2) == 'targets55' ) active menu-open @endif"  >
                    <a href="{{ route('admin.targets55.index') }}">
                        <i class="fa fa-hourglass-start"></i>
                        <span class="title">Targets</span>
                    </a>
                </li>
            @endif
@if(Guard::allows('tasks55_access'))
                <li class="treeview @if(Request::segment(2) == 'tasks55' ) active menu-open @endif"  >
                    <a href="{{ route('admin.tasks55.index') }}">
                        <i class="fa fa-tasks"></i>
                        <span class="title">Tasks</span>
                    </a>
                </li>
            @endif
@if(Guard::allows('files55_access'))
                <li class="treeview @if(Request::segment(2) == 'files55' ) active menu-open @endif"  >
                    <a href="{{ route('admin.files55.index') }}">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Files</span>
                    </a>
                </li>
            @endif
@if(Guard::allows('division55_access'))
                <li class="treeview @if(Request::segment(2) == 'division55' ) active menu-open @endif"  >
                    <a href="{{ route('admin.division55.index') }}">
                        <i class="fa fa-tags"></i>
                        <span class="title">Division</span>
                    </a>
                </li>
            @endif
@if(Guard::allows('status55_access'))
                <li class="treeview @if(Request::segment(2) == 'status55' ) active menu-open @endif"  >
                    <a href="{{ route('admin.status55.index') }}">
                        <i class="fa fa-bullseye"></i>
                        <span class="title">Status</span>
                    </a>
                </li>
            @endif
@if(Guard::allows('divisionindicators55_access'))
                <li class="treeview @if(Request::segment(2) == 'divisionindicators55' ) active menu-open @endif"  >
                    <a href="{{ route('admin.divisionindicators55.index') }}">
                        <i class="fa fa-adjust"></i>
                        <span class="title">Division Indicators</span>
                    </a>
                </li>
            @endif
@if(Guard::allows('tasksusers55_access'))
                <li class="treeview @if(Request::segment(2) == 'tasksusers55' ) active menu-open @endif"  >
                    <a href="{{ route('admin.tasksusers55.index') }}">
                        <i class="fa fa-stack-exchange"></i>
                        <span class="title">Tasks Users</span>
                    </a>
                </li>
            @endif
@if(Guard::allows('settings255_access'))
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i>
                        <span class="title">Settings</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                    @if(Guard::allows('permissions55_access'))
                        <li class="@if(Request::segment(2) == 'permissions55' ) active active-sub @endif">
                            <a href="{{ route('admin.permissions55.index') }}">
                                <i class="fa fa-key"></i>
                                <span class="title">Permissions</span>
                            </a>
                        </li>
                    @endif
                    @if(Guard::allows('modules55_access'))
                        <li class="@if(Request::segment(2) == 'modules55' ) active active-sub @endif">
                            <a href="{{ route('admin.modules55.index') }}">
                                <i class="fa fa-puzzle-piece"></i>
                                <span class="title">Modules</span>
                            </a>
                        </li>
                    @endif
                    @if(Guard::allows('roles55_access'))
                        <li class="@if(Request::segment(2) == 'roles55' ) active active-sub @endif">
                            <a href="{{ route('admin.roles55.index') }}">
                                <i class="fa fa-black-tie"></i>
                                <span class="title">Roles</span>
                            </a>
                        </li>
                    @endif
                    @if(Guard::allows('users55_access'))
                        <li class="@if(Request::segment(2) == 'users55' ) active active-sub @endif">
                            <a href="{{ route('admin.users55.index') }}">
                                <i class="fa fa-users"></i>
                                <span class="title">Users</span>
                            </a>
                        </li>
                    @endif
                    </ul>
                </li>
            @endif


              @if(Gate::allows('user_management_access'))
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-users"></i>
                                    <span class="title">User Management</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">

                                @if(Gate::allows('role_access'))
                                <li class="{{Request::segment(2) == 'roles' ? 'active active-sub' : '' }}">
                                        <a href="{{ route('admin.roles.index') }}">
                                            <i class="fa fa-briefcase"></i>
                                            <span class="title">
                                                Roles
                                            </span>
                                        </a>
                                    </li>
                                @endif
                                @if(Gate::allows('user_access'))
                                <li class="{{ Request::segment(2) == 'users' ? 'active active-sub' : '' }}">
                                        <a href="{{ route('admin.users.index') }}">
                                            <i class="fa fa-user"></i>
                                            <span class="title">
                                               Users
                                            </span>
                                        </a>
                                    </li>
                                @endif
                                </ul>
                            </li>
                        @endif

<!-- 
                        <li class="{{  (Request::path() == 'change_password')? 'active' : ''}}">
                            <a href="{{ route('auth.change_password') }}">
                                <i class="fa fa-key"></i>
                                <span class="title">Change Password</span>
                            </a>
                        </li> -->

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>