  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="<?php echo get_template_directory_uri();?>/assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                   
                    <div class="breadcrumb__text">
                        <!-- <h2>BLOG</h2>  -->
                        <h2><?php 
                        $CurPageURL = $_SERVER['REQUEST_URI'];  
                        // echo $CurPageURL;  
                        $rest = substr($CurPageURL, 13, -1);
                        echo strtoupper($rest);
                        
                        ?></h2> 

                        <div class="breadcrumb__option">
                        <?php  if (class_exists('woocommerce')): woocommerce_breadcrumb(); endif; ?>
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    