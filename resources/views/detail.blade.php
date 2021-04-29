@extends('template')

@section('title')
Detail Pojet
@endsection

@section('dark')
@if (Auth::user()->theme == 1)
dark-mode
@endif
@endsection

@section('contenu')

<!-- main header @s -->
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
                                <div class="user-avatar sm" style="">
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
@if ($projects!=null)
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{$projects->libelle}}</h3>
                            <div class="nk-block-des text-soft">
                                <p>{{$projects->description}}</p>
                                <input type="text" class="d-none" id="id_project1" value="{{$projects->id}}">
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"
                                                data-toggle="modal" data-backdrop="static" data-target="#modalForm"
                                                id="bt_show_modal"><em class="icon ni ni-plus"></em><span>Add
                                                    Tasks</span></a>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div id="kanban" class="nk-kanban"></div>

                </div>
            </div>
        </div>
    </div>
</div>


@endif

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
                <h5 class="modal-title">Add Tasks</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="createTache" method="post" class="form-validate is-alter">
                    @csrf
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control d-none" id="id_project" name="id_project" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="name">Libelle</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="libelle" name="libelle" required>
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
                        <label class="form-label" for="couche">Couche de travail</label>
                        <div class="form-control-wrap">
                            <select class="form-select" name="couche" id="couche" required>
                                <option value="Aucun">Autre</option>
                                <option value="Mobile">Backend</option>
                                <option value="Web">Frontend</option>
                            </select>
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
                        <label class="form-label" for="language">Language de programmation</label>
                        <div class="form-control-wrap">
                            <select class="form-select" name="language" id="language" required>
                                <option value="Aucun">Autre</option>
                                <option value="Mobile">C#</option>
                                <option value="Web">ASP</option>
                                <option value="Desktop">PHP</option>
                                <option value="Desktop">CSS</option>
                                <option value="Desktop">JAVASCRIPT</option>
                                <option value="Desktop">HTML</option>
                                <option value="Desktop">JAVA</option>
                                <option value="Desktop">FLUTTER</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit" class="btn btn-lg btn-primary">Save Informations</button>
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

