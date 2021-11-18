<nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container-fluid">
      <a class="pr-5 navbar-brand" href="#"><img src="/images/logo.png" alt="Logo-image"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="pr-4 fs-4 nav-link active" aria-current="page" href="/">Home</a>
          <a class="pr-4 fs-4 nav-link active" href="/findTutor"> Find Tutor</a>
          <a class="pr-4 fs-4 nav-link active" href="/findLearner">Find Learner</a>
          {{-- <a class="fs-4 nav-link active" href="faq's.html">FAQ's</a> --}}

        </div>

        <div class="navbar-nav ms-auto mb-2 mb-lg-0">
          <i class="text-light fs-4 mt-3 fas fa-user-plus"></i>

            <li class="pr-4 nav-item dropdown">

              <a class="text-light fs-4 nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                SignUp
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/tutor/register">Sign Up as Tutor</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/learner/register">Sign Up as Learner</a></li>
              </ul>
            </li>
            <i class="text-light fs-4 mt-3 fas fa-sign-in-alt"></i>
            <li class="nav-item dropdown">
              <a class="text-light fs-4 nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Login
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/tutor/login">Login as Tutor</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/learner/login">Login as Learner</a></li>
              </ul>
            </li>
        </div>
      </div>
    </div>
  </nav>
