<style>
 th {
    background-color: #36304a; ;
    color: white;
}

.img-responsive{
  display: block;
  width: 300px;
  height: 200px;
}
</style>
<div class="container">
   <h2>Image Display</h2>     
   <hr class="mt-2 mb-5">
  <?php foreach ($Images as $Imagedata) { ?>
      <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
        <img class="img-fluid img-thumbnail img-responsive"  src="<?php echo $Imagedata['image']; ?>" > 
             
          </a>
    </div>
  
  <?php } ?>
  
 </div>


