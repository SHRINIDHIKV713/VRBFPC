<?php
    $id = $_GET['id'];
    
    $query = $this->db->select('id,
    invoice_no, date_of, store, entry_type, purchase_type, from_org, p_name, f_name, phone, 
    payment, product_name, p_price, batch, expiry_date, quantity, measures, total_price, gst, gst_value, stocks, cgst, cgst_amt, 
    sgst, sgst_amt, igst, igst_amt, tax_value, round_off, purchase_value, refered_by,
    status')->from('oppurchase')->where('id',$id)->get();
    $count = $query->num_rows();    
?>
<div class="card">
    <div class="card-body">
    <form id="oppForm" enctype="multipart/form-data">
    <?php if($count != 0): ?>
            <?php foreach($query->result() as $row): ?>
        <div class="card-header">
            <div class="card-title">New Output Purchase</div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Invoice No<span class="text-red">*</span></label>
                        <input type="hidden" name="oppid" id="oppid" value="<?php echo $id ?>">
                        <input type="text" class="form-control" name="edit_invoice_no" id="edit_invoice_no"
                        value="<?php echo $row->invoice_no?>">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Date </label>
                        <input class="form-control" type="date" id="start" 
                        max="<?php echo date("Y-m-d"); ?>" value="<?php echo $row->date_of?>"
                        name="edit_date_of">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Store/Godown</label>

                        <select class="form-control select2 form-select" data-placeholder="Choose one"
                         name="edit_store" value="<?php echo $row->store?>">
                       
                                           
<option value="Store" <?php echo ('Store' == $row->store) ? 'selected="selected"' : '';?> >Store</option>
 <option value="Godown" <?php echo ('Godown' == $row->store) ? 'selected="selected"' : '';?> >Godown</option>
      
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Entry Type</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one"
                         name="edit_entry_type" value="<?php echo $row->entry_type?>">
                                            
<option value="Opening Stock" <?php echo ('Opening Stock' == $row->entry_type) ? 'selected="selected"' : '';?> >Opening Stock</option>
 <option value="Purchases" <?php echo ('Purchases' == $row->entry_type) ? 'selected="selected"' : '';?> >Purchases</option>
      
                       
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                        <label class="form-label">Purchase Type</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one"
                         name="edit_purchase_type" id="ptype" value="<?php echo $row->purchase_type?>">
                                            
<option value="From Member/Farmer" <?php echo ('From Member/Farmer' == $row->purchase_type) ? 'selected="selected"' : '';?> >From Member/Farmer</option>
 <option value="From Agents" <?php echo ('From Agents' == $row->purchase_type) ? 'selected="selected"' : '';?> >From Agents</option>                                           
<option value="From Market" <?php echo ('From Market' == $row->purchase_type) ? 'selected="selected"' : '';?> >From Market</option>
 <option value="From Organization" <?php echo ('From Organization' == $row->purchase_type) ? 'selected="selected"' : '';?> >From Organization</option>
 
                      
                        </select>
                    </div>
                    <div class="form-group" id="dvptype" style="display: none">
                        <label class="form-label">From Organization</label>
                       <input type="text" class="form-control" name="edit_from_org" 
                       id="txtbagNumber" value="<?php echo $row->from_org?>"> 
                       <label class="form-label">Contact Person Name</label>
                       <input type="text" class="form-control" name="edit_p_name"
                       value="<?php echo $row->p_name?>" id="txtbagNumber"> 
                         
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                        <label class="form-label">Farmer Name</label>
                        <select class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one" name="edit_f_name"
                        value="<?php echo $row->f_name?>">
                           
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>
           
            <div class="row">
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
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="edit_payment" value="<?php echo $row->payment?>">
                                            
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
            <div class="card-title">Output Items</div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Product Name</label>
                        <select class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one" name="edit_product_name"
                        value="<?php echo $row->product_name?>">
                                                   
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Purchase Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_p_price"
                            value="<?php echo $row->p_price?>"> 
                         </div>
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
                                        name="edit_expiry_date"
                                        value="<?php echo $row->expiry_date?>">
                                    </div>
                                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Quantity Required</label>
                        <input type="number" class="form-control" name="edit_quantity"  
                        value="<?php echo $row->quantity?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Select Measures</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one"
                         name="edit_measures" value="<?php echo $row->measures?>">
                                                                                       
<option value="In Grams" <?php echo ('In Grams' == $row->measures) ? 'selected="selected"' : '';?> >In Grams</option>
 <option value="In Kg" <?php echo ('In Kg' == $row->measures) ? 'selected="selected"' : '';?> >In Kg</option>
 <option value="In Numbers" <?php echo ('In Numbers' == $row->measures) ? 'selected="selected"' : '';?> >In Numbers</option>
 <option value="In Quintals" <?php echo ('In Quintals' == $row->measures) ? 'selected="selected"' : '';?> >In Quintals</option>
 <option value="In ToN" <?php echo ('In ToN' == $row->measures) ? 'selected="selected"' : '';?> >In ToN</option>
       
                        </select>
                    </div>
                </div>
                
            </div>
            <div class="row">
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
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="edit_gst"
                        value="<?php echo $row->gst?>">
                                             
<option value="18.00" <?php echo ('18.00' == $row->gst) ? 'selected="selected"' : '';?> >18.00</option>
 <option value="12.00" <?php echo ('12.00' == $row->gst) ? 'selected="selected"' : '';?> >12.00</option>
 <option value="5.00" <?php echo ('5.00' == $row->gst) ? 'selected="selected"' : '';?> >5.00</option>
 <option value="0.00" <?php echo ('0.00' == $row->gst) ? 'selected="selected"' : '';?> >0.00</option>
              
             
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">GST Value</label>
                        <input type="number" class="form-control" name="edit_gst_value"
                        value="<?php echo $row->gst_value?>"  >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Available Stock</label>
                        <input type="number" class="form-control" name="edit_stocks"
                        value="<?php echo $row->stocks?>"  >
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
                        <select class="form-control select2-show-search form-select" data-placeholder="Choose one" name="member_id">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Purchase Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="cgst_amt"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Batch Number</label>
                                        <input type="number" class="form-control" name="ip_name" pattern="^[A-Za-z -]+$" >
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Expiry Date </label>
                                        <input class="form-control" type="date" id="start" max="<?php echo date("Y-m-d"); ?>" 
                                        name="date_of">
                                    </div>
                                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Quantity Required</label>
                        <input type="number" class="form-control" name=""  >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Select Measures</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" name="status_">
                                                                 
<option value="In Grams" <?php echo ('In Grams' == $row->measures) ? 'selected="selected"' : '';?> >In Grams</option>
 <option value="In Kg" <?php echo ('In Kg' == $row->measures) ? 'selected="selected"' : '';?> >In Kg</option>
 <option value="In Numbers" <?php echo ('In Numbers' == $row->measures) ? 'selected="selected"' : '';?> >In Numbers</option>
 <option value="In Quintals" <?php echo ('In Quintals' == $row->measures) ? 'selected="selected"' : '';?> >In Quintals</option>
 <option value="In ToN" <?php echo ('In ToN' == $row->measures) ? 'selected="selected"' : '';?> >In ToN</option>
       
             
                        </select>
                    </div>
                </div>
                
            </div>
            <div class="row">
            
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
                        <select class="form-control select2 form-select" data-placeholder="Choose one"
                         name="gst">
                                                                       
                        
<option value="18.00" <?php echo ('18.00' == $row->gst) ? 'selected="selected"' : '';?> >18.00</option>
 <option value="12.00" <?php echo ('12.00' == $row->gst) ? 'selected="selected"' : '';?> >12.00</option>
 <option value="5.00" <?php echo ('5.00' == $row->gst) ? 'selected="selected"' : '';?> >5.00</option>
 <option value="0.00" <?php echo ('0.00' == $row->gst) ? 'selected="selected"' : '';?> >0.00</option>
              
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
                        <input type="number" class="form-control" name="ip_name"  >
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
                            <label class="form-label">Round Off</label>
                            <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_round_off"
                            value="<?php echo $row->round_off?>"> 
                         </div>
                            
                        </div>
                
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Total Purchase Value</label>
                            <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_purchase_value"
                            value="<?php echo $row->purchase_value?>"> 
                         </div>
                           
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Refered By</label>
                            <input type="text" class="form-control" name="edit_refered_by"
                            value="<?php echo $row->refered_by?>">
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