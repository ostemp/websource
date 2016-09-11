
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">3D Print Observatory</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">

       <ul class="nav navbar-nav navbar-right">
        <li><a href="/internship/collector/">Add Print</a></li>
        <li><a href="/internship/gallery/">Gallery</a></li> 
        <li><a href="/internship/camoutput/">Live Cam</a></li>

        <?php if(!isset($_SESSION['user'])): ?>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sign In<span class="caret"></span></a>
          <ul class="dropdown-menu">

          <div class="container">
            <form class="navbar-form navbar-right" method="post">
              <div class="form-group">
                <input type="text" name='username' placeholder="Username" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="password" name='password' placeholder="Password" class="form-control" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success">Sign in</button>
              </div>
            </form>
            </ul>
          </div>
        </li>
      <?php else: ?>

        <li><?php echo '<a>'.ucfirst($_SESSION['user']).'</a>' ?></li>
            <form class="navbar-form navbar-right" method="post">
              <div class="form-group">
              <input type="hidden" name="logout" value="true">
                <button type="submit" class="btn btn-danger">Log Out</button>
              </div>
            </form>

      <?php endif; ?>
 
      </ul>
    </div><!--/.navbar-collapse -->
  </div>
</nav>