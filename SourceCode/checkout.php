<?php include "./inc/hedare.php";
?>
<?php 
if(!isset( $_SESSION['email'])){

    header("Location:./Login_form.php");
    
    }else{

       
            
 
       


?>

<br><br><br><br><br>
<!--== Search Box Area Start ==-->
<div class="body-popup-modal-area">
    <span class="modal-close"><img src="assets/img/cancel.png" alt="Close" class="img-fluid"/></span>
    <div class="modal-container d-flex">
        <div class="search-box-area">
            <div class="search-box-form">
                <form action="#" method="post">
                    <input type="search" placeholder="type keyword and hit enter"/>
                    <button class="btn" type="button"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--== Search Box Area End ==-->

<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Checkout</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Page Title Area End ==-->
<form action="./all.php" method="POST">
<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="container">
    
        <div class="row">


 
            <!-- Checkout Billing Details -->
            <div class="col-lg-6">
                <div class="checkout-billing-details-wrap">
                    <h2>Billing Details</h2>
                    <div class="billing-form-wrap">
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">

                                 <div class="single-input-item">
                                        <label for="f_name" class="required" >First Name</label>
                                        <input required type="text" id="f_name" placeholder="First Name"/>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">Last Name</label>
                                        <input required type="text" id="l_name" placeholder="Last Name"/>
                                    </div>
                                </div>
                            </div> 



                            <div class="single-input-item">
                                <label for="email" class="required">Email Address</label>
                                <input required type="email" id="email" placeholder="Email Address"/>
                            </div>


                           
                         
                            <div class="single-input-item">
                                <label for="street-address" class="required">Address</label>
                                <input required type="text" id="street-address" placeholder="Street address Line 1"/>
                            </div>



                       
        <div class="single-input-item">
                                <label for="phone">Phone</label>
                                <input required type="text" id="phone" placeholder="Phone"/>
                            </div> 

                          
                   
                                    </div>

                                   
                                   

                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary Details -->
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="order-summary-details">
                    <h2>Your Order Summary</h2>
                    <div class="order-summary-content">
                        <!-- Order Summary Table -->
                        <div class="order-summary-table table-responsive text-center">
                            <table class="table table-bordered">
                                <thead>
                               
                                <tr>
                                    <td>Total Amount</td>
                                    <td><strong>$470</strong></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Order Payment Method -->
                        <div class="order-payment-method">
                            <div class="single-payment-method show">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="cashon" name="paymentmethod" value="cash"
                                               class="custom-control-input" checked/>
                                        <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                    </div>
                                </div>
                               
                            </div>

                       <?php

if(isset($_POST['order'])){
foreach ($_SESSION['cart'] as $key => $value) { 
           
    $Pid=$value['product_id'];
    $Pquan=$value['quantity'];
    $cid= $_SESSION['id'];

    
      $set_order = "select * from orders ";
      $run_oredr = mysqli_query($conn,$set_order);


   $insert_product = "insert into orders (customer_id,quantity,productId) values ('$cid','$Pquan','$Pid')";
    $run_product = mysqli_query($conn,$insert_product);

    

    
    

}


}
?>
     
                            <div class="summary-footer-area">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="terms" required/>
                                    <label class="custom-control-label" for="terms">I have read and agree to the website
                                        <a
                                                href="index.html">terms and conditions.</a></label>
                                </div>

                                <button name="order"  class="btn-add-to-cart" type="submit"> Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== Checkout Page Content End ==-->


 
    </div>
    </form>
</div>
<!--== Page Content Wrapper End ==-->


<!-- Footer Area Start -->
<footer id="footer-area">
 

</footer>
<!-- Footer Area End -->

<!-- Scroll to Top Start -->
<a href="#" class="scrolltotop"><i class="fa fa-angle-up"></i></a>
<!-- Scroll to Top End -->

<?php 
    include "./inc/footer.php"
     ?>

</body>

</html>


<?php 

                                }

?>