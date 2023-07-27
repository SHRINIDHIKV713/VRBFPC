<div class="card">
    <div class="card-body">
    <form id="shareForm" enctype="multipart/form-data">
        <div class="card-header">
            <div class="card-title">Personal Information</div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Name of FPO<span class="text-red">*</span></label>
                     
                        <select class="form-control select2 form-select" data-placeholder="Choose one" name="fpo">
                            <option label="Choose one">
                        </option>
                       
                            <?php foreach($fponame as $row):?>
                            <option value="<?php echo strtolower($row->f_name);?>"> 
                            <?php echo ucwords($row->f_name);?>
                         </option>
                        <?php endforeach;?>
                        </select>  
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">BOD Approval Date </label>
                        <input class="form-control" type="date" id="start" max="<?php echo date("Y-m-d"); ?>" 
                        name="bod_date">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Salutations</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" name="salutations">
                        <option label="Choose one">
                        </option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="f_name" 
                        id="f_name" placeholder="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Middle Name</label>
                        <input type="text" class="form-control" name="m_name" placeholder="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="l_name" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Gender</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" name="gender">
                        <option label="Choose one">
                        </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Father / Husband Name</label>
                        <input type="text" class="form-control" name="father_name" placeholder="">  
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Mother Name</label>
                        <input type="text" class="form-control" name="mother_name" placeholder="">                
                    </div>
                </div>
                
            </div>

            <div class="row">
            
                
                <div class="col-md-4">
                <div class="form-group">
                        <label class="form-label">Contact Number</label>
                        <input type="number" class="form-control" name="contact_no">                
                    </div>
                </div>
               
               
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">State</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="state" id="state">
                        <option value="0">Select </option>
                            <?php foreach($state as $row):?>
                            <option value="<?php echo strtolower($row->s_id);?>"> 
                            <?php echo ucwords($row->s_name);?>
                         </option>
                        <?php endforeach;?>
                        </select>               
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">District</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="dist" id="dist">
                        <option value="0">Select </option>
                        </select>                
                    </div>
                </div>
            </div>
           
            <div class="row">
           
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Taluk</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="taluk" id="taluk">
                        <option value="0">Select </option>
                        </select>                 
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Gram Panchayath</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="gp" id="gp">
                        <option value="0">Select </option>
                        </select>                 
                    </div>
                </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Village</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="village" id="village">
                        <option value="0">Select </option>
                        </select>                 
                    </div>
                </div>
                
               
            </div>
            <div class="row">
            
                
                
              <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">PIN Code</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="pin" id="pin">
                        <option value="0">Select </option>
                        </select>                 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <div class="form-group">
                            <div class="form-floating floating-label1">
                                <textarea class="form-control" id="floatingTextarea2" name="address" 
                                style="height: 90px"></textarea>
                                <label for="floatingTextarea2">Registered Address</label>
                            </div>
                        </div>                
                    </div>
                </div>
            </div>
       
            <div class="card-header">
                <div class="card-title">KYC Details</div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Adhar No</label>
                        <input type="text" class="form-control" name="adhar_no" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Voter ID</label>
                        <input type="text" class="form-control" name="voter_id" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">PAN</label>
                        <input type="text" class="form-control" name="pan" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">DL</label>
                        <input type="text" class="form-control" name="dl">
                    </div>
                </div>
            </div>
        
           
            <div class="card-header">
                <div class="card-title">Nominee Details</div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Nominee's Name</label>
                        <input type="text" class="form-control" name="nominee_name" placeholder="">                
                    </div>
                </div>
                                    
                                    <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Nominee's Gender</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="nominee_gender">
                        <option label="Choose one">
                        </option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Nominee's Date Of Birth</label>
                        <input class="form-control" type="date" id="start" name="nominee_dob" value=""  min="1900-01-01" max="2005-12-12">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Relationship With Applicant</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="nominee_relation">
                        <option label="Choose one">
                        </option>
                        <option value="Father">Father</option>
                        <option value="Mother">Mother</option>
                        <option value="Son">Son</option>
                        <option value="Daughter">Daughter</option>
                        <option value="Spouse">Spouse</option>
                        </select>
                    </div>
                </div>
                
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Nominee's Address</label>
                        <div class="form-floating floating-label1">
                                <textarea class="form-control" id="floatingTextarea2" 
                                name="nominee_address" 
                                style="height: 90px"></textarea>
                                <label for="floatingTextarea2">Nominee's Address</label>
                        </div>                
                    </div>
                </div>
                    
            </div>

                     
            
       
         

                <div class="card-header mt-4">
                    <div class="card-title">Share Details</div>
                </div>                
                <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Share Value</label>
                        <input type="text" class="form-control" name="share_value" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">No. Of Share Alloted</label>
                        <input type="text" class="form-control" name="share_alloted" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Date Of Allotment</label>
                        <input class="form-control" type="date" id="start" name="allotment_date" value="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Share Register Page No.</label>
                        <input type="text" class="form-control" name="register_no" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
            </div>     
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Share Allotment No./Share No.</label>
                        <input type="text" class="form-control" name="share_no" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Share Distinctive No.</label>
                        <input type="text" class="form-control" name="share_distinctive_no" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Amount Paid</label>
                        <input type="text" class="form-control" name="amount" 
                        id="amount_paid" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Date Of Amount Paid</label>
                        <input class="form-control" type="date" id="start" name="date_of_payment" value="">
                    </div>
                </div>
            </div>         
            
          

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Mode Of Payment</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" name="mode_of_payment" onchange="handleModeOfPaymentChange(this)">
                        <option label="Choose one">
                        </option>
                        <option value="Cash">Cash</option>
                        <option value="Cheque">Cheque</option>
                        <option value="DD">DD</option>
                        <option value="NEFT/IMPS">NEFT/IMPS</option>
                        <option value="Partial Credit">Partial Credit</option>
</select>

                        
            
                    </div>
                </div>
            </div>



<div id="chequeFieldsContainer">
    <div class="col-md-12">
    <div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label">Cheque/DD Date</label>
            <input class="form-control" type="date" id="start" name="dd_date" value="">
        </div>
    </div>
    <!-- More fields for Cheque/DD payment -->
    <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Cheque/DD No</label>
                        <input type="text" class="form-control" name="dd_no" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label"> Drawee Bank Name</label>
                        <input type="text" class="form-control" name="drawee_bank_name" 
                        pattern="^[A-Za-z -]+$">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Account Holder Name</label>
                        <input class="form-control" type="text" name="account_holder_name" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Account No.</label>
                        <input type="number" class="form-control" name="account_no" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Name Of The Bank</label>
                        <input type="text" class="form-control" name="bank_name" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">IFSC Code</label>
                        <input type="text" class="form-control" name="ifsc" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Branch Address</label>
                        <div class="form-floating floating-label1">
                                <textarea class="form-control" id="floatingTextarea2" name="branch_address" 
                                style="height: 90px"></textarea>
                                <label for="floatingTextarea2">Branch Address</label>
                            </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
              
            <div class="mt-4 btn-list text-end">
                <input class="btn btn-facebook" type="reset" name="reset"
                 id="share">Reset</input>
                 <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Submit" />
            
                                        </div>
        </div>
    </form>
    </div>
</div>