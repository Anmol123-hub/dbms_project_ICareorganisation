var table = document.getElementById('orderTable'),
    rIndex;

for (var i = 0; i < table.rows.length; i++) {
    table.rows[i].onclick = function() {
        rIndex = this.rowIndex;
        var currOid = this.cells[0].innerHTML;
        var discount = this.cells[1].innerHTML;

        console.log(currOid)

        $.ajax({
            url: "test.php",
            method: "post",
            data: { currOid: currOid },
            success: function(res) {
                // console.log(res);
                document.getElementById('inject').innerHTML = res;
            }
        })
    };
}