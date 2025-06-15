@php
    $menus = [
        (object) [
            'title' => 'dashboard',
            'path' => '/',

        ],
        (object) [
            'title' => 'products',
            'path' => 'products',

        ],
    ];
@endphp

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
            @foreach ( $menus as $menu )

            <li class="nav-item">
                <a href="{{$menu->path}}" class="nav-link {{Request::is($menu->path) ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{$menu->title}}
                    </p>
                </a>
            </li>
            @endforeach
    </ul>
</nav>
