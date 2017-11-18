<script type="text/javascript" src="{{asset('js/jquery.form.min.js')}}"></script>

<script type="text/javascript">

    var main = function(){
        $('#upload').on('submit',function(e){
            e.preventDefault();
            $(this).ajaxSubmit({
                beforeSend:function(){
                    $('#prog').show();
                    $('#prog').attr('value','0');
                },
                uploadProgress:function(event,position,total,percentCompelete){
                    $('#prog').attr('value', percentCompelete);
                },
                success: function(data){
                    $('#here').text('Completed!');
                }
            });
        });
    };
    $(document).ready(main);
</script>
