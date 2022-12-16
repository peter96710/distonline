$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".btn-submit").click(function(e){

    e.preventDefault();

    var arrayData = $("#add-product-form").serializeArray();

    $.ajax({
        type:'POST',
        url:"/products",
        data:arrayData,
        success:function(data){
            if($.isEmptyObject(data.error)){
                alert(data.success);
                location.reload();
            }else{
                alert(data.error);
            }
        }
    });

});

function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
}
