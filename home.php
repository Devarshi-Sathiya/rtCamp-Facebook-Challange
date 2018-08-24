<?php require_once('fb-stuff.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Facebook</title>
    <link rel="stylesheet" href="common/css/all.css">
    <link rel="stylesheet" href="common/css/grid.css">
    <link rel="stylesheet" href="common/css/main.css">
  </head>
  
  <body>
    <!-- SLIDE SHOW SECTION -->     
    <div class="maindiv1" id="slideShowDiv" style="display: none;">
      <div class="slideShowCross" onclick="closeSlideShow(),stopLoop()">✖</div>
      <div class="container1 slideShowCnt"></div>
    </div>
    <!-- END OF SLIDE SHOW SECTION -->  

    <!-- START MENU SECTION -->  
    <nav>
      <div class="container">
        <div class="grid shadow" >
          <div class="column-xs-6 column-md-2">
            <ul>          
              <li><a href="#" class="active"  onclick="downloadAll()">Download All</a></li>
            </ul>
          </div>
          <div class="column-xs-6 column-md-2">
            <ul>
              <li><a href="#" class="active" onclick="downloadSelected()">Download Selected</a></li>
            </ul>
          </div>
          <div class="column-xs-6 column-md-2">
            <ul>
              <li><a href="#" class="active" onclick="driveAll()">Move All to Google Drive</a></li>
            </ul>
          </div>
          <div class="column-xs-6 column-md-2">
            <ul>
              <li><a href="#" class="active" onclick="driveSelected()">Move Selected to Google Drive</a></li>   
            </ul>
          </div>
          <div class="column-xs-12 column-md-4">
              <ul class=logoutul> 
                  <a href="backend_gen.php?q=logout"><button class="logoutbutton">Logout</button></a>
              </ul>
            </div>
        </div>
      </div>
    </nav>
    <!-- END MENU SECTION -->  
    
    <!-- START GALLERY SECTION -->    
    <section class="gallery">
      <div class="container">
        <div class="grid ">
        <?php   
          if(isset($ResultArray) && !empty($ResultArray)) {
            foreach ($ResultArray as $key=> $ResultArrayS) {
              if (isset($ResultArrayS[0]['picture'])) {
                $albumPic = $ResultArrayS[0]['picture']; 
                $albumName = $key;
                $temp = array();
                foreach ($ResultArrayS as $ResultArraySSSS) {
                  $TempPic = $ResultArraySSSS['picture']; 
                  $temp[] = $TempPic;
                }

                $isString = '';
                if(!empty($temp)) {
                  $isString = implode('=====', $temp);
                }                
                ?>
                <div class="column-xs-12 column-md-3 maindivbox">    
                  <label class="checkbox tooltip">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    <span class="tooltiptext tooltipselect">Select This Album</span>
                  </label>
                  <i class="far fa-arrow-alt-circle-down download-icon tooltip" aria-hidden="true" onclick="downloadThis(this)"> 
                    <span class="tooltiptext">Download This Album</span>
                  </i>
                  <span class="tooltip">
                    <img src="common/icons/drive.ico" class="drive-icon" onclick="driveThis(this)"><span class="tooltiptext tooltipdrive">Move album to drive</span>
                  </span>
                  <div class="img-container" onclick="showSlideShow(),startLoop('<?=$isString?>')">
                    <img class="imager" src="<?=$albumPic?>">
                    <figcaption class="img-content" style="">
                      <h2 class="title" id="albumName"><?=$albumName?></h2> 
                    </figcaption>
                  </div>
                </div>  
                <?php
              } 
            }
          }
          ?>
        </div>
      </div>
    </section>
    <!-- END GALLERY SECTION -->

    <!-- START FOOTER SECTION -->   
    <footer>
      <div class="container">
        <div class="grid">
          <div class="column-xs-12">
            <ul class="social">
              <li><a href="" target="_blank" ><span class="fab fa-twitter"></span></a></li>
              <li><a href="" target="_blank" ><span class="fab fa-codepen"></span></a></li>
              <li><a href="" target="_blank" ><span class="fab fa-github"></span></a></li>
            </ul>
            <p class="copyright">&copy; Created By Devarshi Sathiya</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- END FOOTER SECTION -->

    <!-- START MODEL SECTION -->
    <div class="modal" id="myModal">  
      <div class="column-xs-12 column-md-6 modal-content">
         <span class="progressbar slow" id="loader"><span class="progressbarin" id="progressbarin" style="z-index: 99"></span></span>
      </div>
    </div>
    <!-- END MODEL SECTION -->

    <script type="text/javascript" src="common/js/jquery.min.js"></script>
    <script type="text/javascript" src="common/js/custom.js"></script>
  </body>
</html>