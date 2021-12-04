<!-- Added to Bookmarks Menu-->
    

    <!-- Main Menu-->
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="<?php echo base_url('sidebar'); ?>" data-menu-width="280" data-menu-active="nav-pages"></div>

    
     <div id="menu-cookie-modal" class="menu menu-box-modal menu-box-detached rounded-s" 
         data-menu-height="420"
         data-menu-width="340"
         data-menu-effect="menu-over"
         data-menu-select="page-components">
         
        <div class="content text-center mt-0">
             <p class="pe-3" style="margin-top:40px; display: none;" >
                Code is valid. You'll be redirected shortly.
            </p>
            <div id="reader" style="margin:10px;">
            </div>
            
        </div>
    </div>

</div>

 
<script type="text/javascript" src="<?php echo base_url('scripts/jquery.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('scripts/html5-qrcode.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('scripts/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('scripts/custom.js'); ?>"></script>

<script type="text/javascript" defer>

    function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        console.log(`Scan result: ${decodedText}`, decodedResult);
    }

    $( document ).ready(function() {
        setTimeout(function(){
               

              
    <?php if(isset($js)) { echo $js; } ?>
        
        },150);
        
    });
</script>


</body>