<hr />
<div id="footer">
    <p><a class="urlBare" href="contact.php">Contact Us</a></p>
</div>

<!-- Include Slimmenu JS -->
<script src="js/jquery.slimmenu.min.js"></script>

<!-- Initialize Slimmenu -->
<script>
    $(document).ready(function() {
        $('#navigation').slimmenu({
            resizeWidth: '800',
            collapserTitle: 'Main Menu',
            animSpeed: 'medium',
            easingEffect: null,
            indentChildren: false,
            childrenIndenter: '&nbsp;'
        });
    });
</script>
</body>
</html>