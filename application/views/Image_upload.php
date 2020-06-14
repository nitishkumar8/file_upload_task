<div class="container">
<p id="targetLayer"></p> 
   <form method="post" id="uploadForm" post="method" enctype="multipart/form-data">    
    <div class="form-group">
      <label for="exampleFormControlFile1">Multiple Image Upload</label>
      <hr class="mt-2 mb-5">
       <input type="file" name="image_file[]" class="form-control-file" id="exampleFormControlFile1" accept="image/x-png,image/gif,image/jpeg" multiple required="">
     </div> 

     <div class="form-group">
      <input type="Submit" class="btn btn-warning btn-sm" value="submit">
     </div>
   </form>
 </div>
  <hr>

<script type="text/javascript">
$(document).ready(function (e){
$("#uploadForm").on('submit',(function(e){
e.preventDefault();

//alert('hello');
$.ajax({
url: "<?php echo base_url() ?>welcome/ajax_upload",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
$("#targetLayer").html(data);

},
error: function(){} 	        
});
}));
});
</script>