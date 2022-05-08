<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php

include('includes/head.php');
include('includes/navigation.php');
include('includes/mailer.php');

$count = 0;
$cartItems = "";

if (isset($_POST['ItemSubmit'])) {

    $itemNum = $_POST['itemNum'];
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $totalItemPrice = $itemPrice * $itemNum;
    if (!isset($_SESSION['shoppingCart'])) {
        $_SESSION['shoppingCart'] = array();
        echo "session started<br>";
    }

    foreach ($_SESSION['shoppingCart'] as $item) {

        if ($item['name'] == $itemName) {
            $count += 1;
        }
    }
    if ($count > 0) {
        echo "Item already added";
    } else {

        array_push($_SESSION['shoppingCart'], array('name' => $itemName, 'amount' => $itemNum, 'price' => $itemPrice, 'total_item_price' => $totalItemPrice));
    }
}

if (isset($_SESSION['shoppingCart'])) {

    foreach ($_SESSION['shoppingCart'] as $items) {

        $cartItems .= '<p>' . $items['name'] . ' x ' . $items['amount'] . ': R' . $items['total_item_price'] . '</p>';
    }
} else {
    $cartItems = "<p>Your cart is empty</p>";
}

?>

<style>

</style>

<body>


    <div class="container-fluid px-0 mb-6" id="home">

        <div class="home-slider-container">

            <div class="home-slider">

                <img src="images/home-banner-fields.jpg" class="w-100" alt="">


                <div class="container banner-block">


                    <div class="col-lg-12">

                        <p class="banner-text text-white">

                            <span>Welcome to</span>

                            African <br>

                            Marmalade

                        </p>

                    </div>

                </div>



            </div>

            <div class="home-slider">

                <img src="images/home-banner-flowers.jpg" class="w-100" alt="">

                <div class="container banner-block">


                    <div class="col-lg-12">

                        <p class="banner-text text-white">

                            <span>About</span>

                            African <br>

                            Marmalade

                        </p>

                    </div>

                </div>

            </div>

            <div class="home-slider">

                <img src="images/home-banner-fields.jpg" class="w-100" alt="">

                <div class="container banner-block">


                    <div class="col-lg-12">

                        <p class="banner-text text-white">



                            African <br>

                            Marmalade
                            <span>Products</span>
                        </p>

                    </div>

                </div>

            </div>

            <div class="home-slider">

                <img src="images/home-banner-flowers.jpg" class="w-100" alt="">

                <div class="container banner-block">


                    <div class="col-lg-12">

                        <p class="banner-text text-white">

                            <span>Get involved with</span>

                            African <br>

                            Marmalade

                        </p>

                    </div>

                </div>

            </div>


            <div class="home-slider-controller">



            </div>

        </div>

    </div>


    <div id="main-page-content">

        <div class="container mb-6" id="about">

            <div class="row ">


                <div class="col-lg-12 align-self-center">

                    <h1>About Us</h1>

                    <p>African Marmalade is an organic farming business that grows African indigenous crops and certain
                        niche
                        vegetables, produces seeds and seedlings, aggregates from a network of organic farmers, trains
                        people in
                        sustainable food production.</p>

                    <p>We grow indigenous African vegetable and fruits. Supply organic seeds and seedlings. We secure
                        markets for
                        indigenous produce, train farmers and supply farm hands services</p>

                </div>


            </div>




        </div>

        <div class="mb-6" id="products">

            <div class="container">


                <div class="row ">

                    <div class="col-lg-12 align-self-center">

                        <h1>Products</h1>


                    </div>



                </div>





            </div>

            <div class="container-fluid">


                <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2">

                    <div class="col">



                        <div class="product-block">

                            <div class="row">


                                <div class="col-lg-4 text-center">

                                    <img src="images/jar.png" alt="" class="mw-100">

                                </div>
                                <div class="col-lg-8 align-self-center">

                                    <h3 class="font-weight-bold text-uppercase">Product 1</h3>

                                    <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti
                                        maiores, repellat
                                        quaerat, vel laudantium, molestiae ducimus repellendus quidem non eos aspernatur!
                                        Voluptatem alias dolorum ducimus consequatur suscipit, exercitationem harum
                                        laudantium!</p>

                                    <form method="post" id="shopForm">

                                        <div class="row">

                                            <div class="col-2 align-self-center">
                                                <input type="text" name="itemName" class="d-none" value="Product 1">
                                                <input type="text" class="shopItem" value="0" id="product-1-input" name="itemNum">
                                                <input type="text" class="d-none" value="100" id="product-1-input-price" name="itemPrice">


                                            </div>
                                            <div class="col-2">

                                                <div class="increaseItem" id="product-1-increase">+</div>
                                                <div class="decreaseItem" id="product-1-decrease">-</div>


                                            </div>

                                            <div class="col-lg-12">
                                                <button type="submit" name="ItemSubmit" class="addToCart">Add to cart</button>
                                            </div>
                                        </div>


                                    </form>



                                </div>


                            </div>

                        </div>


                    </div>

                    <div class="col">



                        <div class="product-block">

                            <div class="row">


                                <div class="col-lg-4 text-center">

                                    <img src="images/medicine.png" alt="" class="mw-100">

                                </div>
                                <div class="col-lg-8 align-self-center">

                                    <h3 class="font-weight-bold text-uppercase">Product 2</h3>

                                    <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti
                                        maiores, repellat
                                        quaerat, vel laudantium, molestiae ducimus repellendus quidem non eos aspernatur!
                                        Voluptatem alias dolorum ducimus consequatur suscipit, exercitationem harum
                                        laudantium!</p>

                                    <form method="post" id="shopForm">

                                        <div class="row">

                                            <div class="col-2 align-self-center">

                                                <input type="text" name="itemName" class="d-none" value="Product 2">
                                                <input type="text" class="shopItem" value="0" id="product-2-input" name="itemNum">
                                                <input type="text" class="d-none" value="50" id="product-2-input-price" name="itemPrice">


                                            </div>
                                            <div class="col-2">

                                                <div class="increaseItem" id="product-2-increase">+</div>
                                                <div class="decreaseItem" id="product-2-decrease">-</div>


                                            </div>

                                        </div>

                                        <div class="col-lg-12">
                                            <button type="submit" name="ItemSubmit" class="addToCart">Add to cart</button>
                                        </div>

                                    </form>



                                </div>


                            </div>

                        </div>


                    </div>


                    <div class="col">



                        <div class="product-block last-block">

                            <div class="row">


                                <div class="col-lg-4 text-center">

                                    <img src="images/jar.png" alt="" class="mw-100">

                                </div>
                                <div class="col-lg-8 align-self-center">

                                    <h3 class="font-weight-bold text-uppercase">Product 3</h3>

                                    <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti
                                        maiores, repellat
                                        quaerat, vel laudantium, molestiae ducimus repellendus quidem non eos aspernatur!
                                        Voluptatem alias dolorum ducimus consequatur suscipit, exercitationem harum
                                        laudantium!</p>

                                    <form method="post" id="shopForm">

                                        <div class="row">

                                            <div class="col-2 align-self-center">

                                                <input type="text" name="itemName" class="d-none" value="Product 3">
                                                <input type="text" class="shopItem" value="0" id="product-3-input" name="itemNum">
                                                <input type="text" class="d-none" value="150" id="product-3-input-price" name="itemPrice">


                                            </div>
                                            <div class="col-2">

                                                <div class="increaseItem" id="product-3-increase">+</div>
                                                <div class="decreaseItem" id="product-3-decrease">-</div>


                                            </div>

                                        </div>

                                        <div class="col-lg-12">
                                            <button type="submit" name="ItemSubmit" class="addToCart">Add to cart</button>
                                        </div>

                                    </form>



                                </div>


                            </div>

                        </div>


                    </div>

                </div>






            </div>

            <div class="container mt-3">
                <div class="row">

                    <div class="col-lg-12">

                        <div class="float-end">
                            <button class="viewCart">View cart</button>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="container mb-6" id="contact">


            <div class="row">

                <div class="col-lg-12 align-self-center">

                    <h1>Get<br>Involved</h1>

                    <form method="post" id="contactForm">
                        <div class="row mb-4">
                            <div class="form-group col-lg-5">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                            </div>
                            <div class="form-group col-lg-7">
                                <label for="surname">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter surname">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="form-group col-lg-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="organisation">Organisation</label>
                                <input type="text" class="form-control" id="organisation" name="organisation" placeholder="Enter organisation">
                            </div>
                        </div>

                        <div class="row mb-4">


                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Reason</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="reason" id="reason1" value="Investment">
                                            <label class="form-check-label" for="reason1">
                                                Investment
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="reason" id="reason2" value="Opportunities">
                                            <label class="form-check-label" for="reason2">
                                                Opportunities
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>


                        </div>

                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>

                </div>


            </div>






        </div>

    </div>


    <aside id="shoppingCart">

        <div class="container">

            <div class="row mb-4">

                <div class="col-6">
                    <p class="text-start mb-0">Cart</p>
                </div>
                <div class="col-6">
                    <p class="close text-end mb-0">X</p>
                </div>

            </div>


            <div class="row">

                <?php echo $cartItems ?>


            </div>

        </div>


    </aside>




</body>
<script src="js/main.js"></script>

<script>
    var cart = document.querySelector("#shoppingCart");
    var pageContent = document.querySelector("#main-page-content");
    var viewBtn = document.querySelector(".viewCart");
    var clsBtn = document.querySelector(".close");

    viewBtn.addEventListener('click', function() {

        cart.classList.add('shownCart');
        pageContent.classList.add('shownCart');

    });

    clsBtn.addEventListener('click', function() {
        cart.classList.remove('shownCart');
        pageContent.classList.remove('shownCart');

    })

    $(document).scroll(function() {

        isScrolledIntoView("#home");
        isScrolledIntoView("#about");
        isScrolledIntoView("#products");
        isScrolledIntoView("#contact");

    });

    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        if ((elemBottom <= docViewBottom) && (elemTop >= docViewTop)) {

            $(".nav-item ").removeClass('active');
            $(elem + "-nav").addClass('active');

        };
    }
</script>

</html>