<?php

  function print_navbar($profile_picture, $username) {

    include_once 'load_config.php';
    getConfigs();
    
    echo '
    <nav class="navbar navbar-expand-lg bg-dark sticky-top" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="main.php">FileStore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items" aria-controls="navbar-items" aria-expanded="false" aria-label="Toggle Navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>

        <div class="collapse navbar-collapse" id="navbar-items">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="' . $GLOBALS['config']['fileServ_dir'] . 'main.php">Files</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="' . $GLOBALS['config']['photoViewer_dir'] . '">Photos</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">';
              if (is_logged_in()) {
        echo    '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="' . $GLOBALS['config']['fileServ_dir'] . $profile_picture . '" height="25px" width="25px" />&nbsp;&nbsp;' . $username . '
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="' . $GLOBALS['config']['fileServ_dir'] . 'updateUser.php">Settings</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="' . $GLOBALS['config']['fileServ_dir'] . 'logout.php">Log Out</a>
                  </li>
                </ul>';
              } else {
          echo '<a class="nav-link" href="' . $GLOBALS['config']['fileServ_dir'] . 'login.php">Login</a>';
              }
      echo '</li>
          </ul>
        </div>
      </div>
    </nav>
    ';

  }

  function bootstrap_css() {

    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">';

  }

  function bootstrap_js() {

    echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>';

  }

  function check_logged_in() {

    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
          // redirect to your login page
          header('Location: login.php');
    }

  }

  function is_logged_in() {

    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {

      return false;

    } else {

      return true;

    }

  }

  function is_admin() {

    if ($_SESSION['access_level'] > 0) {
      define('ADMIN', true);
    } else {
      define('ADMIN', false);
    }

  } 

  function bytes_to_human_readable($number) {

    if ($number >= 1073741824) {

      return round($number / 1073741824, 2) . 'GiB';

    } elseif ($number >= 1048576) {

      return round($number / 1048576, 2) . 'MiB';

    } elseif ($number >= 1024) {

      return round($number / 1024, 2) . 'KiB';

    } else {

      return round($number, 2) . 'B';

    }


  }

