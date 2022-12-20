<?php
error_reporting(-1);
require_once __DIR__ . '/PdoConnect.php';
require_once __DIR__ . '/funcs.php';
$products = get_products();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href ="css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
	<title>Сайт покупки продуктов</title>

</head>
<body>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Магазин продуктов</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Главная</a>
          </li>
          <li class="nav-item">
            <button id = "get-cart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart-modal">
                    Корзина <span class="badge badge-light mini-cart-qty"><?=$_SESSION['cart.qty'] ?? 0 ?> </span>
                </button>
          </li>
      </ul>
          <button class="btn btn-outline-primary" onclick ="window.location.href = '/Logout.php';">Выйти</button>
      </div>
    </div>
  </nav>



</header>
        <div class ="d-flex flex-wrap">
         
        <?php if (!empty($products)): ?>
         <?php foreach($products as $product):?>

        <div class="card mb-4 rounded-3 shadow-sm mt-5">
          <div class="card-header py-3">
            <h2><?php echo $product['name']?></h2>
          </div>
            <div class="card-body">
              <img src="img/<?php echo $product['image'] ?>" class="img-thumbnail">
                <ul class="list-unstyled mt-3 mb-4">
                  <h4><?php echo "<li>".$product['price']." ₽/кг</li>"?></h4>
                </ul>
              <a href="?cart=add&id=<?= $product['id'] ?>" class="btn w-100 btn btn-lg   btn-outline-primary add-to-cart" data-id="<?= $product['id'] ?>">В корзину</a>
            </div>
        </div>


          <?php endforeach; ?>
        <? endif; ?>
    </div>

</ul>
</body>
</html>