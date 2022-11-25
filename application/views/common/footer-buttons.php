<footer class="foo_bar">
  <div class="foo_btn">
    <button type="submit" class="btn btn_save">Save <i class="fa fa-check"></i></button>
    <button type="button" class="btn btn_processing" style="display: none;"><i class='fa fa-spinner'></i> Saving...</button>
    <?php 
      if(VIEW_TYPE_ADD == $view_type){
     ?>
    <input type="checkbox" class="no-redirect hidden" />
    <button type="button" class="btn btn_primary btn_save_new btn-save">Save & New  <i class="fa fa-check"></i></button>
    <?php 
      }
     ?>
     <button type="button" class="btn btn_can">Cancel <i class="fa fa-times"></i></button>
    
  </div>
</footer>