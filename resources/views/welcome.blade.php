<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <ul id = "orders"></ul>
    <script>
        $(function(){
            var $orders = $('#orders');

            $.ajax({
                type:'GET',
                url:'http://127.0.0.1:8000/api/products',
                success:function(products){
                    $.each(products,function(key,product){
                        $.each(product, function(key, value) {
                            //if (value.sub_category == 'Dogs' )
                                $orders.append('Rating: '+ value.rating + 'Image :'+ value.image + 'Product : ' + value.name + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+ 'Price :' + value.price + 'Discount:' + value.discount +  'Current Price :'+ value.totalPrice + 'Details :' + value.href.detail + '<br>');
                        });
                    });
                }
            });
        });    
    </script>
</body>
</html>