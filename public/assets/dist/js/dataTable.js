$(document).ready(function () {
    $('#dat1').DataTable(
        {
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        }
    );
    $('#dat2').DataTable(
        {
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        }
    );
});
