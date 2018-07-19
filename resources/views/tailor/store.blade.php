@extends('layouts.tailor')

@section('title')
    {{$store->name ?? 'Unknown Store'}}
@endsection

@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">{{$store->name ?? 'Unknown Store'}}<br><small> <em>by {{$store->tailor->firstname}} {{$store->tailor->lastname}}</em></small></h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Cards</li>
                        </ol>
                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <div class="col-12">
                    <h4 class="d-inline">Card with Image <a href="#code1" data-toggle="collapse"><i class="fa fa-code" data-toggle="tooltip" title="Get code"></i></a></h4>
                    <p class="text-muted m-t-0">For the code click on above code icon</p>
                    <div id="code1" class="collapse">
                        <div class="highlight">
                                <pre>    <code><span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card"</span> <span class="na">style=</span><span class="s">"width: 20rem;"</span><span class="nt">&gt;</span>
      <span class="nt">&lt;img</span> <span class="na">class=</span><span class="s">"card-img-top"</span> <span class="na">src=</span><span class="s">"..."</span> <span class="na">alt=</span><span class="s">"Card image cap"</span><span class="nt">&gt;</span>
      <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-body"</span><span class="nt">&gt;</span>
        <span class="nt">&lt;h4</span> <span class="na">class=</span><span class="s">"card-title"</span><span class="nt">&gt;</span>Card title<span class="nt">&lt;/h4&gt;</span>
        <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"card-text"</span><span class="nt">&gt;</span>Some quick example text to build on the card title and make up the bulk of the card's content.<span class="nt">&lt;/p&gt;</span>
        <span class="nt">&lt;a</span> <span class="na">href=</span><span class="s">"#"</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span class="nt">&gt;</span>Go somewhere<span class="nt">&lt;/a&gt;</span>
      <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;/div&gt;</span></code>
</pre>
                        </div>
                    </div>
                    <!-- Row -->
                    <div class="row">
                       <!-- column -->
                        <div class="col-lg-3 col-md-6 img-responsive">
                            <!-- Card -->
                            <div class="card">
                                <img class="card-img-top img-responsive" src="{{ asset('assets/images/big/img4.jpg') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- column -->
                    </div>
                    <!-- Row -->
                </div>
            </div>
            <!-- End Row -->

            <!-- Row -->
            <div class="row">
                <div class="col-12 m-t-30">
                    <h4 class="m-b-0">Header and footer</h4>
                    <p class="text-muted m-t-0 font-12">Add an optional header and/or footer within a card. <code class="btn btn-sm" href="#code3" data-toggle="collapse">HTML <i class="fa fa-code"></i></code></p>
                    <div id="code3" class="collapse highlight">
                            <pre><code class="language-html" data-lang="html">
                            <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card text-center"</span><span class="nt">&gt;</span>
                              <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-header"</span><span class="nt">&gt;</span>
                                Featured
                              <span class="nt">&lt;/div&gt;</span>
                              <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-body"</span><span class="nt">&gt;</span>
                                <span class="nt">&lt;h4</span> <span class="na">class=</span><span class="s">"card-title"</span><span class="nt">&gt;</span>Special title treatment<span class="nt">&lt;/h4&gt;</span>
                                <span class="nt">&lt;p</span> <span class="na">class=</span><span class="s">"card-text"</span><span class="nt">&gt;</span>With supporting text below as a natural lead-in to additional content.<span class="nt">&lt;/p&gt;</span>
                                <span class="nt">&lt;a</span> <span class="na">href=</span><span class="s">"#"</span> <span class="na">class=</span><span class="s">"btn btn-primary"</span><span class="nt">&gt;</span>Go somewhere<span class="nt">&lt;/a&gt;</span>
                              <span class="nt">&lt;/div&gt;</span>
                              <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"card-footer text-muted"</span><span class="nt">&gt;</span>
                                2 days ago
                              <span class="nt">&lt;/div&gt;</span>
                            <span class="nt">&lt;/div&gt;</span></code></pre>
                    </div>
                    <!-- Card -->
                    <div class="card text-center">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void(0)" class="btn btn-info">Go somewhere</a>
                        </div>
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
                    <!-- Card -->
                </div>
            </div>
            <!-- End Row -->



            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    @endsection

