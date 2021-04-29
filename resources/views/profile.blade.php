@extends('template')

@section('title')
Page d'acceuil
@endsection

@section('dark')
@if (Auth::user()->theme == 1)
dark-mode
@endif
@endsection

@section('contenu')
<!-- main header @s -->
<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                        class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="{{url('')}}" class="logo-link">
                    <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x"
                        alt="logo-dark">
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                            <div class="user-toggle">
                                <span style="margin-right: 10px;">{{Auth::user()->name}}
                                    {{Auth::user()->surname}}<span></span></span>
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <div class="dropdown-inner user-card-wrap bg-lighter">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>
                                            @empty(!Auth::user()->name || !Auth::user()->surname )
                                            {{Str::upper(Auth::user()->name[0])}}{{Str::upper(Auth::user()->surname[0])}}
                                            @endempty</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{Auth::user()->name}} {{Auth::user()->surname}}</span>
                                        <span class="sub-text">{{Auth::user()->email}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="{{ url('profile') }}"><em class="icon ni ni-user-alt"></em><span>Voir
                                                le
                                                Profile</span></a></li>
                                    <li id="dark1"><a class="dark-switch" href="#"><em
                                                class="icon ni ni-moon"></em><span> Mode Dark</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        this.closest('form').submit();"><em
                                                    class="icon ni ni-signout"></em><span>Deconnexion</span></a></li>

                                    </form>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
<!-- main header @e -->
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Information Personnelle</h4>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="nk-data data-list">
                                        <div class="data-head">
                                            <h6 class="overline-title">Basics</h6>
                                        </div>
                                        <div class="data-item" data-toggle="modal" data-target="#name-edit">
                                            <div class="data-col">
                                                <span class="data-label">Nom et Prénom</span>
                                                <span class="data-value">{{Auth::user()->name}}
                                                    {{Auth::user()->surname}}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#email-edit">
                                            <div class="data-col">
                                                <span class="data-label">Email</span>
                                                <span class="data-value">{{Auth::user()->email}}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#phone-edit">
                                            <div class="data-col">
                                                <span class="data-label">Numéro de Téléphone</span>
                                                <span class="data-value text-soft">{{Auth::user()->phone}}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#date-edit">
                                            <div class="data-col">
                                                <span class="data-label">Date de Naissance</span>
                                                <span class="data-value">{{Auth::user()->date_naiss}}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#adresse-edit"
                                            data-tab-target="#address">
                                            <div class="data-col">
                                                <span class="data-label">Adresse</span>
                                                <span class="data-value">{{Auth::user()->adresse}}</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                    </div><!-- data-list -->
                                    <div class="nk-data data-list">
                                        <div class="data-head">
                                            <h6 class="overline-title">Preferences</h6>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col">
                                                <span class="data-label">Language</span>
                                                <span class="data-value">English (United State)</span>
                                            </div>
                                            <div class="data-col data-col-end"><a href="#" data-toggle="modal"
                                                    data-target="#profile-language" class="link link-primary">Change
                                                    Language</a></div>
                                        </div><!-- data-item -->
                                        <div class="data-item">
                                            <div class="data-col">
                                                <span class="data-label">Date Format</span>
                                                <span class="data-value">YYYY-MM-DD</span>
                                            </div>
                                            <div class="data-col data-col-end"><a href="#" data-toggle="modal"
                                                    data-target="#profile-language" class="link link-primary">Change</a>
                                            </div>
                                        </div><!-- data-item -->
                                        <div class="data-item">
                                            <div class="data-col">
                                                <span class="data-label">Timezone</span>
                                                <span class="data-value">Bangladesh (GMT +6)</span>
                                            </div>
                                            <div class="data-col data-col-end"><a href="#" data-toggle="modal"
                                                    data-target="#profile-language" class="link link-primary">Change</a>
                                            </div>
                                        </div><!-- data-item -->
                                    </div><!-- data-list -->
                                </div><!-- .nk-block -->
                            </div>
                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                                data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                <div class="card-inner-group" data-simplebar>
                                    <div class="card-inner">
                                        <div class="user-card">
                                            <div class="user-avatar">
                                                <span>
                                                    @empty(!Auth::user()->name || !Auth::user()->surname )
                                                    {{Str::upper(Auth::user()->name[0])}}{{Str::upper(Auth::user()->surname[0])}}
                                                    @endempty</span>
                                            </div>
                                            <div class="user-info">
                                                <span class="lead-text">{{Auth::user()->name}}
                                                    {{Auth::user()->surname}}</span>
                                                <span class="sub-text">{{Auth::user()->email}}</span>
                                            </div>
                                            <div class="user-action">
                                                <div class="dropdown">
                                                    <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown"
                                                        href="#"><em class="icon ni ni-more-v"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><em
                                                                        class="icon ni ni-camera-fill"></em><span>Change
                                                                        Photo</span></a></li>
                                                            <li><a href="#"><em
                                                                        class="icon ni ni-edit-fill"></em><span>Update
                                                                        Profile</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .user-card -->
                                    </div><!-- .card-inner -->
                                    <div class="card-inner p-0">
                                        <ul class="link-list-menu">
                                            <li><a class="active" href="html/user-profile-regular.html"><em
                                                        class="icon ni ni-user-fill-c"></em><span> Infomation Personelle
                                                    </span></a></li>
                                            <li><a href="html/user-profile-notification.html"><em
                                                        class="icon ni ni-bell-fill"></em><span>Notifications</span></a>
                                            </li>
                                            <li><a href="html/user-profile-activity.html"><em
                                                        class="icon ni ni-activity-round-fill"></em><span>Account
                                                        Activity</span></a></li>
                                            <li><a href="html/user-profile-setting.html"><em
                                                        class="icon ni ni-lock-alt-fill"></em><span>Security
                                                        Settings</span></a></li>
                                        </ul>
                                    </div><!-- .card-inner -->
                                </div><!-- .card-inner-group -->
                            </div><!-- card-aside -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<div class="nk-footer">
    <div class="container-fluid">
        <div class="nk-footer-wrap">
            <div class="nk-footer-copyright"> &copy; 2020 DashLite. Template by <a href="https://softnio.com"
                    target="_blank">Softnio</a>
            </div>
            <div class="nk-footer-links">
                <ul class="nav nav-sm">
                    <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="name-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <form action="{{url('updateName')}}" method="post" class="form-validate is-alter">
                    <h5 class="title">Mise à jour du Profile</h5>
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Nom</label>
                                        <input type="text" class="form-control form-control-lg" required id="full-name"
                                            value="{{Auth::user()->name}}" placeholder="Entrer votre Nom">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="display-name">Prénom</label>
                                        <input type="text" class="form-control form-control-lg" required
                                            id="display-name" value="{{Auth::user()->surname}}"
                                            placeholder="Entrer votre Prénom">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit" class="btn btn-lg btn-primary">Enregistrer</button>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Annuler</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </form>
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="email-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Mise à jour du Profile</h5>
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Email</label>
                                    <input type="email" required class="form-control form-control-lg" id="full-name"
                                        value="{{Auth::user()->email}}" placeholder="Entrer votre Adresse Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <a href="#" class="btn btn-lg btn-primary">Enregistrer</a>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Annuler</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="phone-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Mise à jour du Profile</h5>
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Nméro de Téléphone</label>
                                    <input type="text" class="form-control form-control-lg" id="full-name"
                                        value="{{Auth::user()->phone}}" placeholder="Entrer votre Numéro de Téléphone">
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <a href="#" class="btn btn-lg btn-primary">Enregistrer</a>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Annuler</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="date-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Mise à jour du Profile</h5>
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="date_debut">Date de Naissance</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="date_debut" id="date_debut"
                                            class="form-control date-picker" data-date-format="yyyy-mm-dd"
                                            value='{{Auth::user()->date_naiss}}' required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <a href="#" class="btn btn-lg btn-primary">Enregistrer</a>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Annuler</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="adresse-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Mise à jour du Profile</h5>
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Nom</label>
                                    <textarea rows="5" class="form-control form-control-lg" id="full-name"
                                        value="{{Auth::user()->adresse}}" placeholder="Entrer votre adresse"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <a href="#" class="btn btn-lg btn-primary">Enregistrer</a>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Annuler</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->
@endsection

@section('script')
<script>
    $("#dark1").click(function () {
        $.ajax({
            type: 'GET',
            url: 'changeTheme',
            success: function (data) {

            },
            error: function () {
                console.error(data);
            }
        });
    });

</script>
@endsection
