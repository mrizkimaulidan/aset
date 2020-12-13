<script>
    $(function() {
        $('#year').change(function() {
            let val = $('#year').val();

            if (val !== '') {
                let url = `{{ url('laporan/print') }}/` + val;
                $('#href-print').attr('href', url);
            } else {
                $('#href-print').attr('href', '');
            }
        });
    });
</script>