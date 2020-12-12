$(document).ready(function () {
    $('.datTable').DataTable(
        {
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        }
    );
});
