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
<div class="nk-header nk-header-fixed nk-header-fluid is-light">
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
            <div class="nk-header-search ml-3 ml-xl-0">
                <em class="icon ni ni-search"></em>
                <input type="text" class="form-control border-transparent form-focus-none"
                    placeholder="Search anything">
            </div><!-- .nk-header-news -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                            <div class="user-toggle">
                                <span style="margin-right: 10px;">{{Auth::user()->name}} {{Auth::user()->surname}}</span>
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
                                    <li><a href="{{ url('profile') }}"><em class="icon ni ni-user-alt"></em><span>Voir le
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
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Fast Projects</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have {{ count($projects) }} project(s).</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"
                                                data-toggle="modal" data-backdrop="static" data-target="#modalForm"><em
                                                    class="icon ni ni-plus"></em><span>Add Project</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        @if (count($projects)>0)
                        @foreach ($projects as $p)
                        <?php
                                                  $input = array("bg-primary", "bg-danger", "bg-warning", "bg-info","bg-purple");
                                                  $rand_keys = array_rand($input, 4);
                                                  $rand = $input[$rand_keys[rand(0,3)]]  ?>
                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="project">
                                        <div class="project-head">
                                            <a href="{!! url('DetailProject/'.$p->id) !!}" class="project-title">
                                                <div class="user-avatar sq {{ $rand }}">
                                                    <span>{{Str::upper($p->libelle[0]."".$p->libelle[1])}}</span></div>
                                                <div class="project-info">
                                                    <h6 class="title">{{ $p->libelle }}</h6>
                                                    <span class="sub-text">{{ $p->type_de_projet }}</span>
                                                </div>
                                            </a>
                                            <div class="drodown">
                                                <a href="#"
                                                    class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1"
                                                    data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{!! url('DetailProject/'.$p->id) !!}"><em
                                                                    class="icon ni ni-eye"></em><span>View
                                                                    Project</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit
                                                                    Project</span></a></li>
                                                        <li><a href="#"><em
                                                                    class="icon ni ni-check-round-cut"></em><span>Mark
                                                                    As Done</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details">
                                            <p>{{ $p->description }}</p>
                                        </div>
                                        @php
                                        $pall = DB::table('tache')->where('project_id','=',$p->id)->count();
                                        $pclose = DB::table('tache')->where('project_id','=',$p->id)->orWhere('status','
                                        <>','Done')->count();
                                            $nbjour =
                                            ceil(abs(strtotime($p->date_fin)-strtotime($p->date_debut))/86400);
                                            @endphp
                                            <div class="project-progress">
                                                <div class="project-progress-details">
                                                    <div class="project-progress-task"><em
                                                            class="icon ni ni-check-round-cut"></em><span>{{$pall}}
                                                            Tasks</span></div>
                                                    <div class="project-progress-percent">
                                                        {{$pclose == 0?0:$pall/$pclose}}%</div>
                                                </div>
                                                <div class="progress progress-pill progress-md bg-light">
                                                    <div class="progress-bar"
                                                        data-progress="{{$pclose == 0?0:$pall/$pclose}}"></div>
                                                </div>
                                            </div>
                                            <div class="project-meta">
                                                <ul class="project-users g-1">
                                                    <li>
                                                        <div class="user-avatar sm bg-primary"><span>A</span></div>
                                                    </li>
                                                    <li>
                                                        <div class="user-avatar sm bg-blue"><img
                                                                src="./images/avatar/b-sm.jpg" alt=""></div>
                                                    </li>
                                                    <li>
                                                        <div class="user-avatar bg-light sm"><span>+12</span></div>
                                                    </li>
                                                </ul>
                                                <span
                                                    class="badge badge-dim badge-{{ $nbjour>$nbjour/2?"success":($nbjour>$nbjour/3?"warning":"danger") }}"><em
                                                        class="icon ni ni-clock"></em><span>{{$nbjour}} Days
                                                        Left</span></span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        @else
                        <div class="text-center">
                            <h1 class="">Aucun projet pour le moment ...</h1>
                        </div>
                        @endif
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
    <!-- content @e -->
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

<div class="modal fade" tabindex="-1" id="modalForm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Project</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="createProject" method="post" class="form-validate is-alter">
                    @csrf
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control d-none" id="id_project" name="id_project" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="name">Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="description">Description</label>
                        <div class="form-control-wrap">
                            <textarea name="description" id="description" class="form-control" rows="5" cols="80"
                                required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="date_debut">Date de début</label>
                        <div class="form-control-wrap">
                            <input type="text" name="date_debut" id="date_debut" class="form-control date-picker"
                                data-date-format="yyyy-mm-dd" value='{{date("Y-m-d")}}' required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="date_fin">Date de fin</label>
                        <div class="form-control-wrap">
                            <input type="text" name="date_fin" id="date_fin" class="form-control date-picker"
                                data-date-format="yyyy-mm-dd" value='{{date("Y-m-d")}}' required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="type">Type de projet</label>
                                     <div class="form-control-wrap">
                            <select class="form-select" name="type" id="type" required>
                                <option value="Aucun">Aucun</option>
                                <option value="Mobile">Mobile</option>
                                <option value="Web">Web</option>
                                <option value="Desktop">Desktop</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <span class="sub-text">Fast Projects</span>
            </div>
        </div>
    </div>
</div>
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
