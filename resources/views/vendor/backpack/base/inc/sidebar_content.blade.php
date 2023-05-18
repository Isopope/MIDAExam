{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('users') }}"><i class="nav-icon la la-user"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('restaurants') }}"><i class="nav-icon la la-building"></i> Restaurants</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('food') }}"><i class="nav-icon la la-coffee"></i> Food</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('locals') }}"><i class="nav-icon la la-file-photo-o"></i> Locals</a></li>