<footer>
    <div class="container py-4 py-lg-5">
        <hr>
        <div class="text-muted d-flex justify-content-between align-items-center pt-3">
            <p class="mb-0">Copyright © 2024 Q4U</p>
        </div>
    </div>
</footer>
<script src="<?= base_url("assets/bootstrap/js/bootstrap.min.js") ?>"></script>
<script src="<?= base_url("assets/js/Profile-Edit-Form-profile.js") ?>"></script>
<script src="<?= base_url("assets/js/startup-modern.js") ?>"></script>
<script>
    function search() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            let cont = 0;
            for (let j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                td = tr[i].getElementsByTagName("td")[j];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) == -1) {
                        cont++;
                    } else {
                        cont = 0;
                        break;
                    }
                }
            }
            console.log(cont);
            if (cont === 0) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>
</body>

</html>