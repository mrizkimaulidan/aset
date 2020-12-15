<script>
    $(function () {
        $('#commodity_id').change(function() {
            let id = $('#commodity_id').val();

            $.ajax({
                url: "{{ url('aset/json') }}/" + id,
                success: function(data) {
                    const {
                        commodity: commodity,
                        commodity_locations,
                        commodity_categories
                    } = data.data;

                    $('#commodity_category_id').empty();
                    $('#commodity_category_id').append(`<option value="" selected>Pilih..</option>`);
                    commodity_categories.forEach(function(commodity_category) {
                        $('#commodity_category_id').append(`<option value="${commodity_category.id}"${commodity_category.id === commodity.commodity_category_id ? ' selected' : ''}>${commodity_category.name}</option>`);
                    });

                    $('#commodity_location_id').empty();
                    $('#commodity_location_id').append(`<option value="" selected>Pilih..</option>`);
                    commodity_locations.forEach(function(commodity_location) {
                        $('#commodity_location_id').append(`<option value="${commodity_location.id}"${commodity_location.id === commodity.commodity_location_id ? ' selected' : ''}>${commodity_location.name}</option>`);
                    });

                    $('#amount').val(commodity.amount);
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