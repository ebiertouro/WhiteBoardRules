<div id="header">
    <ul class="navigation">
        <li class="navItem">        
            <div class="logo-container">
                <img src="LogoImage.png" width="80" id="logo" />
                <img src="LogoSlogan.png" id="slogan" />
            </div>
        </li>
        <li class="navItem"><a class="nav <?php if ( $title == "Home" ) { echo "active"; } ?>" href="./main.html">Classes</a></li>
        <li class="navItem"><a class="nav <?php if ( $title == "Students" ) { echo "active"; } ?>" href="./students.html">Students</a></li>
        <li class="navItem"><a class="nav <?php if ( $title == "Assignments" ) { echo "active"; } ?>" href="./assignments.html">Assignments</a></li>
        <li class="navItem"><a class="nav <?php if ( $title == "Table" ) { echo "active"; } ?>" href="./table.html">Generate Report Cards</a></li>
    </ul>
</div>  
