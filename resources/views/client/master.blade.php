<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/resources')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('resources')}}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{url('resources')}}/css/animate.css">

    <link rel="stylesheet" href="{{url('resources')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('resources')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{url('resources')}}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{url('resources')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{url('resources')}}/css/jquery.timepicker.css">

    <link rel="stylesheet" href="{{url('resources')}}/css/icomoon.css">
    <link rel="stylesheet" href="{{url('resources')}}/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.2.95/css/materialdesignicons.min.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</head>
<body>
@include('client.layout.header')

@yield('content')

@include('client.layout.footer')


<script src="{{url('resources')}}/js/jquery.min.js"></script>
<script src="{{url('resources')}}/js/popper.min.js"></script>
<script src="{{url('resources')}}/js/bootstrap.min.js"></script>
<script src="{{url('resources')}}/js/jquery.easing.1.3.js"></script>
<script src="{{url('resources')}}/js/jquery.waypoints.min.js"></script>
<script src="{{url('resources')}}/js/owl.carousel.min.js"></script>
<script src="{{url('resources')}}/js/jquery.magnific-popup.min.js"></script>
<script src="{{url('resources')}}/js/bootstrap-datepicker.js"></script>
<script src="{{url('resources')}}/js/jquery.timepicker.min.js"></script>
<script src="{{url('resources')}}/js/jquery.animateNumber.min.js"></script>
<script src="{{url('resources')}}/js/google-map.js"></script>
<script src="{{url('resources')}}/js/main.js"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<script type="text/javascript">
    // $('.js-show-modal').on('click',function(e){
    //     // e.preventDefault();
    //     var sp_ma = $(this).data('sp-ma');
    //     $(`.js-modal-${sp_ma}`).addClass('show-modal1');
    // });

    function AddCart(id){
        //console.log(id);
        $.ajax({
            url:"add-Cart/"+id,
            type:'Get',
        }).done(function (response){
            // console.log(response);
            RenderCart(response);
            alertify.success('Da them thanh cong');
        });
    }
    $("#change-item-cart").on("click",".si-close i",function () {
        // console.log($(this).data("id"));
        $.ajax({
            url: 'delete-item-Cart/' + $(this).data("id"),
            type: 'GET',
        }).done(function (response){
            // console.log(response);
            RenderCart(response);
            alertify.success('Da xoa thanh cong');
        });
    });
    function RenderCart(response){
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        // console.log($("#total-quanty-cart").val());
        $("#total-quanty-show").text($("#total-quanty-cart").val());
    }

    function DeleteListItemCart(id){
        // console.log(id);
        $.ajax({
            url:"Delete-Item-List-Cart/"+id,
            type:'Get',
        }).done(function (response){
            // console.log(response);
            RenderListCart(response);
            alertify.success('Da xoa thanh cong');
        });
    }
    function SaveListItemCart(id){
        // console.log(id);
        $.ajax({
            url:'Save-Item-List-Cart/'+id+'/'+$("#quanty-item-"+id).val(),
            type:'Get',
        }).done(function (response){
            RenderListCart(response);
            // console.log(response);
            alertify.success('Da cap nhat thanh cong');
        });

        // console.log($("#quanty-item-"+id).val());
    }
    function RenderListCart(response){

        $("#list-cart").empty();
        $("#list-cart").html(response);
        // console.log($("#total-quanty-cart").val());
        $("#total-quanty-show").text($("#total-quanty-cart1").val());
    }
    /*-------------------
           Quantity change
       --------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });

    $(".edit-all").on("click",function (){
        // alert("OK");
        var lists=[];
        $("table tbody tr td").each(function(){
            $(this).find("input").each(function(){
                var element = {key: $(this).data("id"),value:$(this).val()}
                lists.push(element);
            });
        });
        $.ajax({
            url:'Save-All',
            type:'POST',
            data:{
                "_token":"{{csrf_token()}}",
                "data":lists
            }
        }).done(function (response){
            // RenderListCart(response);
            // console.log(response);

            location.reload();
            // alertify.success('Da cap nhat thanh cong');
        });
    });

    $(".delete-all").on("click",function (){
        // alert("OK");
        var lists=[];
        $("table tbody tr td").each(function(){
            $(this).find("input").each(function(){
                var element = {key: $(this).data("id"),value:$(this).val()}
                lists.push(element);
            });
        });
        $.ajax({
            url:'Delete-All',
            type:'POST',
            data:{
                "_token":"{{csrf_token()}}",
                "data":lists
            }
        }).done(function (response){
            // RenderListCart(response);
            // console.log(response);

            location.reload();
            // alertify.success('Da cap nhat thanh cong');
        });
    });
</script>
</body>
</html>
