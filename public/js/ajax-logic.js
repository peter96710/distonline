$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//Store Logic
$(".btn-store").click(function(e){

    e.preventDefault();

    var arrayData = $("#add-product-form").serializeArray();

    $.ajax({
        type:'POST',
        url:"/products",
        data:arrayData,
        success:function(data){
            if($.isEmptyObject(data.error)){
                alert(data.success);
                window.location.href ="/products" ;
            }else{
                alert(data.error);
            }
        }
    });
});

//Update Logic
$(".btn-update").click(function(e){
    console.log("hello")
    e.preventDefault();
    var arrayData = $("#update-product-form").serializeArray();
    console.log(arrayData[5].value)
    $.ajax({
        type:'POST',
        url:"/products/"+arrayData[5].value,
        data:arrayData,
        success:function(data){
            if($.isEmptyObject(data.error)){
                alert(data.success);
                window.location.href ="/products" ;
            }else{
                alert(data.error);
            }
        }
    });
});

//Delete logic
$(".delete-product").click(function(e){

    var url = $(this).data('url');

    if (confirm("Are you sure you want to delete this user?") == true) {
        $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            success: function(data) {
                if (data && data.success === true){
                    alert(data.message);
                    location.reload();
                }else{alert("no id")}
            }
        });
    }
});

function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
}
