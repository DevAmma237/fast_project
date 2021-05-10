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

{{-- <script type="text/javascript">
@if (count($errors) > 0)
    $('#password-edit').modal('show');
@endif
</script> --}}
<!-- main header @s -->
@if (count($errors) > 0)
    <script type="text/javascript">
        $(document).ready(function() {
            //  $('#password_edit').modal('show');
            console.log(1);
        });
    </script>
    @php
        //dd($errors->first('current_password'));
    @endphp
    @php

    dd(1);
    @endphp
    @else
  @endif
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
                                            <h4 class="nk-block-title">Security Settings</h4>
                                            <div class="nk-block-des">
                                                <p>These settings are helps you keep your account secure.</p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card">
                                        <div class="card-inner-group">
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Save my Activity Logs</h6>
                                                        <p>You can save your all activity logs including unusual
                                                            activity detected.</p>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <ul class="align-center gx-3">
                                                            <li class="order-md-last">
                                                                <div class="custom-control custom-switch mr-n2">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        checked="" id="activity-log">
                                                                    <label class="custom-control-label"
                                                                        for="activity-log"></label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>Change Password</h6>
                                                        <p>Mettez un mot de passe unique et composer de charactères
                                                            alphabetique, numérique et speciaux afin de mieux protéger
                                                            votre compte.</p>
                                                    </div>
                                                    <div class="nk-block-actions flex-shrink-sm-0">
                                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                            <li class="order-md-last">
                                                                <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#password_edit">Change
                                                                    Password</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                    <div class="nk-block-text">
                                                        <h6>2 Factor Auth &nbsp; <span
                                                                class="badge badge-success ml-0">Enabled</span></h6>
                                                        <p>Secure your account with 2FA security. When it is activated
                                                            you will need to enter not only your password, but also a
                                                            special code using app. You can receive this code by in
                                                            mobile app. @if ($errors->has('current_password'))
                                                            <span>{{$errors->first('current_assword')}}</span>
                                                            @endif</p>
                                                    </div>
                                                    <div class="nk-block-actions">
                                                        <a href="#" class="btn btn-primary">Disable</a>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div><!-- .card-inner -->



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
                                            <li><a href="/profile"><em class="icon ni ni-user-fill-c"></em><span>
                                                        Infomation Personelle
                                                    </span></a></li>
                                            <li><a href="html/user-profile-notification.html"><em
                                                        class="icon ni ni-bell-fill"></em><span>Notifications</span></a>
                                            </li>
                                            <li><a href="html/user-profile-activity.html"><em
                                                        class="icon ni ni-activity-round-fill"></em><span>Account
                                                        Activity</span></a></li>
                                            <li><a class="active" href="/profile/security"><em
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

<div class="modal fade" tabindex="-1" role="dialog" id="password_edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <form action="{{url('/profile/changepassword')}}" method="post" class="form-validate is-alter">
                    @csrf
                    <h5 class="title">Mise à jour du Profile</h5>
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Ancien mot de passe</label>
                                        <input type="password" name="current_password" autocomplete="current-password"
                                            class="form-control form-control-lg" id="current_password"
                                            placeholder="Entrez votre mot de passe actuel." required
                                            value="{{old('current_password')}}">
                                        @error('current_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Nouveau mot de passe</label>
                                        <input type="password" name="password" autocomplete="password"
                                            class="form-control form-control-lg" id="password"
                                            placeholder="Entrez le nouveau mot de passe." required
                                            value="{{old('password')}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Confirmation nouveau mot de
                                            passe</label>
                                        <input type="password" name="confirm_password" autocomplete="confirm-password"
                                            class="form-control form-control-lg" id="confirm_password"
                                            placeholder="Confirmer le nouveau mot de passe." required
                                            value="{{old('confirm-password')}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit" id="password_submit"
                                                class="btn btn-lg btn-primary">Enregistrer</button>
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

                {{-- <x-app-layout>
                    <div>
                        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.update-password-form')
                            </div>

                            <x-jet-section-border />
                            @endif
                        </div>
                    </div>
                </x-app-layout> --}}

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
            success: function (data) {},
            error: function () {
                console.error(data);
            }
        });
    });

    // $("#password_submit").click(function (e) {
    //     e.preventDefault();
    //     $.ajax({
    //         type: 'POST',
    //         url: '/profile/changepassword',
    //         success: function (data) {
    //             console.log(date);
    //         },
    //         error: function () {
    //             console.error(data);
    //         }
    //     });
    // });

</script>
@endsection
