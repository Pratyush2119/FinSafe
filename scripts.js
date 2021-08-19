$(document).ready(function() {
    $('#transferbtn').click(function() {
        $('#receiverModal').modal('toggle');
    });
});

function warning(n) {
    alert("Changing pages will automatically cancel the transaction!");
    if(n==1) {
        window.location.href="back.php?index=yes";
    }
    if(n==2) {
        window.location.href="back.php?transactions=yes";
    }
}

