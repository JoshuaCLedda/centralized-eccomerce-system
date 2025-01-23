<!-- alert -->
<script>
    setTimeout(function() {
        var alert = document.getElementById("success-alert");
        if (alert) {
            alert.classList.remove('fade', 'show');  
            alert.style.display = 'none'; 
        }
    }, 3000);  // 3000 milliseconds = 3 seconds
</script>
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>

</body>

</html>