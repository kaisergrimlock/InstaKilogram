let appHeader = `
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
    <img src="../images/logo1.jpeg" style="width:100px">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
          <div class="collapse navbar-collapse" id="navbarColor02">
              <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                      <a class="nav-link active" href="../index.html">Home
                          <span class="visually-hidden">(current)</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#"></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Pricing</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                          <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                  </li>
              </ul>
              <a href="/user/register.html">
                  <button class="btn btn-danger">Register</button>
              </a>
              <a href="/user/signin.html">
                  <button class="btn btn-danger">Sign In</button>
              </a>
          
          </div>
      </div>
  </nav>
`;
document.getElementById("app-header").innerHTML = appHeader;



         
       