<div class="card">
    <div class="card-body">
    <form id="promoForm" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="row">
                 <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Share No</label>
                        <select class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one" name="share_no">
                        <option value="0">Select </option>
                            <?php foreach($shareno as $row):?>
                            <option value="<?php echo strtolower($row->share_no);?>"> 
                            <?php echo ucwords($row->share_no);?>
                         </option>
                        <?php endforeach;?>            
                        </select>
                    </div>
                </div>  

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" 
                        id="first_name" placeholder="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Middle Name</label>
                        <input type="text" class="form-control" name="m_name" id="m_name" 
                     placeholder="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="l_name" 
                        id="l_name" placeholder="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Date Of Birth</label>
                        <input class="form-control" type="date" id="start" name="dob" value=""  min="1900-01-01" max="2005-12-12">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Education</label>
                        <input type="text" class="form-control" name="education" placeholder="Education">
                    </div>
                </div> 
            </div>

            <div class="row">
                
                           
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Contact No</label>
                        <input type="text" class="form-control" name="contact" pattern="[0-9]{10}" placeholder="Contact No">
                    </div>
                </div>
                        
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">State</label>
                        <select class="form-control form-select select2" data-bs-placeholder="Select" 
                        name="state" id="state">
                        <option value="0">Select </option>
                         <?php foreach($state as $row):?>
                     <option value="<?php echo strtolower($row->s_id);?>">   
                    <?php echo ucwords($row->s_name);?> - <?php echo ucwords($row->state_id);?> </option>
                        <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                <label class="form-label">District</label>
                                        <select class="form-control form-select select2" 
                                        data-bs-placeholder="Select" name="dist" id="dist">
                                                    <option value="0">Select </option>
                                                    
                                        </select>
                                    </div>
                </div>
            </div>

            <div class="row">
                
            <div class="col-md-4">
            <div class="form-group">
                                        <label class="form-label">Taluk</label>
                                        <select class="form-control form-select select2" 
                                        data-bs-placeholder="Select" name="taluk" id="taluk">
                                                    <option value="0">Select </option>
                                                    
                                        </select>
                                    </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                                        <label class="form-label">Gram Panchayath</label>
                                        <select class="form-control form-select select2" 
                                        data-bs-placeholder="Select" name="gp" id="gp">
                                        <option value="0">Select </option>
                                        </select>
                                    </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                                        <label class="form-label">Village</label>
                                        <select class="form-control form-select select2" 
                                        data-bs-placeholder="Select" name="village" id="village">
                                        <option value="0">Select </option>
                                        </select>
                                    </div>
            </div>
                                    </div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="form-group">
                        <label class="form-label">PIN Code</label>
                                        <select class="form-control form-select select2" data-bs-placeholder="Select" name="pin" id="pin">
                                        <option value="0">Select </option>
                                        </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Adhar No</label>
                            <input type="text" class="form-control" name="adhar" 
                             placeholder="Adhar No"> 
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">PAN </label>
                        <input type="text" class="form-control" name="pan"
                          placeholder="PAN No">
                    </div>
                </div>
                </div>
                
                
                
          

            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Voter ID</label>
                        <input type="text" class="form-control" name="voter"  placeholder="Voter ID">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Driver Licence No</label>
                        <input type="text"  class="form-control" name="dl"  placeholder="Driver Licence No">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Ration Card No</label>
                        <input type="text" class="form-control" name="rationcard"  placeholder="Ration Card No">
                    </div>
                </div>
                
                
            </div>

            

            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group">
                    <label class="form-label">Passport No</label>
                    <input type="text" class="form-control" name="passportno" 
                     placeholder="Passport No">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Document Upload</label>
                        <input type="file" class="form-control" 
                        accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="files">
                    </div>
                </div>
            </div>
        
            <div class="mt-4 btn-list text-end">
            <input class="btn btn-facebook" type="reset" name="reset"
                 id="fpo">Reset</input>
            <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Submit" />
            </div>
        </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
      // Initialize Select2
      $('.input-group').select2({
        allowClear: true,
        tags: true,
        dropdownCssClass: 'bootstrap'
      });

      // Handle manual input
      $('#myInput').on('select2:close', function() {
        var selectedValue = $(this).val();
        if (selectedValue === null || selectedValue.trim() === '') {
          // No value selected, enable manual input
          $(this).prop('disabled', false);
        } else {
          // Value selected from the dropdown, disable manual input
          $(this).prop('disabled', true);
        }
      });

      // Display entered value
      $('#myInput').on('input', function() {
        var enteredValue = $(this).val();
        $('#displayValue').text(enteredValue);
      });
    });
  </script>