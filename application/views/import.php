<style>
 th {
    background-color: #222 ;
    color: white;
}

</style>
<div class="container">
   <p id="targetLayer"></p>   
   <form method="post" id="import_form" post="method" enctype="multipart/form-data">    
    <div class="form-group">
      <label for="exampleFormControlFile1">Excel File Upload</label>
      <hr class="mt-2 mb-5">
       <input type="file" name="file" id="file" class="form-control-file"  accept=".xls,.xlsx" multiple required="">
     </div> 

     <div class="form-group">
      <input type="Submit" class="btn btn-warning btn-sm" name="import" value="Import">
     </div>
   </form>
 </div>
 <hr>

<script type="text/javascript">
   $('#import_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"<?php echo base_url(); ?>welcome/import_excel",
   method:"POST",
   data:new FormData(this),
   contentType:false,
   cache:false,
   processData:false,
   success:function(data){
    //$('#file').val('');
    //load_data();
    alert(data);
   }
  })
 });
   

 </script>