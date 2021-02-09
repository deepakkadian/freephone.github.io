<?php  
                    include('dbcon.php'); 
                      @$id=$_GET['delid'];
                     

                          $del=mysqli_query($con,"DELETE FROM `add_cart` WHERE id='$id'");
                          {
                          	 header('location: add_cart.php');
                          }
                          
                  ?>