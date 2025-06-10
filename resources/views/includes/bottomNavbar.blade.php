<div class="dock dock-xl md:hidden">
    <a href="{{ route('home') }}"  class="{{ Request::routeIs('home') ? 'dock-active' : '' }}">
        <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
                <polyline points="1 11 12 2 23 11" fill="none" stroke="currentColor" stroke-miterlimit="10"
                    stroke-width="2"></polyline>
                <path d="m5,13v7c0,1.105.895,2,2,2h10c1.105,0,2-.895,2-2v-7" fill="none" stroke="currentColor"
                    stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
                <line x1="12" y1="22" x2="12" y2="18" fill="none" stroke="currentColor"
                    stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line>
            </g>
        </svg>
        <span class="dock-label">Home</span>
    </a>

    <a href="{{ route('materi') }}"  class="{{ Request::routeIs('materi*') ? 'dock-active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-book size-[1.2em]" viewBox="0 0 16 16">
            <path
                d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
        </svg>
        <span class="dock-label">Materi</span>
    </a>

    <a href="{{ route('about') }}"  class="{{ Request::routeIs('about') ? 'dock-active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            class="bi bi-info-circle size-[1.2em]" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
            <path
                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
        </svg>
        <span class="dock-label">Tentang Kami</span>
    </a>
</div>
