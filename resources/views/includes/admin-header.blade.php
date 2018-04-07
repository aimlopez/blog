<div id="header">
    <div class="logo"><a href"#">ADMIN</a></div>
    <div class="admin"><input class="glowing-border" type="search" placeholder="Search"> | Hello <strong><?php //echo $_SESSION['username']; ?></strong>| (<a href="../logout.php" onclick="return confirm('Are you sure to logout?')">Log out</a>)</div>
</div>
<a class="mobile" href="#">MENU</a>
    
    <div class="sidebar">
        <ul class="nav">
            <li {{ Request::is('admin') ? 'class=active' : ''}}><a href="{{ route('admin.index') }}"><span class="flaticon-cogwheels12">Dashboard</span></a></li>
            <li {{ Request::is('admin/post*') ? 'class=active' : ''}}><a href="{{ route('admin.posts.index') }}"><span class="flaticon-newspaper1">Posts</span></a></li>
            <li {{ Request::is('admin/categories') || Request::is('admin/category*')? 'class=active' : ''}}><a href="{{ route('admin.categories.index')}}"><span class="flaticon-selling1">Categories</span></a></li>
            <li {{ Request::is('admin/contact') ? 'class=active' : ''}}><a href=""><span class="flaticon-multiple25">Users Message</span></a></li>
            <li><a href="../logout.php"><span class="flaticon-logout13">Logout</span></a></li>
        </ul>
    </div>
