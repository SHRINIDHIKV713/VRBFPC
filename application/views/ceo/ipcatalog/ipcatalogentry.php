<div class="card">
    <div class="card-body">
    <form id="ipcForm" enctype="multipart/form-data">
        <div class="card-header">
            <div class="card-title">Catalog Information</div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Input Product Name<span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="ip_name" id="ip_name" pattern="^[A-Za-z -]+$" placeholder="Input Product Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Seller Name</label>
                        <input type="text" class="form-control" name="sel_name" pattern="^[A-Za-z -]+$" placeholder="Seller Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Product Type</label>
                        <select id="sname" class="form-control select2-show-search form-select"
                         data-placeholder="Choose one" type="text" name="p_type">
                            <option label="Choose one">
                        </option>
                        <option value="Fertilizers">Fertilizers</option>
                        <option value="Machineries">Machineries</option>
                        </select>  
                    </div>
                </div>
            </div>

            <div class="row">
            
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Product Photo<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control" 
                        accept=".jpg, .png, image/jpeg, image/png" name="p_photo">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="status_">
                        <option label="Choose one">
                        </option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            </div>
            <div class="card-header">
            <div class="card-title">Pricing Information</div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">MRP</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="mrp"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Offer Name</label>
                        <input type="text" class="form-control" name="offer_name" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Offer Amount</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="offer_amount"> 
                         </div>
                    </div>
                </div>
               
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Total Selling Price (after offer)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="selling_price"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Selling Price(Excluding Tax)</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="sp"> 
                         </div>
                    </div>
                </div>
    
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">GST %</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="gst">
                        <option label="Choose one">
                        </option>
                        <option value="Active">18.00</option>
                        <option value="Inactive">12.00</option>
                        <option value="Active">5.00</option>
                        <option value="Inactive">0.00</option>
                        </select>
                    </div>
                </div>
                
            </div>

            <div class="row">
               
                
           
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Selling Price(Including Tax)</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="sp_a"> 
                         </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
            <div class="card-title">GST Breakdown</div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">CGST Percentage</label>
                        <input type="text" class="form-control" name="cgst_p"> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">CGST Amount</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="cgst_amt"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                    <div class="form-group">
                        <label class="form-label">SGST Percentage</label>
                        <input type="text" class="form-control" name="sgst_p"> 
                    </div>
                   
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">SGST Amount</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="sgst_amt"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                    <div class="form-group">
                        <label class="form-label">IGST Percentage</label>
                        <input type="text" class="form-control" name="igst_p"> 
                    </div>
                   
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">IGST Amount</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="igst_amt"> 
                         </div>
                    </div>
                </div>
            </div>
       
            
        
            <div class="mt-4 btn-list text-end">
                <input class="btn btn-facebook" type="reset" name="reset"
                 id="ipc">Reset</input>
            <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Submit" />
          
                                        </div>
        </div>
    </form>
    </div>
</div>