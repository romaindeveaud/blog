  <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
<!--                <a class="navbar-brand" href="index.html">Start Bootstrap</a> -->

          <ul class="nav navbar-nav navbar-left">
              @if(Auth::check())
              <li>
                <a href="/new-post">Nouveau post</a>
              </li>
              <li>
                <a href="/dashboard">Tableau de bord</a>
              </li>
              <li>
                <a href="/logout">Déconnexion</a>
              </li>
              @endif
          </ul>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
              <li>
                  <a href="/">RA4M.</a>
              </li>
              <li>
                  <a href="/about">À propos</a>
              </li>
<!--
              <li>
                  <a href="post.html">Sample Post</a>
              </li>
              <li>
                  <a href="contact.html">Contact</a>
              </li>
-->
          </ul>
      </div>
      <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
