<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rapyd crud widgets for laravel')</title>
    <meta name="description" content="@yield('description', 'crud widgets for laravel. datatable, grids, forms, in a simple package')" />


    <link href="//fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/policy.css" rel="stylesheet"> 
    <!--[if lt IE 9]>
      <script src="/assets/js/html5shiv.js"></script>
      <script src="/assets/js/respond.min.js"></script>
    <![endif]-->
    <meta name="google-site-verification" content="nnSN8Q-ln625K5sPUL6OACj01almc9Og9xOyNYXs-tU" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="/js/jquery.raty.js"></script>
    <script src="/js/main.js"></script>
    @section('meta')
    @show
    {{ Rapyd::head() }}
  </head>

  <body itemscope itemtype="http://schema.org/WebPage">

  <!-- Google Tag Manager -->
  <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5VL356"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
              new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
              j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
              '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5VL356');</script>
  <!-- End Google Tag Manager -->
  
   <a href="https://github.com/zofe/rapyd-laravel/"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://github-camo.global.ssl.fastly.net/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>
    <div id="wrap">



      <div class="container">
          
          
        <div class="page-header">
            <div class="h1" id="site-title"><a href="{{ URL::to('/') }}">Rapyd</a></div>
            @if (Auth::check() && Auth::user()->is('Super Admin'))
                <div class="pull-right"></div>
            @endif
 
            <nav class="navbar main">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-collapse">
                      <span class="sr-only"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                 </div>
                <div class="collapse navbar-collapse main-collapse">
                    <ul class="nav nav-tabs">
                       <li{{ Site::active('post*') }}><a href="{{ URL::to('post') }}">Posts</a></li>
                       <li{{ Site::active('demo*') }}><a href="{{ URL::to('demo') }}">Demo</a></li>
                       <li><a href="https://github.com/zofe/rapyd-laravel/" target="_blank">Download <i class="fa fa-external-link"></i></a></li>
                        @if (Auth::check() && Auth::user()->is('Super Admin'))
                        <li{{ Site::active('admin*') }}><a href="{{ URL::to('/admin/posts') }}">Admin</a></li>
                       @endif
          
                    </ul>
                </div>
            </nav>
          
        </div>
          
          
          
        <div class="row">
          
          <div class="col-md-8 col-sm-12">
              
              
             @yield('content')
              

              
          </div>
          
          
          <div class="col-md-4 col-sm-12">
              
              

            @section('sidebar')

            <iframe allowtransparency="true" frameborder="0" scrolling="no" seamless="seamless" src="https://cdoyle.me/gh-activity/gh-activity.html?user=zofe&repo=rapyd-laravel&type=repo" width="100%" height="400"></iframe>

            @show
               
               
          </div>
          

          
        </div>
          
          
        <br />
        <!-- AddThis Button BEGIN -->
        <div class="addthis_toolbox addthis_default_style ">
        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
        <a class="addthis_button_tweet"></a>
        </div>
        <!-- AddThis Button END -->
      </div>
      
      
      
     

          
    </div>

    <div id="footer">
      <div class="container">
          
          <div class="pull-left"><small>&copy; 2006-{{ date('Y') }} rapyd.com - Felice Ostuni | <a href="{{ route('cookie') }}">cookie policy</a></small></div>
          <div class="pull-right"><small>powered by laravel & rapyd</small></div>

          
         <br />
         <br />
      </div>
    </div>



    {{--<script src="/assets/js/holder.js"></script> --}}
    {{--<script src="/assets/js/ekko-lightbox.js"></script> --}}



  <div class="privacy-overlay">
      <div class="privacy-modal"></div>
  </div>
  <script src="/js/policy.js"></script> 

  </body>
</html>

