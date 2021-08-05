<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">Laravel 7.X</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href={{URL::to('/')}}>Home</a></li>
            <li><a href={{URL::to('/about')}}>About</a></li>
            <li><a href={{URL::to('/services')}}>Services</a></li>
        </ul>
         <ul class="nav navbar-nav navbar-right">
            <li><a href="{{URL::to('/create')}}">New product</a></li>
        </ul>
    </div>
</nav>