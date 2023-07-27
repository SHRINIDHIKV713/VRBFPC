<?php
    $id = $_GET['id'];
    
    $query = $this->db->select('id, f_name, date_of, registered_address, cin_no, gst_no, 
    pan_no,contact_person, designation, contact_no, email,fpo_account_no,fpo_bank_name,fpo_ifsc, 
    ceo_name,ceo_mobile_number,ceo_email_id,ca_name,ca_mobile_number,status')->from('fpo')->where('id',$id)->get();
    $count = $query->num_rows();    
?>
<div class="card">
    <div class="card-body">
    <form id="fpoForm" enctype="multipart/form-data">
    <?php if($count != 0): ?>
            <?php foreach($query->result() as $row): ?>
        <div class="card-header">
            <div class="card-title">Profile Information</div>
        </div>
        
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Name Of The FPO<span class="text-red">*</span></label>
                        <input type="hidden" name="fid" id="fid" value="<?php echo $id ?>">
                        <input type="text" class="form-control" name="edit_f_name" id="edit_f_name" 
                        pattern="^[A-Za-z -]+$" placeholder="FPO Name" value="<?php echo $row->f_name?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Date Of Incorporation</label>
                        <input class="form-control" type="date" id="start" 
                        max="<?php echo date("Y-m-d"); ?>" 
                        name="edit_date_of" value="<?php echo $row->date_of?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">CIN No.</label>
                        <input type="text" class="form-control" name="edit_cin_no" 
                       value="<?php echo $row->cin_no?>"
                        >
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">GST No.</label>
                        <input type="text" class="form-control" name="edit_gst_no" 
                         value="<?php echo $row->gst_no?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">PAN No.</label>
                        <input type="text" class="form-control" name="edit_pan_no" 
                         value="<?php echo $row->pan_no?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Contact Person Name</label>
                        <input type="text" class="form-control" name="edit_contact_person" 
                        pattern="^[A-Za-z -]+$" placeholder="Contact Person Name" 
                        value="<?php echo $row->contact_person?>">
                    </div>
                </div>
               
            </div>
            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                    <label class="form-label">Designation</label>
                        <select class="form-control select2 form-select"
                         data-placeholder="Choose one" type="text" name="edit_designation"
                         value="<?php echo $row->designation?>">
                           
<option value="CEO" <?php echo ('CEO' == $row->designation) ? 'selected="selected"' : '';?> >CEO</option>
                            
<option value="President" <?php echo ('President' == $row->designation) ? 'selected="selected"' : '';?> >President</option>
<option value="Board of director" <?php echo ('Board of director' == $row->designation) ? 'selected="selected"' : '';?> >Board of director</option>
<option value="Accountant" <?php echo ('Accountant' == $row->designation) ? 'selected="selected"' : '';?> >Accountant</option>
                            
                        </select>  
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Contact No.</label>
                        <input type="text" class="form-control" name="edit_contact_no" 
                        pattern="[0-9]{10}" value="<?php echo $row->contact_no?>">
                    </div>
                </div>
               
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Contact Person Email ID</label>
                        <input type="email" class="form-control" name="edit_email" 
                        placeholder="Enter Your Email" value="<?php echo $row->email?>">
                    </div>
                </div>
            </div>
            <div class="row">
            
                <div class="col-md-4">
                    <label class="form-label">Registered Address</label>
                        <div class="form-group">
                            <div class="form-floating floating-label1">
                                <textarea class="form-control" id="floatingTextarea2" 
                                name="edit_registered_address" 
                                style="height: 90px"><?= $row->registered_address ?></textarea>
                                <label for="floatingTextarea2">Registered Address</label>
                            </div>
                        </div>
                </div>
            </div>

            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">CEO Name</label>
                        <input type="text" class="form-control" name="edit_ceo_name" 
                         placeholder="CEO Name" value="<?php echo $row->ceo_name?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">CEO Mobile Number</label>
                        <input type="number" class="form-control" name="edit_ceo_mobile_number" 
                          value="<?php echo $row->ceo_mobile_number?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">CEO Email Id</label>
                        <input type="email" class="form-control" name="edit_ceo_email_id" 
                     placeholder="CEO Email Id" value="<?php echo $row->ceo_email_id?>">
                    </div>
                </div>

            </div>

        <div class="row">
        <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="edit_password" 
                     placeholder="password" value="<?php echo $row->ceo_email_id?>">
                    </div>
                </div>
            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Company CA Name</label>
                        <input type="text" class="form-control" name="edit_ca_name" 
                         value="<?php echo $row->ca_name?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Company CA Mobile Number</label>
                        <input type="number" class="form-control" name="edit_ca_mobile_number" 
                         placeholder="Mobile Number" value="<?php echo $row->ca_mobile_number?>">
                    </div>
                </div>
            </div>

            <div class="card-header">
                <div class="card-title">FPO Bank Details</div>
            </div>
            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">FPO Bank A/c No.</label>
                        <input type="text" class="form-control" name="edit_fpo_account_no" 
                        placeholder="A/c No." value="<?php echo $row->fpo_account_no?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">FPO Bank Name</label>
                        <input type="text" class="form-control" name="edit_fpo_bank_name" 
                        value="<?php echo $row->fpo_bank_name?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">IFSC Code</label>
                        <input type="text" class="form-control" name="edit_fpo_ifsc" 
                         value="<?php echo $row->fpo_ifsc?>">
                    </div>
                </div>
            </div>
           
            <div class="card-header">
                <div class="card-title">License Information</div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <!-- <div class="form-group">
                        
                        <label class="form-label">FSSAI License No</label>
                        <input type="text" class="form-control" name="fssai" pattern="^\d{4}-\d{4}-\d{4}-\d{1}$" placeholder="FSSAI License No">
                    </div>  pattern="^\d{4}-\d{4}-\d{4}-\d{1}$" -->
                    <div class="form-group ">
                            <input type="checkbox" name="fs" value="add_fs" class="m-2">Add FSSAI License
                            
                            <div class="col-md-12">
                                <div id="fs_license" style="display: none">
                                <label class="form-label">FSSAI License No.</label>
                                <input type="text" class="form-control" name="fssai" 
                               
                                placeholder="FSSAI License No">
        
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div id="fs_license1" style="display: none">
                                    <label class="form-label">License Validity</label>
                                    <select class="form-control select2 form-select"
                                     data-placeholder="Choose one" name="fs_validity"
                                     value="<?php echo $row->fs_validity?>">
                                   
                                    <option value="1 year">1 year</option>
                                    <option value="2 year">2 year</option>
                                    </select>

                                    <label class="form-label">Upload License<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control"
                         accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="f_license">
                 
                                </div>
                            
                            </div>     
                        </div> 
                </div>

                <div class="col-md-4">
                    
                    <div class="form-group ">
                            <input type="checkbox" name="gl" value="add_gl" class="m-2">Add General License
                            
                            <div class="col-md-12">
                                <div id="gl_license" style="display: none">
                                <label class="form-label">General License No.</label>
                                <input type="text" class="form-control" name="general_license" placeholder="General License No">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div id="gl_license1" style="display: none">
                                    <label class="form-label">License Validity</label>
                                    <select class="form-control select2 form-select" 
                                    data-placeholder="Choose one" name="gl_validity">
                                    <option label="Choose one">
                                    </option>
                                    <option value="1 year">1 year</option>
                                    <option value="2 year">2 year</option>
                                    </select>
                                    <label class="form-label">Upload License<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control" 
                        accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="g_license">
                 
                                </div>
                            
                            </div>
                                
                               
                           
                    </div> 
                </div>
                <div class="col-md-4">
                    <!-- <div class="form-group">
                        <label class="form-label">Trader License No</label>
                        <input type="text" class="form-control" name="trader_license" placeholder="Trader License No">
                    </div> -->
                    <div class="form-group ">
                            <input type="checkbox" name="td" value="add_td" class="m-2">Add Trader License
                            
                            <div class="col-md-12">
                                <div id="td_license" style="display: none">
                                <label class="form-label">Trader License No.</label>
                                <input type="text" class="form-control" name="trader_license" placeholder="Trader License No">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div id="td_license1" style="display: none">
                                    <label class="form-label">License Validity</label>
                                    <select class="form-control select2 form-select" 
                                    data-placeholder="Choose one" name="td_validity">
                                    <option label="Choose one">
                                    </option>
                                    <option value="1 year">1 year</option>
                                    <option value="2 year">2 year</option>
                                    </select>
                                    <label class="form-label">Upload License<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control" 
                        accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="t_license">
                 
                                </div>
                            
                            </div>
                                
                               
                           
                    </div> 
                </div>
            </div>

            <div class="row">
               <div class="col-md-4">
                    <!-- <div class="form-group">
                        <label class="form-label">APMC License No</label>
                        <input type="text" class="form-control" name="apmc_license" placeholder="APMC License No">
                    </div> -->
                    <div class="form-group ">
                            <input type="checkbox" name="apmc" value="add_apmc" class="m-2">Add APMC License
                            
                            <div class="col-md-12">
                                <div id="apmc_license" style="display: none">
                                <label class="form-label">APMC License No.</label>
                                <input type="text" class="form-control" name="apmc_license" placeholder="APMC License No">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div id="apmc_license1" style="display: none">
                                    <label class="form-label">License Validity</label>
                                    <select class="form-control select2 form-select" 
                                    data-placeholder="Choose one" name="apmc_validity">
                                    <option label="Choose one">
                                    </option>
                                    <option value="1 year">1 year</option>
                                    <option value="2 year">2 year</option>
                                    </select>
                                    <label class="form-label">Upload License<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control" 
                        accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="a_license">
                 
                                </div>
                            
                            </div>
                                
                               
                           
                    </div> 
                </div>
                <div class="col-md-4">
                    <!-- <div class="form-group">
                        <label class="form-label">Input License No</label>
                        <input type="text" class="form-control" name="input_license" placeholder="Input License No">
                    </div> -->
                    <div class="form-group ">
                            <input type="checkbox" name="il" value="add_il" class="m-2">Add Input License
                            
                            <div class="col-md-12">
                                <div id="il_license" style="display: none">
                                <label class="form-label">Input License No.</label>
                                <input type="text" class="form-control" name="input_license" placeholder="Input License No">
                                         </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div id="il_license1" style="display: none">
                                    <label class="form-label">License Validity</label>
                                    <select class="form-control select2 form-select" 
                                    data-placeholder="Choose one" name="input_validity">
                                    <option label="Choose one">
                                    </option>
                                    <option value="1 year">1 year</option>
                                    <option value="2 year">2 year</option>
                                    </select>
                                    <label class="form-label">Upload License<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control" 
                        accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="i_license">
                 
                                </div>
                            
                            </div>
                                
                               
                           
                    </div> 
                </div>
                <!--<div class="col-md-4">-->
                <!--    <div class="form-group">-->
                <!--        <label class="form-label">Upload License<span class="text-red">*</span></label>-->
                <!--        <input type="file" id="certificate" class="form-control" accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="certificate">-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="form-group ">
                         
                            <button type="button" class="btn btn-facebook ms-3"  
                            name="add_license" value="add_l"> Add License</button>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div id="new_license" style="display: none">
                                            <label class="form-label">License  Name</label>
                                            <input type="text" class="form-control" name="license_name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="new_license1" style="display: none">
                                            <label class="form-label">License No.</label>
                                            <input type="text" class="form-control" name="license_value">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="new_license2" style="display: none">
                                            <label class="form-label">License Validity</label>
                                            <select class="form-control select2 form-select" 
                                            data-placeholder="Choose one" name="license_validity">
                                            <option label="Choose one">
                                            </option>
                                            <option value="1 year">1 year</option>
                                            <option value="2 year">2 year</option>
                                            </select>
                                            
                                        </div>
                                    
                                    </div>
                                     <div class="col-md-4">
                                        <div id="upload_license" style="display: none">
                                            <label class="form-label">Upload License<span class="text-red">*</span></label>
                                            <input type="file" id="certificate" class="form-control" 
                                            accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" 
                                            name="licence_certificate">
                                        </div>
                                    </div>
                                
                                </div>
                        
                            </div>
                           
                        </div> 
                        <div id = "add_area" style="display: none">
                            <button type="button" class="btn btn-facebook ms-3"  
                                name="button" onclick="appendAddchild()" id="add_lead"> <i class="fa fa-plus"></i> </button>
                            
                        </div>
                        <div class="col-md-12">
                            <div>
                                  
                                    <div id = "lead_area">
                                        <div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="form-label">License Name</label>
                                                        <input type="text" class="form-control" name="license_feild[]" id="license_feild">
                                                    </div>
                                                    <div class="col-md-4">
                                                    <label class="form-label">License No.</label>
                                                        <input type="text" class="form-control" 
                                                        name="license_value[]" id="license_value">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">License Validity</label>
                                                        <select class="form-control select2 form-select" data-placeholder="Choose one" name="license_validity[]" id="license_validity">
                                                        <option label="Choose one">
                                                        </option>
                                                        <option value="1 year">1 year</option>
                                                        <option value="2 year">2 year</option>
                                                        </select>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Upload License<span class="text-red">*</span></label>
                                                            <input type="file" id="certificate" 
                                                            class="form-control" 
                                                            accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="certificate">
                                                        </div>
                                                    </div>
                                        
                                     </div>
                                     
                                    
                                   
                                
                            
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-facebook ms-3" style="margin-top: 0px;" name="button" onclick="removeAddchild(this)"> <i class="fa fa-minus"></i> </button>
                                    <button type="button" class="btn btn-facebook ms-3"  
                                name="button" onclick="appendAddchild()" id="add_lead"> <i class="fa fa-plus"></i> </button>                                                            
                            </div>
                        </div>
                </div>
                
                
            </div>
            
               </div>
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