let appCookies = `
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
                      <a class="nav-link" href="#">About</a>
                  </li>
              </ul>
              <form class="d-flex">
                <input class="form-control me-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
               </form>
              <a href="/user/signin.html">
                  <button class="btn btn-danger">Sign In</button>
              </a>
          
          </div>
      </div>
  </nav>
`;
document.getElementById("app-header").innerHTML = appCookies;
