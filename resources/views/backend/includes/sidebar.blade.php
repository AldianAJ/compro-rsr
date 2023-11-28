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
                        <a class="nav-link" href="{{ route('backend.career.index') }}">
                            <i class="ni ni-calendar-grid-58 text-red"></i>
                            <span class="nav-link-text">Career</span>
                        </a>
                    </li>
                </ul>

                <hr class="my-3" />

                {{-- <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Documentation</span>
                    <span class="docs-mini">D</span>
                </h6>

                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link" href="../../docs/getting-started/overview.html" target="_blank">
                            <i class="ni ni-spaceship"></i>
                            <span class="nav-link-text">Getting started</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../docs/foundation/colors.html" target="_blank">
                            <i class="ni ni-palette"></i>
                            <span class="nav-link-text">Foundation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../docs/components/alerts.html" target="_blank">
                            <i class="ni ni-ui-04"></i>
                            <span class="nav-link-text">Components</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../docs/plugins/charts.html" target="_blank">
                            <i class="ni ni-chart-pie-35"></i>
                            <span class="nav-link-text">Plugins</span>
                        </a>
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>
</nav>