<script type="text/javascript">
    $('#bt_show_modal').click(function () {
        $('#id_project').val($('#id_project1').val());
    });

    !(function (NioApp, $) {
        "use strict";

        // Variable
        var $win = $(window),
            $body = $('body'),
            breaks = NioApp.Break;

        NioApp.Kanban = function () {

            function titletemplate(title, count, optionicon = "more-h") {
                return (`
                <div class="kanban-title-content">
                    <h6 class="title">${title}</h6>
                    <span class="badge badge-pill badge-outline-light text-dark">${count}</span>
                </div>
                <div class="kanban-title-content">
                    <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mr-n1" data-toggle="dropdown"><em class="icon ni ni-${optionicon}"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="link-list-opt no-bdr">
                                <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Board</span></a></li>
                                <li><a href="#"><em class="icon ni ni-plus-sm"></em><span>Add Task</span></a></li>
                                <li><a href="#"><em class="icon ni ni-plus-sm"></em><span>Add Option</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            `)
            }
            var tasks = JSON.parse("@");
            console.log(tasks);
            console.log('{{ $taches }}');
            var b = [];
            "@php $d = 0; @endphp";
            for (var i = 0; i < 5; i++) {
                b.push({
                    'title': '<div class="kanban-item-title"><h6 class="title"></h6><div class="drodown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><div class="user-avatar-group"><div class="user-avatar xs bg-primary"><span>A</span></div></div></a>' +
                        '<div class="dropdown-menu dropdown-menu-right"><ul class="link-list-opt no-bdr p-3 g-2"><li><div class="user-card"><div class="user-avatar sm bg-primary"><span>AB</span></div><div' +
                        'class="user-name"><span class="tb-lead">Abu Bin Ishtiyak</span></div></div></li></ul></div></div></div><div class="kanban-item-text"><p>Update the new UI design for @dashlite template with based on feedback.</p>' +
                        '</div><ul class="kanban-item-tags"><li><span class="badge badge-info">Dashlite</span></li><li><span class="badge badge-warning">UI Design</span></li></ul><div class="kanban-item-meta"><ul class="kanban-item-meta-list"><li class="text-danger">' +
                        '<em class="icon ni ni-calendar"></em><span>2d Due</span></li><li><em class="icon ni ni-notes"></em><span>Design</span></li></ul><ul class="kanban-item-meta-list"><li><em class="icon ni ni-clip"></em><span>1</span></li><li><em class="icon ni ni-comments"></em><span>4</span></li></ul></div>'
                }, );
            }
            // var tab = [{
            //     'title': '1'
            // }, ];
            // var d = [],
            //     taille;
            // $.ajax({
            //     type: 'GET',
            //     url: 'allTaches/{{ $projects->id,}}',
            //     success: function(data) {
            //         //var tab = [];
            //         d = JSON.parse(data);
            //         taille = d.length;
            //         console.log(d.length);
            //         console.log(d);
            //         b.push({
            //             'title': '4'
            //         }, );
            //         for (var i = 0; i < taille; i++) {
            //             tab.push({
            //                 'title': '<div class="kanban-item-title"><h6 class="title">Dashlite Design Kit Update</h6><div class="drodown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><div class="user-avatar-group"><div class="user-avatar xs bg-primary"><span>A</span></div></div></a><div class="dropdown-menu dropdown-menu-right"><ul class="link-list-opt no-bdr p-3 g-2"><li><div class="user-card"><div class="user-avatar sm bg-primary"><span>AB</span></div><div' +
            //                     'class="user-name"><span class="tb-lead">Abu Bin Ishtiyak</span></div></div></li></ul></div></div></div><div class="kanban-item-text"><p>Update the new UI design for @dashlite template with based on feedback.</p></div><ul class="kanban-item-tags"><li><span class="badge badge-info">Dashlite</span></li><li><span class="badge badge-warning">UI Design</span></li></ul><div class="kanban-item-meta"><ul class="kanban-item-meta-list"><li class="text-danger">' +
            //                     '<em class="icon ni ni-calendar"></em><span>2d Due</span></li><li><em class="icon ni ni-notes"></em><span>Design</span></li></ul><ul class="kanban-item-meta-list"><li><em class="icon ni ni-clip"></em><span>1</span></li><li><em class="icon ni ni-comments"></em><span>4</span></li></ul></div>'
            //             }, );
            //             b.push({
            //                 'title': '<div class="kanban-item-title"><h6 class="title">Dashlite Design Kit Update</h6><div class="drodown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><div class="user-avatar-group"><div class="user-avatar xs bg-primary"><span>A</span></div></div></a><div class="dropdown-menu dropdown-menu-right"><ul class="link-list-opt no-bdr p-3 g-2"><li><div class="user-card"><div class="user-avatar sm bg-primary"><span>AB</span></div><div' +
            //                     'class="user-name"><span class="tb-lead">Abu Bin Ishtiyak</span></div></div></li></ul></div></div></div><div class="kanban-item-text"><p>Update the new UI design for @dashlite template with based on feedback.</p></div><ul class="kanban-item-tags"><li><span class="badge badge-info">Dashlite</span></li><li><span class="badge badge-warning">UI Design</span></li></ul><div class="kanban-item-meta"><ul class="kanban-item-meta-list"><li class="text-danger">' +
            //                     '<em class="icon ni ni-calendar"></em><span>2d Due</span></li><li><em class="icon ni ni-notes"></em><span>Design</span></li></ul><ul class="kanban-item-meta-list"><li><em class="icon ni ni-clip"></em><span>1</span></li><li><em class="icon ni ni-comments"></em><span>4</span></li></ul></div>'
            //
            //             }, );
            //         }
            //         return d;
            //     },
            //     error: function(data) {
            //         console.error(data);
            //     }
            // });
            //
            // //console.log(d.length);
            // console.log(d);
            // console.log(b);
            var kanban = new jKanban({
                element: '#kanban',
                gutter: '0',
                widthBoard: '320px',
                responsivePercentage: false,
                boards: [{
                        'id': '_open',
                        'title': titletemplate("Open", "3"),
                        'class': 'kanban-ligter',
                        'item': b,

                        // [{
                        //     'title': `
                        //     <div class="kanban-item-title">
                        //         <h6 class="title">Dashlite Design Kit Update</h6>
                        //         <div class="drodown">
                        //             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        //                 <div class="user-avatar-group">
                        //                     <div class="user-avatar xs bg-primary"><span>A</span></div>
                        //                 </div>
                        //             </a>
                        //             <div class="dropdown-menu dropdown-menu-right">
                        //                 <ul class="link-list-opt no-bdr p-3 g-2">
                        //                     <li>
                        //                         <div class="user-card">
                        //                             <div class="user-avatar sm bg-primary">
                        //                                 <span>AB</span>
                        //                             </div>
                        //                             <div class="user-name">
                        //                                 <span class="tb-lead">Abu Bin Ishtiyak</span>
                        //                             </div>
                        //                         </div>
                        //                     </li>
                        //                 </ul>
                        //             </div>
                        //         </div>
                        //     </div>
                        //     <div class="kanban-item-text">
                        //         <p>Update the new UI design for @dashlite template with based on feedback.</p>
                        //     </div>
                        //     <ul class="kanban-item-tags">
                        //         <li><span class="badge badge-info">Dashlite</span></li>
                        //         <li><span class="badge badge-warning">UI Design</span></li>
                        //     </ul>
                        //     <div class="kanban-item-meta">
                        //         <ul class="kanban-item-meta-list">
                        //             <li class="text-danger"><em class="icon ni ni-calendar"></em><span>2d Due</span></li>
                        //             <li><em class="icon ni ni-notes"></em><span>Design</span></li>
                        //         </ul>
                        //         <ul class="kanban-item-meta-list">
                        //             <li><em class="icon ni ni-clip"></em><span>1</span></li>
                        //             <li><em class="icon ni ni-comments"></em><span>4</span></li>
                        //         </ul>
                        //     </div>
                        // `,
                        // }, {
                        //     'title': `
                        //     <div class="kanban-item-title">
                        //         <h6 class="title">Implement Design into Template</h6>
                        //         <div class="drodown">
                        //             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        //                 <div class="user-avatar-group">
                        //                     <div class="user-avatar xs bg-dark"><span>S</span></div>
                        //                 </div>
                        //             </a>
                        //             <div class="dropdown-menu dropdown-menu-right">
                        //                 <ul class="link-list-opt no-bdr p-3 g-2">
                        //                     <li>
                        //                         <div class="user-card">
                        //                             <div class="user-avatar sm bg-dark">
                        //                                 <span>SD</span>
                        //                             </div>
                        //                             <div class="user-name">
                        //                                 <span class="tb-lead">Sara Dervishi</span>
                        //                             </div>
                        //                         </div>
                        //                     </li>
                        //                 </ul>
                        //             </div>
                        //         </div>
                        //     </div>
                        //     <div class="kanban-item-text">
                        //         <p>Start implementing new design in Coding @dashlite.</p>
                        //     </div>
                        //     <ul class="kanban-item-tags">
                        //         <li><span class="badge badge-info">Dashlite</span></li>
                        //         <li><span class="badge badge-danger">HTML</span></li>
                        //     </ul>
                        //     <div class="kanban-item-meta">
                        //         <ul class="kanban-item-meta-list">
                        //             <li><em class="icon ni ni-calendar"></em><span>15 Dec 2020</span></li>
                        //             <li><em class="icon ni ni-notes"></em><span>Forntend</span></li>
                        //         </ul>
                        //         <ul class="kanban-item-meta-list">
                        //             <li><em class="icon ni ni-comments"></em><span>2</span></li>
                        //         </ul>
                        //     </div>
                        // `,
                        // }, {
                        //     'title': `
                        //     <div class="kanban-item-title">
                        //         <h6 class="title">Dashlite React Version</h6>
                        //         <div class="drodown">
                        //             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        //                 <div class="user-avatar-group">
                        //                     <div class="user-avatar xs bg-blue"><span>C</span></div>
                        //                 </div>
                        //             </a>
                        //             <div class="dropdown-menu dropdown-menu-right">
                        //                 <ul class="link-list-opt no-bdr p-3 g-2">
                        //                     <li>
                        //                         <div class="user-card">
                        //                             <div class="user-avatar sm bg-blue">
                        //                                 <span>CJ</span>
                        //                             </div>
                        //                             <div class="user-name">
                        //                                 <span class="tb-lead">Cooper Jones</span>
                        //                             </div>
                        //                         </div>
                        //                     </li>
                        //                 </ul>
                        //             </div>
                        //         </div>
                        //     </div>
                        //     <div class="kanban-item-text">
                        //         <p>Implement new UI design in react version @dashlite template as soon as possible.</p>
                        //     </div>
                        //     <ul class="kanban-item-tags">
                        //         <li><span class="badge badge-info">Dashlite</span></li>
                        //         <li><span class="badge badge-secondary">React</span></li>
                        //     </ul>
                        //     <div class="kanban-item-meta">
                        //         <ul class="kanban-item-meta-list">
                        //             <li><em class="icon ni ni-calendar"></em><span>5d Due</span></li>
                        //             <li><em class="icon ni ni-notes"></em><span>Forntend</span></li>
                        //         </ul>
                        //         <ul class="kanban-item-meta-list">
                        //             <li><em class="icon ni ni-clip"></em><span>3</span></li>
                        //             <li><em class="icon ni ni-comments"></em><span>5</span></li>
                        //         </ul>
                        //     </div>
                        // `,
                        // }]
                    },
                    {
                        'id': '_in_progress',
                        'title': titletemplate("In Progress", "4"),
                        'class': 'kanban-primary',
                        'item': [{
                                'title': `
                            <div class="kanban-item-title">
                                <h6 class="title">Techyspec Keyword Research</h6>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="user-avatar-group">
                                            <div class="user-avatar xs bg-danger"><span>V</span></div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr p-3 g-2">
                                            <li>
                                                <div class="user-card">
                                                    <div class="user-avatar sm bg-danger">
                                                        <span>VL</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Victoria Lynch</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kanban-item-text">
                                <p>Keyword recarch for @techyspec business profile and there other websites, to improve ranking.</p>
                            </div>
                            <ul class="kanban-item-tags">
                                <li><span class="badge badge-dark">Techyspec</span></li>
                                <li><span class="badge badge-success">SEO</span></li>
                            </ul>
                            <div class="kanban-item-meta">
                                <ul class="kanban-item-meta-list">
                                    <li><em class="icon ni ni-calendar"></em><span>02 Jan 2021</span></li>
                                    <li><em class="icon ni ni-notes"></em><span>Recharch</span></li>
                                </ul>
                                <ul class="kanban-item-meta-list">
                                    <li><em class="icon ni ni-clip"></em><span>31</span></li>
                                    <li><em class="icon ni ni-comments"></em><span>21</span></li>
                                </ul>
                            </div>
                        `,
                            },
                            {
                                'title': `
                            <div class="kanban-item-title">
                                <h6 class="title">Fitness Next Website Design</h6>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="user-avatar-group">
                                            <div class="user-avatar xs bg-pink"><span>P</span></div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr p-3 g-2">
                                            <li>
                                                <div class="user-card">
                                                    <div class="user-avatar sm bg-pink">
                                                        <span>PN</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Patrick Newman</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kanban-item-text">
                                <p>Design a awesome website for @fitness_next new product launch.</p>
                            </div>
                            <ul class="kanban-item-tags">
                                <li><span class="badge badge-primary">Fitness Next</span></li>
                                <li><span class="badge badge-warning">UI Design</span></li>
                            </ul>
                            <div class="kanban-item-meta">
                                <ul class="kanban-item-meta-list">
                                    <li><em class="icon ni ni-calendar"></em><span>8d Due</span></li>
                                    <li><em class="icon ni ni-notes"></em><span>Design</span></li>
                                </ul>
                                <ul class="kanban-item-meta-list">
                                    <li><em class="icon ni ni-clip"></em><span>3</span></li>
                                    <li><em class="icon ni ni-comments"></em><span>5</span></li>
                                </ul>
                            </div>
                        `,
                            }, {
                                'title': `
                            <div class="kanban-item-title">
                                <h6 class="title">Runnergy Website Redesign</h6>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="user-avatar-group">
                                            <div class="user-avatar xs bg-purple">
                                                <span>J</span>
                                            </div>
                                            <div class="user-avatar xs bg-success">
                                                <span>I</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr p-3 g-2">
                                            <li>
                                                <div class="user-card">
                                                    <div class="user-avatar sm bg-purple">
                                                        <span>JH</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Jane Harris</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="user-card">
                                                    <div class="user-avatar sm bg-success">
                                                        <span>IH</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Iliash Hosain</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kanban-item-text">
                                <p>Redesign there old/backdated website new modern and clean look keeping minilisim in mind.</p>
                            </div>
                            <ul class="kanban-item-tags">
                                <li><span class="badge badge-gray">Redesign</span></li>
                                <li><span class="badge badge-primary">Runnergy</span></li>
                            </ul>
                            <div class="kanban-item-meta">
                                <ul class="kanban-item-meta-list">
                                    <li><em class="icon ni ni-calendar"></em><span>10 Jan 2021</span></li>
                                    <li><em class="icon ni ni-notes"></em><span>Design</span></li>
                                </ul>
                                <ul class="kanban-item-meta-list">
                                    <li><em class="icon ni ni-clip"></em><span>12</span></li>
                                    <li><em class="icon ni ni-comments"></em><span>8</span></li>
                                </ul>
                            </div>
                        `,
                            }, {
                                'title': `
                            <div class="kanban-item-title">
                                <h6 class="title">Wordlab Android App</h6>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="user-avatar-group">
                                            <div class="user-avatar xs bg-primary"><span>J</span></div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr p-3 g-2">
                                            <li>
                                                <div class="user-card">
                                                    <div class="user-avatar sm bg-primary">
                                                        <span>JH</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Jane Harris</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kanban-item-text">
                                <p>Wordlab Android App with with react native.</p>
                            </div>
                            <ul class="kanban-item-tags">
                                <li><span class="badge badge-success">Wordlab</span></li>
                                <li><span class="badge badge-light">Android</span></li>
                            </ul>
                            <div class="kanban-item-meta">
                                <ul class="kanban-item-meta-list">
                                    <li><em class="icon ni ni-calendar"></em><span>21 Jan 2021</span></li>
                                    <li><em class="icon ni ni-notes"></em><span>App</span></li>
                                </ul>
                                <ul class="kanban-item-meta-list">
                                    <li><em class="icon ni ni-clip"></em><span>8</span></li>
                                    <li><em class="icon ni ni-comments"></em><span>85</span></li>
                                </ul>
                            </div>
                        `,
                            }
                        ]
                    },
                    {
                        'id': '_to_review',
                        'title': titletemplate("To Review", "2"),
                        'class': 'kanban-warning',
                        'item': [{
                            'title': `
                            <div class="kanban-item-title">
                                <h6 class="title">Oberlo Development</h6>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="user-avatar-group">
                                            <div class="user-avatar xs bg-purple">
                                                <span>A</span>
                                            </div>
                                            <div class="user-avatar xs bg-success">
                                                <span>B</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr p-3 g-2">
                                            <li>
                                                <div class="user-card">
                                                    <div class="user-avatar sm bg-primary">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Abu Bin Ishtiyak</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="user-card">
                                                    <div class="user-avatar sm bg-success">
                                                        <span>BA</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Butler Alan</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kanban-item-text">
                                <p>Complete website development for Oberlo limited.</p>
                            </div>
                            <ul class="kanban-item-tags">
                                <li><span class="badge badge-info">Oberlo</span></li>
                                <li><span class="badge badge-danger">Development</span></li>
                            </ul>
                            <div class="kanban-item-meta">
                                <ul class="kanban-item-meta-list">
                                    <li class="text-danger"><em class="icon ni ni-calendar"></em><span>1d Due</span></li>
                                    <li><em class="icon ni ni-notes"></em><span>Backend</span></li>
                                </ul>
                                <ul class="kanban-item-meta-list">
                                    <li><em class="icon ni ni-clip"></em><span>16</span></li>
                                    <li><em class="icon ni ni-comments"></em><span>25</span></li>
                                </ul>
                            </div>
                        `,
                        }, {
                            'title': `
                            <div class="kanban-item-title">
                                <h6 class="title">IOS app for Getsocio</h6>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="user-avatar-group">
                                            <div class="user-avatar xs bg-pink"><span>P</span></div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr p-3 g-2">
                                            <li>
                                                <div class="user-card">
                                                    <div class="user-avatar sm bg-pink">
                                                        <span>PN</span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">Patrick Newman</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="kanban-item-text">
                                <p>Design and develop app for Getsocio IOS.</p>
                            </div>
                            <ul class="kanban-item-tags">
                                <li><span class="badge badge-dark">Getsocio</span></li>
                                <li><span class="badge badge-light">IOS</span></li>
                            </ul>
                            <div class="kanban-item-meta">
                                <ul class="kanban-item-meta-list">
                                    <li class="text-danger"><em class="icon ni ni-calendar"></em><span>4d Due</span></li>
                                    <li><em class="icon ni ni-notes"></em><span>Forntend</span></li>
                                </ul>
                                <ul class="kanban-item-meta-list">
                                    <li><em class="icon ni ni-clip"></em><span>3</span></li>
                                    <li><em class="icon ni ni-comments"></em><span>5</span></li>
                                </ul>
                            </div>
                        `,
                        }]
                    },
                    {
                        'id': '_completed',
                        'title': titletemplate("Completed", "0"),
                        'class': 'kanban-success',
                        'item': b,
                    }
                ]
            });
            for (var i = 0; i < kanban.options.boards.length; i++) {
                var board = kanban.findBoard(kanban.options.boards[i].id);
                $(board).find("footer").html(
                    `<button class="kanban-add-task btn btn-block" data-toggle="modal" data-backdrop="static" data-target="#modalForm"><em class="icon ni ni-plus-sm"></em><span>Add another task</span></button>`
                );
            }
        };

        NioApp.coms.docReady.push(NioApp.Kanban);

    })(NioApp, jQuery);

</script>
@endsection
