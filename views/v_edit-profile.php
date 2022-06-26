<main>

<div class="container">
<form action="editprofile.php" method="POST">
<table class="table col-6 mb-5">
  <thead>
    <tr>
      <th style="color:#A68DAD" scope="col"> Edit Your Profile:</th>

    </tr>
  </thead>
  <tbody col-6>
    <tr>
      <th  style="color:#54BAB9" scope="row">Name:</th>
      <td> <input type="text" class="form-control" name="name" placeholder="First name" aria-label="First name" value="<?php  if(!empty($pname)) echo htmlspecialchars($pname); ?>"> </td>
    </tr>
    <tr>
      <th style="color:#54BAB9" scope="row">Last Name:</th>
      <td> <input type="text" class="form-control" name="last_name" placeholder="Last Name" aria-label="Last name" value="<?php  if(!empty($plastname)) echo htmlspecialchars($plastname); ?>"> </td>
    
    </tr>
    <tr>
      <th  style="color:#54BAB9" scope="row">Email: </th>
     
      <td colspan="2"><input type="text" class="form-control" name="email" placeholder="Email" aria-label="Email" value="<?php  if(!empty($pemail)) echo htmlspecialchars($pemail); ?>"><?php if (!empty($systemErrors['email'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['email']); ?></small> 
                        <?php } ?> </td>
    </tr>
    <tr>
      <th  style="color:#54BAB9" scope="row">Age: </th>
      <td   colspan="2"> <input type="number" class="form-control" name="age" placeholder="Age" aria-label="Age" value="<?php  if(!empty($p_age)) echo htmlspecialchars($p_age); ?>"> <?php if (!empty($systemErrors['age'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['age']); ?></small> 
                        <?php } ?>  </td>
    </tr>
    <tr>
      <th  style="color:#54BAB9" scope="row">Gender: </th>
      <td  colspan="2">  <div class="col-6 mt-3">
  <select name="gender" class="form-select col-4" aria-label="Default select example">
  <option disabled>Choose Gender</option>
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="other">Other</option>
</select> </td>
    </tr>
  
  </tbody>
</table>
<button  name="save" class="btn btn-success mb-5" type="submit"> Save Changes </button>
</div>
      </form>
</main>