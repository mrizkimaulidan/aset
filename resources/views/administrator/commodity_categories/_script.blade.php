<script>
    $(function() {
        $('.commodity-edit').on('click', function() {
            let id = $(this).data('id');
            let url = "{{ url('jenis-aset') }}/" + id
            $.ajax({
                url: "{{ url('jenis-aset/json') }}/" + id,
                success: function(data) {
                    $('#name_edit').val(data.data.name);
                    $('#description_edit').val(data.data.description);

                    $('#commodity-category-form').attr('action', url);
                },
                error: function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan, reload halaman ini atau lapor kepada administrator!'
                    });
                }
            })
        });
    });
</script>