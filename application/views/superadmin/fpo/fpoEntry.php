
<div class="card">
    <div class="card-body">
    <form id="fpoForm" enctype="multipart/form-data">
        <div class="card-header">
            <div class="card-title">Profile Information</div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Name Of The FPO<span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="f_name" id="f_name" 
                        pattern="^[A-Za-z -]+$" placeholder="FPO Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Date Of Incorporation</label>
                        <input class="form-control" type="date" id="start" 
                        max="<?php echo date("Y-m-d"); ?>" 
                        name="date_of">
                    </div>
                </div>
                <div class="col-md-4">
    <div class="form-group">
        <label class="form-label">CIN No.</label>
        <input type="text" class="form-control" name="cin_no" id="cin_no" placeholder="CIN No">
    </div>
</div>



            </div>

            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">GST No.</label>
                        <input type="text" class="form-control" name="gst_no" 
                        placeholder="GST No">
                    </div>
                </div>
                <div class="col-md-4">
    <div class="form-group">
        <label class="form-label">PAN No.</label>
        <input type="text" class="form-control" name="pan_no" id="pan_no" placeholder="PAN No">
    </div>
</div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Contact Person Name</label>
                        <input type="text" class="form-control" name="contact_person" 
                        pattern="^[A-Za-z -]+$" placeholder="Contact Person Name">
                    </div>
                </div>
               
            </div>
            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                    <label class="form-label">Designation</label>
                        <select class="form-control select2 form-select"
                         data-placeholder="Choose one" type="text" name="designation">
                            <option label="Choose one">
                        </option>
                        <option value="CEO">CEO</option>
                        <option value="President">President</option>
                        <option value="Board of director">Board of director</option>
                        <option value="Accountant">Accountant</option>
                        </select>  
                    </div>
                </div>
           
                <div class="col-md-4">
    <div class="form-group">
        <label class="form-label">Contact No.</label>
        <input type="text" class="form-control" name="contact_no" id="contact_no" required>
    </div>
</div>



               
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Contact Person Email ID</label>
                        <input type="email" class="form-control" name="email" 
                        placeholder="Enter Your Email">
                    </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-4">
                    <label class="form-label">Registered Address</label>
                        <div class="form-group">
                            <div class="form-floating floating-label1">
                                <textarea class="form-control" id="floatingTextarea2" name="registered_address" 
                                style="height: 90px"></textarea>
                                <label for="floatingTextarea2">Registered Address</label>
                            </div>
                        </div>
                </div>
            </div>

            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">CEO Name</label>
                        <input type="text" class="form-control" name="ceo_name" 
                         placeholder="CEO Name">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">CEO Mobile Number</label>
                        <input type="text" class="form-control" name="ceo_mobile_number" 
                        placeholder="CEO Mobile Number" id="contact_no">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">CEO Email Id</label>
                        <input type="email" class="form-control" name="ceo_email_id" 
                     placeholder="CEO Email Id">
                    </div>
                </div>

            </div>

        <div class="row">
        <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" 
                     placeholder="password">
                    </div>
                </div>

            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Company CA Name</label>
                        <input type="text" class="form-control" name="ca_name" 
                 placeholder="Company CA Name">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Company CA Mobile Number</label>
                        <input type="text" class="form-control" name="ca_mobile_number" 
                        placeholder="CA Mobile Number"
                         id="contact_no">
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
                        <input type="text" class="form-control" name="fpo_account_no" 
                        placeholder="A/c No.">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">FPO Bank Name</label>
                        <input type="text" class="form-control" name="fpo_bank_name" 
                       >
                    </div>
                </div>

                <div class="col-md-4">
    <div class="form-group">
        <label class="form-label">IFSC Code</label>
        <input type="text" class="form-control" name="fpo_ifsc" id="fpo_ifsc" placeholder="IFSC">
    </div>
