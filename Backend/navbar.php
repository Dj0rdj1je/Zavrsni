<?php


$url = "user.php?id=". $_SESSION['id'];


?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Home</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                <li class="nav-item">
                    <?php if ($_SESSION['role_id'] == '1'){
                        echo "<a class='nav-link active' aria-current='page' href='Item.php'>Dodaj artikal</a>";
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url ?>"><?php echo $_SESSION['username']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log out</a>
                </li>
            </ul>

            <input class="form-control me-3" id="search" name="search" onkeyup="find()">


        </div>
    </div>
</nav>
<div id="lista">

</div>