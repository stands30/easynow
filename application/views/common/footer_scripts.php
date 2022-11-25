<?php
            $globalCacheFVersion = global_asset_version();
?>

      <!-- BEGIN CORE PLUGINS -->
      
        <script src="<?php echo base_url();?>assets/project/global/plugins/jquery.min.js<?php echo $globalCacheFVersion; ?>" type="text/javascript" ></script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/bootstrap/js/bootstrap.min.js<?php echo $globalCacheFVersion; ?>" type="text/javascript"  ></script>
        <script src="<?php echo base_url();?>assets/project/js/mandatory_scripts.js<?php echo $globalCacheFVersion; ?>"></script>
        
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-validation/js/jquery.validate.js<?php echo $globalCacheFVersion; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/project/js/common.js<?php echo $globalCacheFVersion; ?>"></script>
        <script src="<?php echo base_url();?>assets/module/module_common.js<?php echo $globalCacheFVersion; ?>"></script>
        <script src="<?php echo base_url();?>assets/project/global/plugins/autocomplete/jquery.easy-autocomplete.js<?php echo $globalCacheFVersion; ?>" type="text/javascript" ></script>

      <!-- END COMMON SCRIPTS -->
      <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js<?php echo $globalCacheFVersion; ?>" type="text/javascript"></script>
      <?php $this->load->view('email/common/footer_scripts'); ?>
        <script type="text/javascript" >
              
          var baseUrl = '<?php echo base_url();?>';

          function isMobile(){
            if (jQuery(window).width() <  560) {
                return true;
            }
            else{
                return false;
            }
        }
        function openTag() {
            console.log("Tag open Click");
            var width = "40%";  
            if(isMobile()){
                width = "100%"
            }   
            var overlayWidth = "100%";
            document.getElementById("tagSildebar").style.width = width;
            document.getElementById("overlayTag").style.width = overlayWidth;
            $(".page-header-fixed").addClass("overflow-hidden");
            


        }
        

        function closeNav() {
            document.getElementById("tagSildebar").style.width = "0";
            document.getElementById("overlayTag").style.width = "0";
            $(".page-header-fixed").removeClass("overflow-hidden");

        }
        function openModal() {
            $(".page-header-fixed").removeClass("overflow-hidden");
        }
        

          $(".create-tag-add").click( function()
             {
                // $('#loginmodal').modal('hide')
                // $('#registermodal').modal('show')
                $("#tagSildebar").width( 0 );
                $("#overlayTag").width( 0 );
             });
        </script>
        <script type="text/javascript">

           $('.main-text-area-content').on('change keyup keydown paste cut', 'textarea', function (){
              $(this).height(0).height(this.scrollHeight);
            }).find( 'textarea' ).change();

           $('.inputfile-3').change(function(e) {
            main_modal_preview_image(e);
          });

          function main_modal_preview_image(event) {
            var total_file = $('.inputfile-3')[0].files.length;
            $('#main_modal_preview_image').html('');
            for(var i = 0; i < total_file; i++) {
              
              $('#main_modal_preview_image').append("<span class=\"pip\">" + "<img class=\"imageThumb img-responsive notes-main-img\" src=\"" + URL.createObjectURL(event.target.files[i]) + "\" width=\"auto\" height=\"160px\"  />" + "</span>");
              
            }
          }

           $(document).ready(function() { 
              $(".color-modal").click(function(){
                var color = $(this).attr("data-value");
                
                // $(".notes-img-details").css("background-color", color);
                // $(".notes-img-add-details").css("background-color", color);
                $(".notes-modal").css("background-color", color);
              });

           });


            function deleteModalPreview(){
              $(".main_modal_preview_image").css("display", "none");
              
            }
            
            var options = {
              data: ["People", "Company", "Follow-Up", "Sales", "Marketing", "Finance"]
            };

           $("#header-search-input").easyAutocomplete(options);
           function searchList(){
            $(".form-search").css("display", 'block');
            $(".search-tool").css("display", 'none');
           }
           function searchClose(){
            $(".form-search").css("display", 'none');
            $(".search-tool").css("display", 'initial');
            $('.header-search-input').val('');
            $(".flat-close").css("visibility", 'hidden');
          }

          $('#header-search-input').bind('keyup change',function(){
            
              if(this.value.length > 0){
                console.log(this.value.length);
                $(".flat-close").css("visibility", 'visible');
                  
              }
             
          });
           
        </script>