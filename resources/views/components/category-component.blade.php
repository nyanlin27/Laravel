{{-- <div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
</div> --}}

@foreach($categories as $category)
    <li class="dropdown-submenu">
        <a class="dropdown-item" href="javascript:void(0)">
            {{ $category->name }}
            <i class="icofont-rounded-right float-right"></i>
        </a>
        <ul class="dropdown-menu">
            <h6 class="dropdown-header">
                {{ $category->name }}
            </h6>
            @foreach($category->subcategories as $subcategory)
            <li><a class="dropdown-item" href="#">{{ $subcategory->name }}</a></li>
            @endforeach

        </ul>
    </li>
    <div class="dropdown-divider"></div>
@endforeach
