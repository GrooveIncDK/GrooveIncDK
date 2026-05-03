<?php
define("CSS_PATH", "css/");
?>

<!DOCTYPE html>
<html lang="en" class="wide">
<head>
    <title>Shortcodes</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <link href="css/grid.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/fl-clear-icons.css" rel="stylesheet">

    <link href='//fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Crimson+Text:400italic,400' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto:300,700' rel='stylesheet' type='text/css'>
    
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <style>

 
        .icon-short-code {
          font-size: 16px;
          line-height: 2;
        }
                     

        .icon-short-code .box__left {
          padding-right: 10px;
          color: black;
        }

        h2{
            font-size: 45px;
            line-height: 1.7;
        }

        h3{
            font-weight: 700;
            text-transform: uppercase;
            font-size: 28px;
            line-height: 1.7;
        }

		h2 + h3{
			margin-top: 30px;
		}

		h3 + .row{
			margin-top: 20px;
		}

		.row + h3{ 
			margin-top: 60px;	
		}


        .box .box__left, 
        .box .box__right,
        .box .box__body { 
          display: table-cell;
          vertical-align: top;
        }

        @media (max-width: 767px){
            .icon-short-code.box .box__left,
            .icon-short-code.box .box__right,
            .icon-short-code.box .box__body{
              display: inline-block;
            }
        }  

        div.row div.clear-shortcode-xs-6 {
                margin-top: 0;
                margin-bottom: 0;
            }

         @media (max-width: 600px){
            div.row div.clear-shortcode-xs-6 {
                width: 100%;
            }
         }

        

         @media (min-width: 1200px){
             div.row div.clear-shortcode-xs-6:nth-child(3n+4){
                clear: left;
             }
          }

         @media (min-width: 992px) and (max-width: 1199px) {
            div.row div.clear-shortcode-xs-6:nth-child(3n+4) {
              clear: left;
            }
          }

         @media (min-width: 500px) and (max-width: 991px) {
            div.row div.clear-shortcode-xs-6:nth-child(2n+3) {
              clear: left;
            }
          }
        

    </style>

    <!--[if lt IE 10]>
    <div
        style='background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

    <script src='js/device.min.js'></script>
</head>
<body>
<div class="page">
  <!--========================================================
                            HEADER
  =========================================================-->
  <header class="bg-primary-variant-3">
    <div class="container brand-container">
      <div class="brand">
        <h1 class="brand_name">
          <a href="./">Yoga</a>
        </h1>
      </div>
      <div class="contact-info">
        <p>Call us: <a href='callto:#'>+1 800 603 6035</a></p>
      </div>     
    </div>
  </header>

    <!--========================================================
                              CONTENT
    =========================================================-->
    <main class="content">
        <!-- Shortcodes -->
        <section class="well-lg">
            <div class="container">

                <!-- Icons -->
                <?php
                $packs = array( 
                    "font-awesome","material-icons", "hotel-pictograms", "material-design", "linecons", "fl-sympletts",
                    "fl-squared-ui", "fl-soft-icons", "fl-simpleicon-communication",
                    "fl-real-estate-3", "fl-puppets", "fl-outicons", "fl-line-ui",
                    "fl-line-icon-set", "fl-justicons", "fl-icon-works", "fl-great-icon-set",
                    "fl-glypho", "fl-free-chaos", "fl-flat-icons-set-2", "fl-fill-round-icons",
                    "fl-dripicons", "fl-drawing-tools", "fl-demo-icons", "fl-demo-icons", "fl-crisp-icons",
                    "fl-continuous", "fl-clear-icons", "fl-chapps", "fl-budicons-launch", "fl-budicons-free",
                    "fl-bigmug-line", "fl-36-slim-icons", "beach-icons", "arrows"
                );

                $di = new RecursiveDirectoryIterator(CSS_PATH);
                $files = array();
                $fa = 0;
                foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
                    if (in_array(basename($filename, ".css"), $packs)) {                     
                        if (basename($filename, ".css") != "font-awesome"){
                            array_push($files, $filename);
                            echo "<link rel='stylesheet' href='css/" . basename($filename) . "'>";                              
                        }                  
                        else{
                            $fa = 1;
                        }
                        
                    } 
                }

                if($fa){
                    array_push($files, "css\\font-awesome.css");
                    echo "<link rel='stylesheet' href='css/" . basename($filename) . "'>";                                  
                }

                if (count($files) > 0) {
                    echo '<h2>Icons</h2>'; 
                    foreach ($files as $i => $filename) {
                        echo '<h3>' . basename($filename, ".css") . '</h3>';
                        echo '<div class="row">';
                        $handle = fopen($filename, "r");
                        $icons = array(); 

                        while (($line = fgets($handle)) !== false) {  
                            if (preg_match("/\.(" . ( (basename($filename, ".css") == "material-design") || (basename($filename, ".css") == "hotel-pictograms") ? "(flaticon)|(material-design)" : basename($filename, ".css")) . "-[\w\d_-]+)\:before\s*\{/i", $line, $result)) {
                                array_push($icons, $result[1]);  
                            }                            
                          

                            switch (basename($filename, ".css")) {
                                case 'font-awesome':
                                    if(preg_match("/\.(fa-[\w\d_-]+)\:before\s*\{/i", $line, $result)) {
                                      array_push($icons, $result[1]);  
                                    }
                                    break;                                                      
                                
                            }
                        } 

                       

                        if (count($icons) <= 10){
                            $bp = ceil(count($icons) / 5);                            
                        }
                        else{
                            $bp = ceil(count($icons) / 10);
                        }

                        foreach ($icons as $i => $value) {
                            if (fmod($i + $bp, $bp) == 0) {
                                if ($i != 0) {
                                    echo '</div>';
                                }
                                echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 clear-shortcode-xs-6">';
                            }
                            echo '<div class="box icon-short-code">';
                            echo '<div class="box__left">';
                            echo '<div class="icon ' . $value . '"></div>';
                            echo '</div>';
                            echo '<div class="box__body"> .' . $value . '</div>';
                            echo '</div>';
                            if ($i == count($icons) - 1) {
                                echo '</div>';
                            }
                        }

                        echo '</div>'; 
                        fclose($handle);
                    }                    
                }
                ?>
                <!-- END Icons -->
            </div>
        </section>
        <!-- END Shortcodes -->
    </main> 

   <!--========================================================
                            FOOTER
  =========================================================-->
  <footer class="bg-primary-variant-3">
    <div class="container">
      <div class="row">
        <div class="col-sm-5">
          <p class="copy">Yoga © <span id="copyright-year"></span> All Rights Reserved.</p>
        </div>
        <div class="col-sm-7">
          <ul class="list">
            <li><a class="fa fa-facebook" href="#"></a></li>
            <li><a class="fa fa-twitter" href="#"></a></li>
            <li><a class="fa fa-youtube" href="#"></a></li>
            <li><a class="fa fa-skype" href="#"></a></li>
            <li><a class="fa fa-instagram" href="#"></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</div>
<script src="js/script.js"></script>
</body>
</html>