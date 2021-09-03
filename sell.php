<?php include("header.php") ?>

 <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Sell Your Product</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" novalidate name="form" action="action.php?pid=4" method="POST" enctype="multipart/form-data" >

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="name" placeholder="Your Full Name" required>
                               <!-- <div class="valid-feedback">Username field is valid!</div>
                               <div class="invalid-feedback">Username field cannot be blank!</div> -->
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="add" placeholder="Your Address Around the College" required>
                                <!-- <div class="valid-feedback">Username field is valid!</div>
                                <div class="invalid-feedback">Username field cannot be blank!</div> -->
                             </div>

                             <div class="col-md-12">
                                <input class="form-control" type="number" name="cno" placeholder="Your Phone number" required>
                                <!-- <div class="valid-feedback">Username field is valid!</div>
                                <div class="invalid-feedback">Username field cannot be blank!</div> -->
                             </div>

                             <div class="col-md-12">
                                <select class="form-select mt-3" required name="year">
                                      <option selected disabled value="">Which Year </option>
                                      <option value="first">1st</option>
                                      <option value="second">2nd</option>
                                      <option value="third">3rd</option>
                                      <option value="fourth">4th</option>
                               </select>
                                <!-- <div class="valid-feedback">You selected a position!</div>
                                <div class="invalid-feedback">Please select a position!</div> -->
                           </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="pname" placeholder="Product Name" required>
                                 <!-- <div class="valid-feedback">Email field is valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div> -->
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="number" name="price" placeholder="Product Price" required>
                                 <!-- <div class="valid-feedback">Email field is valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div> -->
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="detail" placeholder="Product Description" required>
                                 <!-- <div class="valid-feedback">Email field is valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div> -->
                            </div>

                           <div class="col-md-12">
                                <select class="form-select mt-3" required name="cat">
                                      <option selected disabled value="">Product Category</option>
                                      <option value="Books/Notes">Books</option>
                                      <option value="Furniture">Furniture</option>
                                      <option value="Sports">Sports</option>
                                      <option value="Gym Essentials">Gym Essentials</option>
                                      <option value="Vehicles">Vehicles</option>
                                      <option value="Electronics">Electronics</option>
                                      <option value="Home Essentials">Kitchen Accessories</option>
                                      <option value="Miscellaneous">Other</option>
                               </select>
                                <!-- <div class="valid-feedback">You selected a position!</div>
                                <div class="invalid-feedback">Please select a position!</div> -->
                           </div>
                           <div class="col-md-12">
                            <input class="form-control" type="file" id="img" name="img">

                        </div>


                        <!-- <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label">I confirm that all data are correct</label>
                         <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                        </div>
                   -->

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" name="submit"  class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>
