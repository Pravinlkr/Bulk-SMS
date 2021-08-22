<?php 
include 'components/header.php'; 
include 'auth.php'
?>
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="container">
          <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <div class="formBox" style="margin-top:20%;">
                <h5>Single SMS Service</h5>
                <hr />
                <form>
                  <div class="form-group">
                    <label for="inputphone">Phone Number*</label>
                    <input type="number" class="form-control" id="inputphone" placeholder="Enter Phone Number">
                  </div>
                  <div class="form-group">
                    <label for="inputMessage">Message*</label>
                    <textarea id="inputMessage"  style="width:100%; border:none; outline:none; padding:10px;" rows="5"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
              </div>
            </div>
            <div class="col-sm-4"></div>
          </div>
		    </div>
		</div>
<?php include 'components/footer.php'; ?>
		