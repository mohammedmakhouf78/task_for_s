<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Task1</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('checkoutPage')}}">Checkout Page</a></li>
        <li><a class="dropdown-item" href="{{route('transactionsPage')}}">Transactions</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Task2</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('productsPage')}}">Products Page</a></li>
      </ul>
    </li>
</ul>