<style>
 th {
    background-color: #36304a; ;
    color: white;
}
  tbody tr {
    font-size: 14px;
  }

</style>
<div class="container">
    <h2>Export Details</h2> 
    <hr class="mt-2 mb-5">
    <p style="text-align: right;">

    <a href="<?php echo base_url() ?>welcome/user_download" class="btn btn-success btn-sm">Excel Export</a>
   </p>           
  <table class="table table-striped">
    <thead >
      <tr>

        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Mobile</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($user_details as $user) {
       ?>
      <tr>
        <td><?php echo $user->Id; ?></td>
        <td><?php echo $user->first_name; ?></td>
        <td><?php echo $user->last_name; ?></td>
        <td><?php echo $user->mobile; ?></td>
        <td><?php echo $user->Email; ?></td>
        
      </tr><?php } ?>
     
    </tbody>
  </table>
 </div>
