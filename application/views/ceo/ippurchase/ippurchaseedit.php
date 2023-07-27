<?php
    $id = $_GET['id'];
    
    $query = $this->db->select('id,
    invoice_no,invoice_photo,store,date_of,entry_type,purchase_type,seller,phone,
        payment,product_name,store_name,batch,expiry_date,unit_price,quantity,measures,
        total_price,gst ,gst_value ,stocks,cgst,cgst_amt,sgst,sgst_amt,igst,igst_amt,
        tax_value,total_value,
    status')->from('ippurchase')->where('id',$id)->get();
    $count = $query->num_rows();    
?>
<div class="card">
    <div class="card-body">
    <form id="ippurchaseForm" enctype="multipart/form-data">
    <?php if($count != 0): ?>
            <?php foreach($query->result() as $row): ?>
        <div class="card-header">
            <div class="card-title">New Input Purchase</div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Invoice No<span class="text-red">*</span></label>
                        <input type="hidden" name="ippid" id="ippid" value="<?php echo $id ?>">
                        <input type="text" class="form-control" name="edit_invoice_no" 
                        id="invoice_no" value="<?php echo $row->invoice_no?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Upload Invoice<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control" 
                        accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="edit_invoice_photo">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Store/Godown</label>
                        <select class="form-control select2 form-select" 
                        name="edit_store">
                       
 <option value="Store" <?php echo ('Store' == $row->store) ? 'selected="selected"' : '';?> >Store</option>
 <option value="Godown" <?php echo ('Godown' == $row->store) ? 'selected="selected"' : '';?> >Godown</option>
                                                       
    
                        </select>
                    </div>
                </div>
                
            </div>

            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Date </label>
                        <input class="form-control" type="date" id="start"
                        
                        name="edit_date_of" value="<?php echo $row->date_of?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Entry Type</label>
                        <select class="form-control select2 form-select" 
                        name="edit_entry_type">
                        
 <option value="Output Stock" <?php echo ('Output Stock' == $row->entry_type) ? 'selected="selected"' : '';?> >Output Stock</option>
 <option value="Purchases" <?php echo ('Purchases' == $row->entry_type) ? 'selected="selected"' : '';?> >Purchases</option>
                                                       
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                        <label class="form-label">Purchase Type</label>
                        <select class="form-control select2 form-select" 
                        name="edit_purchase_type">
                        

<option value="From Seller" <?php echo ('From Seller' == $row->purchase_type) ? 'selected="selected"' : '';?> >From Seller</option>
 <option value="From Organization" <?php echo ('From Organization' == $row->purchase_type) ? 'selected="selected"' : '';?> >From Organization</option>
 <option value="From Market" <?php echo ('From Market' == $row->purchase_type) ? 'selected="selected"' : '';?> >From Market</option>
                        </select>
                    </div>
                </div>
                
            </div>
           
            <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                        <label class="form-label">From Seller</label>
                        <select class="form-control select2-show-search form-select" 
                        name="edit_seller">
                        
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Phone No<span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="edit_phone"
                        value="<?php echo $row->phone?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Payment Type</label>
                        <select class="form-control select2 form-select" 
                        name="edit_payment">
                        
 <option value="Credit" <?php echo ('Credit' == $row->payment) ? 'selected="selected"' : '';?> >Credit</option>
 <option value="Cash" <?php echo ('Cash' == $row->payment) ? 'selected="selected"' : '';?> >Cash</option>
 <option value="Cheque" <?php echo ('Cheque' == $row->payment) ? 'selected="selected"' : '';?> >Cheque</option>
 <option value="Online/Digital Payment" <?php echo ('Online/Digital Payment' == $row->payment) ? 'selected="selected"' : '';?> >Online/Digital Payment</option>
 <option value="NEFT/IMPS" <?php echo ('NEFT/IMPS' == $row->payment) ? 'selected="selected"' : '';?> >NEFT/IMPS</option>
 <option value="Partial Credit" <?php echo ('Partial Credit' == $row->payment) ? 'selected="selected"' : '';?> >Partial Credit</option>

                        </select>
                    </div>
                </div>
              
               
            </div>
            
            <div class="card-header">
            <div class="card-title">Input Purchase</div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Product Name</label>
                        <select class="form-control select2-show-search form-select" 
                        name="edit_product_name">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Store Name</label>
                        <input type="text" class="form-control" name="edit_store_name"
                        value="<?php echo $row->store_name?>" 
                        pattern="^[A-Za-z -]+$" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Batch Number</label>
                        <input type="number" class="form-control" name="edit_batch" 
                        pattern="^[A-Za-z -]+$" 
                        value="<?php echo $row->batch?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Expiry Date </label>
                        <input class="form-control" type="date" id="start"
                         max="<?php echo date("Y-m-d"); ?>" 
                        name="edit_expiry_date"value="<?php echo $row->expiry_date?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Unit Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_unit_price"
                            value="<?php echo $row->unit_price?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Quantity Purchased</label>
                        <input type="number" class="form-control" name="edit_quantity"
                        value="<?php echo $row->quantity?>"  >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Select Measures</label>
                        <select class="form-control select2 form-select" 
                        name="edit_measures">
                        
<option value="In Grams" <?php echo ('In Grams' == $row->measures) ? 'selected="selected"' : '';?> >In Grams</option>
 <option value="In Kg" <?php echo ('In Kg' == $row->measures) ? 'selected="selected"' : '';?> >In Kg</option>
 <option value="In Numbers" <?php echo ('In Numbers' == $row->measures) ? 'selected="selected"' : '';?> >In Numbers</option>
 <option value="In Quintals" <?php echo ('In Quintals' == $row->measures) ? 'selected="selected"' : '';?> >In Quintals</option>
 <option value="In ToN" <?php echo ('In ToN' == $row->measures) ? 'selected="selected"' : '';?> >In ToN</option>
                   
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Total Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_total_price"
                            value="<?php echo $row->total_price?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">GST %</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one"
                         name="edit_gst" value="<?php echo $row->gst?>">
                        
                        
<option value="18.00" <?php echo ('18.00' == $row->gst) ? 'selected="selected"' : '';?> >18.00</option>
 <option value="12.00" <?php echo ('12.00' == $row->gst) ? 'selected="selected"' : '';?> >12.00</option>
 <option value="5.00" <?php echo ('5.00' == $row->gst) ? 'selected="selected"' : '';?> >5.00</option>
 <option value="0.00" <?php echo ('0.00' == $row->gst) ? 'selected="selected"' : '';?> >0.00</option>
                        </select>
                    </div>
                </div>
               
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Available Stock</label>
                        <input type="number" class="form-control" name="edit_stocks"  
                        value="<?php echo $row->stocks?>">
                    </div>
                </div>
            </div>
            <div id = "add_lead_area">
                <button type="button" class="btn btn-facebook ms-3"  
                name="button" onclick="appendAddchild()" id="add_lead"> Add New</button>
                    
            </div>             
            <div class="col-md-12">
                <div>
                     <div id = "lead_area">
                        <div>
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Product Name</label>
                                        <select class="form-control select2-show-search form-select" name="member_id">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Store/Godown Name</label>
                                        <input type="text" class="form-control" name="ip_name" pattern="^[A-Za-z -]+$" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Batch Number</label>
                                        <input type="number" class="form-control" name="ip_name" pattern="^[A-Za-z -]+$" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Expiry Date </label>
                                        <input class="form-control" type="date" id="start" max="<?php echo date("Y-m-d"); ?>" 
                                        name="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Unit Price</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                            <input type="number" class="form-control" name="cgst_amt"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Quantity Purchased</label>
                                        <input type="number" class="form-control" name="ip_name"  placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Select Measures</label>
                                        <select class="form-control select2 form-select" name="status_">
                                        <option label="Choose one">
                                        </option>
                                        <option value="In Grams">In Grams</option>
                                        <option value=" In KG">In Kg</option>
                                        <option value="In Numbers">In Numbers</option>
                                        <option value="In Quintals">In Quintals</option>
                                        <option value="In Ton">In ToN</option>
                                   
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Total Price</label>
                                        <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                        <input type="number" class="form-control" name="cgst_amt"> 
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">GST %</label>
                                        <select class="form-control select2 form-select" name="gst_p">
                                        <option label="Choose one">
                                        </option>
                                        <option value="Active">18.00</option>
                                        <option value="Inactive">12.00</option>
                                        <option value="Active">5.00</option>
                                        <option value="Inactive">0.00</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">GST Value</label>
                                        <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                        <input type="number" class="form-control" name="cgst_amt"> 
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Available Stock</label>
                                        <input type="number" class="form-control" name="ip_name"  placeholder="">
                                    </div>
                                </div>
                            </div>     
                                  
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-facebook ms-3" style="margin-top: 0px;" name="button" onclick="removeAddchild(this)"> <i class="fa fa-minus"></i> </button>
                                                                                                
                            </div>
                        </div>
             
                    </div>
                </div>
        
            </div>
       
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">CGST Percentage</label>
                        <input type="text" class="form-control" name="edit_cgst"
                        value="<?php echo $row->cgst?>"> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">CGST Amount</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_cgst_amt"
                            value="<?php echo $row->cgst_amt?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                    <div class="form-group">
                        <label class="form-label">SGST Percentage</label>
                        <input type="text" class="form-control" name="edit_sgst"
                        value="<?php echo $row->sgst?>"> 
                    </div>
                   
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">SGST Amount</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_sgst_amt"
                            value="<?php echo $row->sgst_amt?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                    <div class="form-group">
                        <label class="form-label">IGST Percentage</label>
                        <input type="text" class="form-control" name="edit_igst"
                        value="<?php echo $row->igst?>"> 
                    </div>
                   
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">IGST Amount</label>
                       
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_igst_amt"
                            value="<?php echo $row->igst_amt?>"> 
                         </div>
                    </div>
                </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Total Tax Value</label>
                                            <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_tax_value"
                            value="<?php echo $row->tax_value?>"> 
                         </div>
                                            
                                        </div>
                                
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Total Value</label>
                                            <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_total_value"
                            value="<?php echo $row->total_value?>"> 
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