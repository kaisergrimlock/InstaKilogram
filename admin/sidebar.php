<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title> Dashboard</title>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/JavaScript">
        $(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
    });
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>InstaKilogram</h3>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Users</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="crud.php">Users Management</a>
                        </li>
                        <li>
                            <a href="search.php">Search User</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="post.php">Images</a>
                </li>
                <li>
                    <a href="#section-dropdown1">Analytics</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="logout.php" class="download">Log Out</a>
                </li>
                <li>
                    <a href="/InstaKilogram/user/signin.php" class="article">Log In</a>
                </li>
            </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-align-justify"></i>
                    </button>
                </div>
            </nav>