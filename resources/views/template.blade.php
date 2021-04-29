<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>@yield('title')</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{!! asset('assets/css/dashlite.css?ver=2.2.0') !!}">
    <link id="skin-default" rel="stylesheet" href="{!! asset('assets/css/theme.css?ver=2.2.0') !!}">

</head>

<body class="no-touch nk-nio-theme @yield('dark')">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="html/index.html" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x"
                                alt="logo">
                            <img class="logo-dark logo-img" src="./images/logo-dark.png"
                                srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="./images/logo-small.png"
                                srcset="./images/logo-small2x.png 2x" alt="logo-small">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                                class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                            data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Use-Case Preview</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/ecommerce/index.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bag"></em></span>
                                        <span class="nk-menu-text">E-Commerce Panel</span><span
                                            class="nk-menu-badge badge-danger">HOT</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Dashboards</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/index.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-cart-fill"></em></span>
                                        <span class="nk-menu-text">Default</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/index-sales.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em
                                                class="icon ni ni-activity-round-fill"></em></span>
                                        <span class="nk-menu-text">Sales</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/index-analytics.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-growth-fill"></em></span>
                                        <span class="nk-menu-text">Analytics</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Applications</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb-fill"></em></span>
                                        <span class="nk-menu-text">Projects</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/project-card.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Project Cards</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/project-list.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Project List</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">User Manage</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/user-list-default.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">User List - Default</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-list-regular.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">User List - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-list-compact.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">User List - Compact</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-details-regular.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">User Details - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-profile-regular.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">User Profile - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-card.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">User Contact - Card</span> <span
                                                    class="nk-menu-badge badge-warning">New</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-cc-alt2-fill"></em></span>
                                        <span class="nk-menu-text">Orders</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/orders-default.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Order List - Default</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/orders-regular.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Order List - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/orders-sales.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Order List - Sales</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-grid-alt-fill"></em></span>
                                        <span class="nk-menu-text">Applications</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/apps-messages.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Messages</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/apps-inbox.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Inbox / Mail</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/apps-file-manager.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">File Manager</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/apps-chats.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Chats / Messenger</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/apps-calendar.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Calendar</span><span
                                                    class="nk-menu-badge badge-warning">New</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/apps-kanban.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Kanban Board</span><span
                                                    class="nk-menu-badge badge-warning">New</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Misc Pages</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-light-fill"></em></span>
                                        <span class="nk-menu-text">Auth Pages</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/pages/auths/auth-login.html" class="nk-menu-link"
                                                target="_blank"><span class="nk-menu-text">Login / Signin</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/auths/auth-register.html" class="nk-menu-link"
                                                target="_blank"><span class="nk-menu-text">Register / Signup</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/auths/auth-reset.html" class="nk-menu-link"
                                                target="_blank"><span class="nk-menu-text">Forgot Password</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/auths/auth-success.html" class="nk-menu-link"
                                                target="_blank"><span class="nk-menu-text">Success / Confirm</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link nk-menu-toggle"><span
                                                    class="nk-menu-text">Classic Version - v2</span></a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-login-v2.html" class="nk-menu-link"
                                                        target="_blank"><span class="nk-menu-text">Login /
                                                            Signin</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-register-v2.html"
                                                        class="nk-menu-link" target="_blank"><span
                                                            class="nk-menu-text">Register / Signup</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-reset-v2.html" class="nk-menu-link"
                                                        target="_blank"><span class="nk-menu-text">Forgot
                                                            Password</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-success-v2.html" class="nk-menu-link"
                                                        target="_blank"><span class="nk-menu-text">Success /
                                                            Confirm</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link nk-menu-toggle"><span
                                                    class="nk-menu-text">No Slider Version - v3</span></a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-login-v3.html" class="nk-menu-link"
                                                        target="_blank"><span class="nk-menu-text">Login /
                                                            Signin</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-register-v3.html"
                                                        class="nk-menu-link" target="_blank"><span
                                                            class="nk-menu-text">Register / Signup</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-reset-v3.html" class="nk-menu-link"
                                                        target="_blank"><span class="nk-menu-text">Forgot
                                                            Password</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/pages/auths/auth-success-v3.html" class="nk-menu-link"
                                                        target="_blank"><span class="nk-menu-text">Success /
                                                            Confirm</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-files-fill"></em></span>
                                        <span class="nk-menu-text">Error Pages</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/pages/errors/404-classic.html" target="_blank"
                                                class="nk-menu-link"><span class="nk-menu-text">404 Classic</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/errors/504-classic.html" target="_blank"
                                                class="nk-menu-link"><span class="nk-menu-text">504 Classic</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/errors/404-s1.html" target="_blank"
                                                class="nk-menu-link"><span class="nk-menu-text">404 Modern</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/errors/504-s1.html" target="_blank"
                                                class="nk-menu-link"><span class="nk-menu-text">504 Modern</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-files-fill"></em></span>
                                        <span class="nk-menu-text">Other Pages</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/_blank.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Blank / Startup</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/faqs.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Faqs / Help</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/terms-policy.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Terms / Policy</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/regular-v1.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Regular Page - v1</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/pages/regular-v2.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Regular Page - v2</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Components</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                                        <span class="nk-menu-text">Ui Elements</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/alerts.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Alerts</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/accordions.html"
                                                class="nk-menu-link"><span class="nk-menu-text">Accordions</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/badges.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Badges</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/buttons.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Buttons</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/buttons-group.html"
                                                class="nk-menu-link"><span class="nk-menu-text">Button Group</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/breadcrumb.html"
                                                class="nk-menu-link"><span class="nk-menu-text">Breadcrumb</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/cards.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Cards</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/carousel.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Carousel</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/modals.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Modals</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/pagination.html"
                                                class="nk-menu-link"><span class="nk-menu-text">Pagination</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/popover.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Popovers</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/progress.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Progress</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/spinner.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Spinner</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/tabs.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Tabs</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/toast.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Toasts</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/tooltip.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Tooltip</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/elements/typography.html"
                                                class="nk-menu-link"><span class="nk-menu-text">Typography</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link nk-menu-toggle"><span
                                                    class="nk-menu-text">Utilities</span></a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item"><a
                                                        href="html/components/elements/util-border.html"
                                                        class="nk-menu-link"><span
                                                            class="nk-menu-text">Border</span></a></li>
                                                <li class="nk-menu-item"><a
                                                        href="html/components/elements/util-colors.html"
                                                        class="nk-menu-link"><span
                                                            class="nk-menu-text">Colors</span></a></li>
                                                <li class="nk-menu-item"><a
                                                        href="html/components/elements/util-display.html"
                                                        class="nk-menu-link"><span
                                                            class="nk-menu-text">Display</span></a></li>
                                                <li class="nk-menu-item"><a
                                                        href="html/components/elements/util-embeded.html"
                                                        class="nk-menu-link"><span
                                                            class="nk-menu-text">Embeded</span></a></li>
                                                <li class="nk-menu-item"><a
                                                        href="html/components/elements/util-flex.html"
                                                        class="nk-menu-link"><span class="nk-menu-text">Flex</span></a>
                                                </li>
                                                <li class="nk-menu-item"><a
                                                        href="html/components/elements/util-text.html"
                                                        class="nk-menu-link"><span class="nk-menu-text">Text</span></a>
                                                </li>
                                                <li class="nk-menu-item"><a
                                                        href="html/components/elements/util-sizing.html"
                                                        class="nk-menu-link"><span
                                                            class="nk-menu-text">Sizing</span></a></li>
                                                <li class="nk-menu-item"><a
                                                        href="html/components/elements/util-spacing.html"
                                                        class="nk-menu-link"><span
                                                            class="nk-menu-text">Spacing</span></a></li>
                                                <li class="nk-menu-item"><a
                                                        href="html/components/elements/util-others.html"
                                                        class="nk-menu-link"><span
                                                            class="nk-menu-text">Others</span></a></li>
                                            </ul><!-- .nk-menu-sub -->
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dot-box-fill"></em></span>
                                        <span class="nk-menu-text">Crafted Icons</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/components/misc/svg-icons.html" class="nk-menu-link">
                                                <span class="nk-menu-text">SVG Icon - Exclusive</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/misc/nioicon.html" class="nk-menu-link">
                                                <span class="nk-menu-text">Nioicon - HandCrafted</span>
                                            </a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-table-view-fill"></em></span>
                                        <span class="nk-menu-text">Tables</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/components/tables/table-basic.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Basic Tables</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/tables/table-special.html"
                                                class="nk-menu-link"><span class="nk-menu-text">Special
                                                    Tables</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/tables/table-datatable.html"
                                                class="nk-menu-link"><span class="nk-menu-text">DataTables</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-view-group-fill"></em></span>
                                        <span class="nk-menu-text">Forms</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/form-elements.html"
                                                class="nk-menu-link"><span class="nk-menu-text">Form Elements</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/form-layouts.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Form Layouts</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/form-validation.html"
                                                class="nk-menu-link"><span class="nk-menu-text">Form
                                                    Validation</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/forms/form-wizard.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Wizard Basic</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link nk-menu-toggle"><span
                                                    class="nk-menu-text">Rich Editor</span></a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item"><a
                                                        href="html/components/forms/form-summernote.html"
                                                        class="nk-menu-link"><span
                                                            class="nk-menu-text">Summernote</span></a></li>
                                                <li class="nk-menu-item"><a href="html/components/forms/form-quill.html"
                                                        class="nk-menu-link"><span class="nk-menu-text">Quill</span></a>
                                                </li>
                                                <li class="nk-menu-item"><a
                                                        href="html/components/forms/form-tinymce.html"
                                                        class="nk-menu-link"><span
                                                            class="nk-menu-text">Tinymce</span></a></li>
                                            </ul><!-- .nk-menu-sub -->
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-pie-fill"></em></span>
                                        <span class="nk-menu-text">Charts</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/components/charts/chartjs.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Chart JS</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/components/charts/knob.html" class="nk-menu-link"><span
                                                    class="nk-menu-text">Knob JS</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/components/misc/toastr.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-alert-circle-fill"></em></span>
                                        <span class="nk-menu-text">Toastr</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/components/misc/sweet-alert.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-caution-fill"></em></span>
                                        <span class="nk-menu-text">Sweet Alert</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="html/email-templates.html" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tag-alt-fill"></em></span>
                                        <span class="nk-menu-text">Email Template</span>
                                    </a>
                                </li>
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- wrap @s -->
            <div class="nk-wrap ">
                @yield('contenu')
            </div>
        </div>
    </div>

    {{-- Script js --}}
    <script src="{!! asset('assets/js/bundle.js?ver=2.2.0') !!}"></script>
    <script src="{!! asset('assets/js/scripts.js?ver=2.2.0') !!}"></script>
    <script src="{!! asset('assets/js/libs/jkanban.js?ver=2.2.0') !!}"></script>
    {{-- <script src="{!! asset('assets/js/apps/kanban.js?ver=2.2.0') !!}"></script> --}}
    <script src="{!! asset('js/jquery.min.js') !!}"></script>
    @yield('script')
</body>

</html>