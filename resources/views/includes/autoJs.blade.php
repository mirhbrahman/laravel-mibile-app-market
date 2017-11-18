<script type="text/javascript">
function get_sub_category(val) {
    $.ajax({
        type: "POST",
        url: "{{route('getSubCategory')}}",
        data:{_token:'{{csrf_token()}}',id:val},
        success: function(data){
            $('#sub_category').html("<option value=\"\">Choose</option>");
            $.each(data, function(key, value) {
                $('#sub_category')
                .append($("<option></option>")
                .attr("value",value.id)
                .text(value.name));
            });
        }
    });
}
</script>
