<?php
    $id = $_GET['id'];
    $query = $this->db->select('id,fpo,bod_date,salutations,f_name,m_name ,l_name,gender,father_name,mother_name,
    contact_no,state,dist,taluk,gp,village,pin,address,adhar_no,voter_id,pan,dl
    ,nominee_name,nominee_gender,nominee_dob,nominee_relation ,nominee_address,share_value,share_alloted,allotment_date
    ,register_no,share_no,share_distinctive_no,amount,date_of_payment,mode_of_payment,dd_date,dd_no,drawee_bank_name 
    ,account_holder_name,account_no,bank_name,branch_address,ifsc,status')->from('shareholders')->where('id',$id)->get();
    $count = $query->num_rows();    
?>
<div class="card">
    <div class="card-body">
    <form id="shareForm" enctype="multipart/form-data">
    <?php if($count != 0): ?>
            <?php foreach($query->result() as $row): ?>
        <div class="card-header">
            <div class="card-title">Personal Information</div>
        </div>
        <div class="col-md-12">
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Name of FPO<span class="text-red">*</span></label>
                     
                        <select class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one" name="edit_fpo">
                        <option label="Choose one">Choose</option>
                                
                                <option value="MARAVALLI FARMERS PRODUCER COMPANY LTD" <?php echo ('MARAVALLI FARMERS PRODUCER COMPANY LTD' == $row->fpo) ? 'selected="selected"' : '';?> >MARAVALLI FARMERS PRODUCER COMPANY LTD</option>
                              
                        </select>  
                          
            
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">BOD Approval Date </label>
                        <input class="form-control" type="date" id="start" 
                        max="<?php echo date("Y-m-d"); ?>" 
                        name="edit_bod_date" value="<?php echo $row->bod_date ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Salutations</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" name="edit_salutations">
                        <option label="Choose one">
                        </option>
                        <option value="Mr" <?php echo ('Mr' == $row->salutations) ? 'selected="selected"' : '';?> >Mr</option>
                                <option value="Mrs" <?php echo ('Mrs' == $row->salutations) ? 'selected="selected"' : '';?> >Mrs</option>
                                <option value="Miss" <?php echo ('Miss' == $row->salutations) ? 'selected="selected"' : '';?> >Miss</option>
            
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="hidden" name="shareid" id="shareid" value="<?php echo $id ?>">
                        <input type="text" class="form-control" name="edit_f_name" 
                        id="edit_f_name" placeholder="" value="<?php echo $row->f_name ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Middle Name</label>
                        <input type="text" class="form-control" name="edit_m_name" placeholder="" value="<?php echo $row->m_name ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="edit_l_name" placeholder="" value="<?php echo $row->l_name ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Gender</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" name="edit_gender">
                        <option label="Choose one">
                        </option>
                        <option value="Male" <?php echo ('Male' == $row->gender) ? 'selected="selected"' : '';?> >Male</option>
                                <option value="Female" <?php echo ('Female' == $row->gender) ? 'selected="selected"' : '';?> >Female</option>
            
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Father / Husband Name</label>
                        <input type="text" class="form-control" name="edit_father_name" placeholder="" value="<?php echo $row->father_name ?>">  
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Mother Name</label>
                        <input type="text" class="form-control" name="edit_mother_name" placeholder="" value="<?php echo $row->mother_name ?>">                
                    </div>
                </div>
                
            </div>

            <div class="row">
            
                
                <div class="col-md-4">
                <div class="form-group">
                        <label class="form-label">Contact Number</label>
                        <input type="number" class="form-control" name="edit_contact_no" placeholder="" value="<?php echo $row->contact_no ?>">                
                    </div>
                </div>
               
               
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">State</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="state">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                        </select>               
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">District</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="dist">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                        </select>                
                    </div>
                </div>
            </div>
           
            <div class="row">
           
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Taluk</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="taluk">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                        </select>                 
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Gram Panchayath</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="gp">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                        </select>                 
                    </div>
                </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Village</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="village">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                        </select>                 
                    </div>
                </div>
                
               
            </div>
            <div class="row">
            
                
                
              <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">PIN Code</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="pin">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                        </select>                 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <div class="form-group">
                            <div class="form-floating floating-label1">
                                <textarea class="form-control" id="floatingTextarea2" name="edit_address" 
                                style="height: 90px"><?= $row->address ?></textarea>
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
                        <input type="text" class="form-control" name="edit_adhar_no" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->adhar_no ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Voter ID</label>
                        <input type="text" class="form-control" name="edit_voter_id" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->voter_id ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">PAN</label>
                        <input type="text" class="form-control" name="edit_pan" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->pan ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">DL</label>
                        <input type="text" class="form-control" name="edit_dl" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->dl ?>">
                    </div>
                </div>
            </div>
        
           
         
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Nominee's Name</label>
                        <input type="text" class="form-control" name="edit_nominee_name" placeholder="" value="<?php echo $row->nominee_name ?>">                
                    </div>
                </div>
                                    
                                    <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Nominee's Gender</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="nominee_gender">
                        <option label="Choose one">
                        </option>
                        <option value="Male" <?php echo ('Male' == $row->nominee_gender) ? 'selected="selected"' : '';?> >Male</option>
                       
                        <option value="Female" <?php echo ('Female' == $row->nominee_gender) ? 'selected="selected"' : '';?> >Female</option>
                       
                        
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Nominee's Date Of Birth</label>
                        <input class="form-control" type="date" id="start" 
                        name="edit_nominee_dob"  min="1900-01-01" max="2005-12-12" 
                        value="<?php echo $row->nominee_dob ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label class="form-label">Relationship With Applicant</label>
                    <input type="text" class="form-control" name="edit_nominee_relation" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->nominee_relation ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Nominee's Address</label>
                        <div class="form-floating floating-label1">
                                <textarea class="form-control" id="floatingTextarea2" name="edit_nominee_address" 
                                style="height: 90px"><?= $row->nominee_address ?></textarea>
                                <label for="floatingTextarea2">Nominee's Address</label>
                        </div>                
                    </div>
                </div>
                    
            </div>

                <div class="card-header">
                    <div class="card-title">Share Details</div>
                </div>                
                <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Share Value</label>
                        <input type="text" class="form-control" name="edit_share_value" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->share_value ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">No. Of Share Alloted</label>
                        <input type="text" class="form-control" name="edit_share_alloted" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->share_alloted ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Date Of Allotment</label>
                        <input class="form-control" type="date" id="start" name="edit_allotment_date" value="<?php echo $row->allotment_date ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Share Register Page No.</label>
                        <input type="text" class="form-control" name="edit_register_no" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->register_no ?>">
                    </div>
                </div>
            </div>     
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Share Allotment No./Share No.</label>
                        <input type="text" class="form-control" name="share_no" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->share_no ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Share Distinctive No.</label>
                        <input type="text" class="form-control" name="edit_share_distinctive_no" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->share_distinctive_no ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Amount Paid</label>
                        <input type="text" class="form-control" name="edit_amount" pattern="^[A-Za-z -]+$" value="<?php echo $row->amount ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Date Of Amount Paid</label>
                        <input class="form-control" type="date" id="start" name="edit_date_of_payment" value="<?php echo $row->date_of_payment ?>">
                    </div>
                </div>
            </div>                  
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Mode Of Payment</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="edit_mode_of_payment">

    
<option label="Choose one">
                        </option>
                       
                        <option value="Cash" <?php echo ('Cash' == $row->mode_of_payment) ? 'selected="selected"' : '';?> >Cash</option>
                        <option value="Cheque" <?php echo ('Cheque' == $row->mode_of_payment) ? 'selected="selected"' : '';?> >Cheque</option>
                        <option value="DD" <?php echo ('DD' == $row->mode_of_payment) ? 'selected="selected"' : '';?> >DD</option>
                        <option value="NEFT/IMPS" <?php echo ('NEFT/IMPS' == $row->mode_of_payment) ? 'selected="selected"' : '';?> >NEFT/IMPS</option>
                        <option value="Partial Credit" <?php echo ('Partial Credit' == $row->mode_of_payment) ? 'selected="selected"' : '';?> >Partial Credit</option>
            
                        
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
    <?php if ($row->mode_of_payment === 'Cheque' || $row->mode_of_payment === 'DD'): ?>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">Cheque/DD Date</label>
                <input class="form-control" type="date" id="start" name="edit_dd_date" value="<?php echo $row->dd_date ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">Cheque/DD No</label>
                <input type="text" class="form-control" name="edit_dd_no" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->dd_no ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">Drawee Bank Name</label>
                <input type="text" class="form-control" name="edit_drawee_bank_name" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->drawee_bank_name ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">Account Holder Name</label>
                <input class="form-control" type="text" name="edit_account_holder_name" value="<?php echo $row->account_holder_name ?>">
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="row">
    <?php if ($row->mode_of_payment === 'Cheque' || $row->mode_of_payment === 'DD'): ?>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">Account No.</label>
                <input type="number" class="form-control" name="edit_account_no" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->account_no ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">Name Of The Bank</label>
                <input type="text" class="form-control" name="edit_bank_name" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->bank_name ?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label">IFSC Code</label>
                <input type="text" class="form-control" name="edit_ifsc" pattern="^[A-Za-z -]+$" placeholder="" value="<?php echo $row->ifsc ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Branch Address</label>
                <div class="form-floating floating-label1">
                    <textarea class="form-control" id="floatingTextarea2" name="edit_branch_address" style="height: 90px"><?= $row->branch_address ?></textarea>
                    <label for="floatingTextarea2">Branch Address</label>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>







                
                
           
            
                
                
                
            
            <div class="mt-4 btn-list text-end">
            <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Save" />
            
                                        </div>
        </div>
        <?php endforeach; ?> <!-- end foreach -->
        <?php else: ?> No records found <?php endif; ?><!-- end if -->
    </form>
    </div>
</div>