<div id="header">
    <ul class="navigation">
        <li class="navItem">        
            <div class="logo-container">
                <img src="LogoImage.png" width="80" id="logo" />
                <img src="LogoSlogan.png" id="slogan" />
            </div>
        </li>
        <li class="navItem"><a class="nav <?php if ( $title == "Home" ) { echo "active"; } ?>" href="./index.php">Home</a></li>
        <li class="navItem"><a class="nav <?php if ( $title == "Students" ) { echo "active"; } ?>" href="./students.php">Students</a></li>
        <li class="navItem"><a class="nav <?php if ( $title == "Assignments" ) { echo "active"; } ?>" href="./assignments.php">Assignments</a></li>
        <li class="navItem"><a class="nav <?php if ( $title == "Report Cards" ) { echo "active"; } ?>" href="./table.php">Report Cards</a></li>
    </ul>
</div>  
