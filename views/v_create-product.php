<main>
    <div class="container">
<form  action="./create_product.php" method="post" enctype="multipart/form-data"class="row g-3">
  <div class="col-md-5">
    <label for="inputEmail4"  class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="inputEmail4">
    <?php if (!empty($systemErrors['title'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['title']); ?></small> 
                        <?php } ?>
  </div>
  <div class="col-md-5">
    <label for="inputPassword4" class="form-label">Description</label>
    <input type="text" name="description" class="form-control" id="inputPassword4">
    <?php if (!empty($systemErrors['description'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['description']); ?></small> 
                        <?php } ?>
  </div>
  <div class="col-5">
    <label for="inputAddress"  class="form-label">Brand</label>
    <input type="text" name="brand" class="form-control" id="inputAddress" >
    <?php if (!empty($systemErrors['brand'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['brand']); ?></small> 
                        <?php } ?>
  </div>
  <div class="col-4">
    <label for="inputAddress2"  class="form-label">Price</label>
    <input type="number"  name="price" class="form-control" id="inputAddress2" placeholder="$">
    <?php if (!empty($systemErrors['price'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['price']); ?></small> 
                        <?php } ?>
  </div>
  <div class="col-md-4">
    <label for="inputCity"  class="form-label">Quantity</label>
    <?php if (!empty($systemErrors['stock'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['stock']); ?></small> 
                        <?php } ?>
    <input type="number" name="stock" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Category</label>
    <select name="category"id="inputState" class="form-select">
      <option disabled>Choose Category</option>
      <option value="Wood">Wood</option>
      <option value="Abstract">Abstract</option>
      <option value="Modern">Modern</option>
      <option value="Glass">Glass</option>
      <option value="Ceramic">Ceramic</option>
    </select>
  </div>

  <div class="col-md-2">
  <label for="inputState"  class="form-label"> Availability</label>
    <select  name="status" id="inputState" class="form-select">
      <option disabled>Available</option>
      <option value=1>true</option>
      <option value=0>false</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Barcode</label>
    <input type="number" name="barcode" class="form-control" id="inputZip">
    <?php if (!empty($systemErrors['barcode'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['barcode']); ?></small> 
                        <?php } ?>
  </div>
  
  Select Image File to Upload:
    <input type="file" name="file">
    <?php if (!empty($systemErrors['image'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['image']); ?></small> 
                        <?php } ?>
  <div class="col-12">
    <button type="submit" name="upload" class="btn btn-primary mb-5">Create Product!</button>
  </div>
</form>
</div>






