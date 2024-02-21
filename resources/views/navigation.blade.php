<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home.page') }}">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home.page') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('shop.page') }}">Shop</a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cart.page') }}">Cart</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('about.page') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact.page') }}">Contact</a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('test.page') }}">Test</a>
            </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admin
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('admin.contact.all.page') }}">allContacts</a></li>
              <li><a class="dropdown-item" href="{{ route('admin.product.all.page') }}">allProducts</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ route('welcome') }}">Welcome</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
