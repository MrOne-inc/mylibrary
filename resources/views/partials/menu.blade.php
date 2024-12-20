<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }} {{ request()->is("admin/audit-logs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('manage_document_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/types*") ? "menu-open" : "" }} {{ request()->is("admin/add-documents*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/types*") ? "active" : "" }} {{ request()->is("admin/add-documents*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon far fa-file">

                            </i>
                            <p>
                                {{ trans('cruds.manageDocument.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.types.index") }}" class="nav-link {{ request()->is("admin/types") || request()->is("admin/types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-asterisk">

                                        </i>
                                        <p>
                                            {{ trans('cruds.type.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('add_document_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-documents.index") }}" class="nav-link {{ request()->is("admin/add-documents") || request()->is("admin/add-documents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addDocument.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('manage_content_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/image-types*") ? "menu-open" : "" }} {{ request()->is("admin/logos*") ? "menu-open" : "" }} {{ request()->is("admin/content-types*") ? "menu-open" : "" }} {{ request()->is("admin/add-contents*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/image-types*") ? "active" : "" }} {{ request()->is("admin/logos*") ? "active" : "" }} {{ request()->is("admin/content-types*") ? "active" : "" }} {{ request()->is("admin/add-contents*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-compress">

                            </i>
                            <p>
                                {{ trans('cruds.manageContent.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('image_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.image-types.index") }}" class="nav-link {{ request()->is("admin/image-types") || request()->is("admin/image-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-cloudsmith">

                                        </i>
                                        <p>
                                            {{ trans('cruds.imageType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('logo_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.logos.index") }}" class="nav-link {{ request()->is("admin/logos") || request()->is("admin/logos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-images">

                                        </i>
                                        <p>
                                            {{ trans('cruds.logo.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('content_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.content-types.index") }}" class="nav-link {{ request()->is("admin/content-types") || request()->is("admin/content-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-signature">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contentType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('add_content_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.add-contents.index") }}" class="nav-link {{ request()->is("admin/add-contents") || request()->is("admin/add-contents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-plus-circle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.addContent.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-bell">

                            </i>
                            <p>
                                {{ trans('cruds.userAlert.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>