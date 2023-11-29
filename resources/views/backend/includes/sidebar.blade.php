<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{ asset('assets/images/pjsp-logo.png') }}" class="navbar-brand-img" alt="..." />
            </a>
            <div class="ml-auto">
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-abouts" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-abouts">
                            <i class="ni ni-ungroup text-orange"></i>
                            <span class="nav-link-text">Abouts</span>
                        </a>
                        <div class="collapse" id="navbar-abouts">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('backend.about.content.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> C </span>
                                        <span class="sidenav-normal"> Content Abouts </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.brand.index') }}">
                            <i class="ni ni-chart-pie-35 text-info"></i>
                            <span class="nav-link-text">Brands</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.lang.index') }}">
                            <i class="ni ni-archive-2 text-green"></i>
                            <span class="nav-link-text">Language</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-components">
                            <i class="ni ni-ui-04 text-info"></i>
                            <span class="nav-link-text">Products</span>
                        </a>
                        <div class="collapse" id="navbar-components">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('backend.product.content.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> C </span>
                                        <span class="sidenav-normal"> Contents </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('backend.product.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> M </span>
                                        <span class="sidenav-normal"> Masters </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backend.media.index') }}">
                            <i class="ni ni-archive-2 text-green"></i>
                            <span class="nav-link-text">Media</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-careers" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-careers">
                            <i class="ni ni-calendar-grid-58 text-red"></i>
                            <span class="nav-link-text">Careers</span>
                        </a>
                        <div class="collapse" id="navbar-careers">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('backend.career.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> M </span>
                                        <span class="sidenav-normal"> Masters </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('backend.desccareer.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> D</span>
                                        <span class="sidenav-normal"> Descriptions </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <hr class="my-3" />

            </div>
        </div>
    </div>
</nav>
