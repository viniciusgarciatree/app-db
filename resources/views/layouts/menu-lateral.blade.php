<div class="col-md-1 text-white bg-dark">
  <div class="position-sticky ms-1">
    <a class="d-flex align-items-center m-1 mb-0 mb-md-0 me-md-auto text-white text-decoration-none" href="{{ url('/') }}">
      <i class="bi bi-hdd-rack-fill"></i>  {{ config('app.name', 'Laravel') }}
    </a>
    <hr class="m-1">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active p-1" aria-current="page">
          <i class="bi bi-terminal"></i> Query
        </a>
      </li>
      <li>
        <a href="#" class="nav-link p-1 text-white" aria-current="page">
          <i class="bi bi-hdd-stack-fill"></i> Data Bases
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>
</div>