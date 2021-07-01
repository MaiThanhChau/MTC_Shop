<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ url('/') }}/images/logo.png"><!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i">
    <!-- css -->
    <link rel="stylesheet" href="{{ url('/') }}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/photoswipe/photoswipe.css">
    <link rel="stylesheet" href="{{ url('/') }}/vendor/photoswipe/default-skin/default-skin.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css"><!-- fontawesome -->
    <link rel="stylesheet" href="{{ url('/') }}/vendor/fontawesome/css/all.min.css">

</head>

<body>
    <!-- site -->
    <div class="site">
        <div class="site__container">
            @include('layout.includes.menu')

            @yield('content')
            @include('layout.includes.footer')
        </div>
    </div><!-- site / end -->
    <!-- js -->
    <script src="{{ url('/') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('/') }}/vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{ url('/') }}/vendor/nouislider/nouislider.min.js"></script>
    <script src="{{ url('/') }}/vendor/photoswipe/photoswipe.min.js"></script>
    <script src="{{ url('/') }}/vendor/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="{{ url('/') }}/vendor/svg4everybody/svg4everybody.min.js"></script>
    <script src="{{ url('/') }}/js/main.js"></script>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



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



    <script>
    svg4everybody();
    </script>

    <script>
    let root_url = '<?= url('/');?>';
        function loadCart() {
            $.ajax({
                url: root_url+'/shop/all-cart/',
                type: 'GET',
            }).done(function(response) {
                $("#cart").empty();
                $("#cart").html(response);
            });  
        }
        loadCart();
        function addCartwQty(id,obj) {
            let qty = $(obj).closest('form').find('.form-control-number__input').val();
            console.log(qty);

            $.ajax({
                url: root_url+'/shop/cart/'+id+'/'+qty,
                type: 'GET',
            }).done(function(response) {
                $("#cart").empty();
                $("#cart").html(response);
                alertify.success('Đã thêm sản phẩm vào giỏ hàng');
            });  
        }

        function addCart(id) {

            $.ajax({
                url: root_url+'/shop/cart/'+id,
                type: 'GET',
            }).done(function(response) {
                $("#cart").empty();
                $("#cart").html(response);
                alertify.success('Đã thêm sản phẩm vào giỏ hàng');
            });  
        }
        //xóa sản phẩm ở giỏ hàng trên menu
        $("#cart").on("click", ".dropcart__product-remove svg", function () {
            console.log($(this).data("id"));
            $.ajax({
                url: root_url+'/shop/delete-cart/'+$(this).data("id"),
                type: 'GET',
            }).done(function(response) {
                $("#cart").empty();
                $("#cart").html(response);
                alertify.success('Đã xóa sản phẩm thành công');
            });
        })

    </script>
</body>

</html>