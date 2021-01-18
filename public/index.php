<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


     <link rel="stylesheet" href="../src/leyout/style.css">

     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;900&display=swap" rel="stylesheet">

     <title>Document</title>
</head>

<body>
     <div id="app">
          <div class="container-fluid">
               <div class="row justify-content-md-center">
                    <div v-for="el in product">
                         <div class="col-md-2 product-cart">
                              <img v-bind:src="el.img" alt="">
                              <div class="product-cart__name"> {{ el.name }}</div>
                              <div class="product-cart__price">{{ el.price }} &#8381</div>
                              <input class="btn btn-danger btn-lg" type="button" value="Купить" @click="form(el)">
                         </div>
                    </div>
               </div>

               <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">                         
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h4 class="modal-title">Форма заказа</h4>
                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                   <table>
                                        <thead>
                                        </thead>
                                        <tbody>
                                             <form action="../php/send.php" method="post" id="send-form">
                                                  <div class="form-group">
                                                       <div name="roduct-name" id="product-name" form="send-form"></div>
                                                  </div>
                                                  <div class="form-group">
                                                       <label for="exampleInputEmail1">Имя</label>
                                                       <input type="text" class="form-control form-control-lg"
                                                            name="name" id="exampleCheck1"
                                                            aria-describedby="emailHelp" placeholder="Ф.И.О." form="send-form" required>
                                                       <small id="emailHelp" class="form-text text-muted">We'll never
                                                            share your email with anyone else.</small>
                                                  </div>
                                                  <div class="form-group">
                                                       <label for="exampleInputEmail1">Телефон</label>
                                                       <input type="number" class="form-control form-control-lg"
                                                            name="telefon" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="+7(000)123-45-67" form="send-form"
                                                            required>
                                                       <small id="emailHelp" class="form-text text-muted">We'll never
                                                            share your email with anyone else.</small>
                                                  </div>
                                                  <div class="form-group">
                                                       <label for="exampleInputEmail1">Email address</label>
                                                       <input type="email" class="form-control form-control-lg"
                                                            name="email" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="Enter email" form="send-form"
                                                            required>
                                                       <small id="emailHelp" class="form-text text-muted">We'll never
                                                            share your email with anyone else.</small>
                                                  </div>
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input"
                                                            id="exampleCheck1" form="send-form" required>
                                                       <label class="form-check-label" for="exampleCheck1">Check me
                                                            out</label>
                                                  </div>
                                                  <br>
                                                  <button type="submit" class="btn btn-danger" form="send-form">Заказать</button>
                                             </form>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

<?php
     echo '<br>';
     $url = '../src/product.json';
     $obj = json_decode(file_get_contents($url), true);
?>

<h1 class="list-group col-md-6 offset-md-3">Выборка из JSON</h1>
<?php foreach ($obj['product'] as $item): ?>
     <ul class="list-group col-md-6 offset-md-3">
          <li class="list-group-item"><?=$item['name'];?></li>
          <li class="list-group-item"><?=$item['img'];?></li>
          <li class="list-group-item"><?=$item['price'];?></li>
      </ul>
      <br>
<?php endforeach; ?>

     <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

     <script>
          var app = new Vue({
               el: '#app',
               data: {
                    product: [{
                              "name": "Парикмахерское кресло «Норм» гидравлическое_1",
                              "img": "http://dev-wbooster.ru/test_task/img/img-1.png",
                              "price": "9 900"
                         },
                         {
                              "name": "Парикмахерское кресло «Норм» гидравлическое_2",
                              "img": "http://dev-wbooster.ru/test_task/img/img-1.png",
                              "price": "9 900"
                         },
                         {
                              "name": "Парикмахерское кресло «Норм» гидравлическое_3",
                              "img": "http://dev-wbooster.ru/test_task/img/img-1.png",
                              "price": "9 900"
                         },
                         {
                              "name": "Парикмахерское кресло «Норм» гидравлическое_4",
                              "img": "http://dev-wbooster.ru/test_task/img/img-1.png",
                              "price": "9 900"
                         },
                    ],
               },               
               methods: {
                    form: function (item) {
                         console.log(item.name);
                         $("#product-name").html('<input type="text" class="form-control form-control-lg" name="productName" id="exampleInputEmail1" aria-describedby="emailHelp" form="send-form" value="' + item.name + '"placeholder="' + item.name + '" readonly></input>');
                         $("#myModal").modal();                         
                    },
               },
          });

          app.fill();

     </script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
     </script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
     </script>


</body>

</html>