</div>


            </div>
           
            <div class="card-header">
                <div class="card-title">License Information</div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group ">
                            <input type="checkbox" name="license_name1" value="add_fs" id="fs"
                            class="m-2">Add FSSAI License
                            <input type="text" name="license_name[]" id="license_name_1" value="fssai"
                            style="display:none"> 
                            <div class="col-md-12">
                                <div id="fs_license" style="display: none">
                                <label class="form-label">FSSAI License No.</label>
                                <input type="text" class="form-control" name="license_no[]" 
                                id="license_no_1"
                                placeholder="FSSAI License No">
        
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div id="fs_license1" style="display: none">
                                    <label class="form-label">License Validity</label>
                                    <select class="form-control select2 form-select"
                                     data-placeholder="Choose one" name="license_validity[]">
                                    <option label="Choose one">
                                    </option>
                                    <option value="1 year">1 year</option>
                                    <option value="2 years">2 years</option>
                                    <option value="3 years">3 years</option>
                                    <option value="4 years">4 years</option>
                                    <option value="5 years">5 years</option>
                                    <option value="6 years">6 years</option>
                                    <option value="7 years">7 years</option>
                                    <option value="8 years">8 years</option>
                                    <option value="9 years">9 years</option>
                                    <option value="10 years">10 years</option>
                                    </select>

                                    <label class="form-label">Upload License<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control"
                         accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="license_file[]">
                 
                                </div>
                            
                            </div>     
                        </div> 
                </div>

                <div class="col-md-4">
                    
                    <div class="form-group ">
                            <input type="checkbox" name="license_name2" value="add_gl"
                            id="gl" class="m-2">Add General License
                            <input type="text" name="license_name[]" id="license_name_2" value="general"
                            style="display:none"> 
                            <div class="col-md-12">
                                <div id="gl_license" style="display: none">
                                <label class="form-label">General License No.</label>
                                <input type="text" class="form-control" name="license_no[]"
                                id="license_no_2"
                                 placeholder="General License No">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div id="gl_license1" style="display: none">
                                    <label class="form-label">License Validity</label>
                                    <select class="form-control select2 form-select" 
                                    data-placeholder="Choose one" name="license_validity[]">
                                    <option label="Choose one">
                                    </option>
                                    <option value="1 year">1 year</option>
                                    <option value="2 years">2 years</option>
                                    <option value="3 years">3 years</option>
                                    <option value="4 years">4 years</option>
                                    <option value="5 years">5 years</option>
                                    <option value="6 years">6 years</option>
                                    <option value="7 years">7 years</option>
                                    <option value="8 years">8 years</option>
                                    <option value="9 years">9 years</option>
                                    <option value="10 years">10 years</option>
                                    </select>
                                    <label class="form-label">Upload License<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control" 
                        accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="license_file[]">
                 
                                </div>
                            
                            </div>
                                
                               
                           
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="form-group ">
                            <input type="checkbox" name="license_name3" value="add_td" class="m-2"
                            id="td">Add Trader License
                            <input type="text" name="license_name[]" id="license_name_3" value="trader"
                            style="display:none"> 
                            <div class="col-md-12">
                                <div id="td_license" style="display: none">
                                <label class="form-label">Trader License No.</label>
                                <input type="text" class="form-control" name="license_no[]" 
                                placeholder="Trader License No">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div id="td_license1" style="display: none">
                                    <label class="form-label">License Validity</label>
                                    <select class="form-control select2 form-select" 
                                    data-placeholder="Choose one" name="license_validity[]">
                                    <option label="Choose one">
                                    </option>
                                    <option value="1 year">1 year</option>
                                    <option value="2 years">2 years</option>
                                    <option value="3 years">3 years</option>
                                    <option value="4 years">4 years</option>
                                    <option value="5 years">5 years</option>
                                    <option value="6 years">6 years</option>
                                    <option value="7 years">7 years</option>
                                    <option value="8 years">8 years</option>
                                    <option value="9 years">9 years</option>
                                    <option value="10 years">10 years</option>
                                    </select>
                                    <label class="form-label">Upload License<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control" 
                        accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="license_file[]">
                 
                                </div>
                            
                            </div>
                                
                               
                           
                    </div> 
                </div>
            </div>

            <div class="row">
               <div class="col-md-4">
                    
                    <div class="form-group ">
                            <input type="checkbox" name="license_name4" value="add_apmc" class="m-2" id="apmc">Add APMC License
                            <input type="text" name="license_name[]" id="license_name_4" value="apmc"
                            style="display:none"> 
                            <div class="col-md-12">
                                <div id="apmc_license" style="display: none">
                                <label class="form-label">APMC License No.</label>
                                <input type="text" class="form-control" name="license_no[]" 
                                placeholder="APMC License No">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div id="apmc_license1" style="display: none">
                                    <label class="form-label">License Validity</label>
                                    <select class="form-control select2 form-select" 
                                    data-placeholder="Choose one" name="license_validity[]">
                                    <option label="Choose one">
                                    </option>
                                    <option value="1 year">1 year</option>
                                    <option value="2 years">2 years</option>
                                    <option value="3 years">3 years</option>
                                    <option value="4 years">4 years</option>
                                    <option value="5 years">5 years</option>
                                    <option value="6 years">6 years</option>
                                    <option value="7 years">7 years</option>
                                    <option value="8 years">8 years</option>
                                    <option value="9 years">9 years</option>
                                    <option value="10 years">10 years</option>
                                    </select>
                                    
                <label class="form-label">Upload License<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control" 
                        accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="license_file[]">
                 
                                </div>
                            
                            </div>
                                
                               
                           
                    </div> 
                </div>
                <div class="col-md-4">
                    
                    <div class="form-group ">
                            <input type="checkbox" name="license_name5" value="add_il" class="m-2" id="il"
                            id="apmc">Add Input License
                            <input type="text" name="license_name[]" id="license_name_5" value="input"
                            style="display:none"> 
                            <div class="col-md-12">
                                <div id="il_license" style="display: none">
                                <label class="form-label">Input License No.</label>
                                <input type="text" class="form-control" name="license_no[]" 
                                placeholder="Input License No">
                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div id="il_license1" style="display: none">
                                    <label class="form-label">License Validity</label>
                                    <select class="form-control select2 form-select" 
                                    data-placeholder="Choose one" name="license_validity[]">
                                    <option label="Choose one">
                                    </option>
                                    <option value="1 year">1 year</option>
                                    <option value="2 years">2 years</option>
                                    <option value="3 years">3 years</option>
                                    <option value="4 years">4 years</option>
                                    <option value="5 years">5 years</option>
                                    <option value="6 years">6 years</option>
                                    <option value="7 years">7 years</option>
                                    <option value="8 years">8 years</option>
                                    <option value="9 years">9 years</option>
                                    <option value="10 years">10 years</option>
                                    </select>
                                    <label class="form-label">Upload License<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control" 
                        accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="license_file[]">
                 
                                </div>
                            
                            </div>
                                
                               
                           
                    </div> 
                </div>
                
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
                                            <input type="text" class="form-control" name="license_n">
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
                                            data-placeholder="Choose one" name="license">
                                            <option label="Choose one">
                                            </option>
                                            <option value="1 year">1 year</option>
                                    <option value="2 years">2 years</option>
                                    <option value="3 years">3 years</option>
                                    <option value="4 years">4 years</option>
                                    <option value="5 years">5 years</option>
                                    <option value="6 years">6 years</option>
                                    <option value="7 years">7 years</option>
                                    <option value="8 years">8 years</option>
                                    <option value="9 years">9 years</option>
                                    <option value="10 years">10 years</option>
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
                                                        <input type="text" class="form-control" name="license_value[]" id="license_value">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">License Validity</label>
                                                        <select class="form-control select2 form-select" 
                                                        data-placeholder="Choose one" name="license_v" id="license_validity">
                                                        <option label="Choose one">
                                                        </option>
                                                        <option value="1 year">1 year</option>
                                    <option value="2 years">2 years</option>
                                    <option value="3 years">3 years</option>
                                    <option value="4 years">4 years</option>
                                    <option value="5 years">5 years</option>
                                    <option value="6 years">6 years</option>
                                    <option value="7 years">7 years</option>
                                    <option value="8 years">8 years</option>
                                    <option value="9 years">9 years</option>
                                    <option value="10 years">10 years</option>
                                                        </select>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Upload License<span class="text-red">*</span></label>
                                                            <input type="file" id="certificate" class="form-control" 
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
                <input class="btn btn-facebook" type="reset" name="reset"
                 id="fpo">Reset</input>
            <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Submit" />
            
                                        </div>
        </div>
    </form>
    </div>
</div>