<?php
    $id = $_GET['id'];
    
    $query = $this->db->select('id,
    invoice_no, store, date, sales_type, types, 
    phone_no, payment_type, product_name, stocks, 
   quantity, measures, selling_price, offer_name, offer_amt, 
   c_name,share_no,a_name,o_name, total_price, gst, cgst, cgst_amt, sgst, 
   sgst_amt, 
   igst, igst_amt, total_tax_value, total_value, round_off_tax, total_sales_value,
    status')->from('ipsales')->where('id',$id)->get();
    $count = $query->num_rows();    
?>
<div class="card">
    <div class="card-body">
    <form id="ipsalesForm" enctype="multipart/form-data">
    <?php if($count != 0): ?>
            <?php foreach($query->result() as $row): ?>
     <div class="card-header">
            <div class="card-title">New Input Sales</div>
    </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Invoice No<span class="text-red">*</span></label>
                        <input type="hidden" name="ipsid" id="ipsid" value="<?php echo $id ?>">
                        <input type="text" class="form-control" name="edit_invoice_no" 
                        id="edit_invoice_no" value="<?php echo $row->invoice_no?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Store/Godown</label>
                        <select class="form-control select2 form-select" 
                         name="edit_store"
                        value="<?php echo $row->store?>">
                        
<option value="Store" <?php echo ('Store' == $row->store) ? 'selected="selected"' : '';?> >Store</option>
 <option value="Godown" <?php echo ('Godown' == $row->store) ? 'selected="selected"' : '';?> >Godown</option>
    
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Date </label>
                        <input class="form-control"
                        type="date" 
                        id="start"
                        max="<?php echo date("Y-m-d"); ?>" 
                        name="edit_date"
                        value="<?php echo $row->date?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Sales Type</label>
                        <select class="form-control select2 form-select"  
                        name="edit_sales_type" value="<?php echo $row->sales_type?>">
                        
<option value="Public" <?php echo ('Public' == $row->sales_type) ? 'selected="selected"' : '';?> >Public</option>
 <option value="Shareholders" <?php echo ('Shareholders' == $row->sales_type) ? 'selected="selected"' : '';?> >Shareholders</option>
 <option value="Agents" <?php echo ('Agents' == $row->sales_type) ? 'selected="selected"' : '';?> >Agents</option>
 <option value="Organization" <?php echo ('Organization' == $row->sales_type) ? 'selected="selected"' : '';?> >Organization</option>
    
                        
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Public/Shareholders/Agent/Org.Name</label>
                        <input type="text" class="form-control" 
                         name="edit_types"
        value="<?php echo $row->c_name?>">
                    </div>  
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Phone No<span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="edit_phone_no" 
                        value="<?php echo $row->phone_no?>">
                    </div>
                </div>
            </div>
           
            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Payment Type</label>
                        <select class="form-control select2 form-select" 
                         name="edit_payment_type"
                        value="<?php echo $row->payment_type?>">
                        
 <option value="Credit" <?php echo ('Credit' == $row->payment_type) ? 'selected="selected"' : '';?> >Credit</option>
 <option value="Cash" <?php echo ('Cash' == $row->payment_type) ? 'selected="selected"' : '';?> >Cash</option>
 <option value="Cheque" <?php echo ('Cheque' == $row->payment_type) ? 'selected="selected"' : '';?> >Cheque</option>
 <option value="Online/Digital Payment" <?php echo ('Online/Digital Payment' == $row->payment_type) ? 'selected="selected"' : '';?> >Online/Digital Payment</option>
 <option value="NEFT/IMPS" <?php echo ('NEFT/IMPS' == $row->payment_type) ? 'selected="selected"' : '';?> >NEFT/IMPS</option>
 <option value="Partial Credit" <?php echo ('Partial Credit' == $row->payment_type) ? 'selected="selected"' : '';?> >Partial Credit</option>

                        </select>
                    </div>
                </div>
              
               
            </div>
            
            <div class="card-header">
            <div class="card-title">Input Sales Items</div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Product Name</label>
                        <select class="form-control select2-show-search form-select" 
                         name="edit_product_name"
                        value="<?php echo $row->product_name?>">
                                                    
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Store Stock</label>
                        <input type="text" class="form-control" name="edit_stocks" value="<?php echo $row->stocks?>"
                         >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Quantity Sold</label>
                        <input type="number" class="form-control" name="edit_quantity" 
                        value="<?php echo $row->quantity?>" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Select Measures</label>
                        <select class="form-control select2 form-select" 
                         name="edit_measures"
                        value="<?php echo $row->measures?>">
                       
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">MRP</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" 
                            aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_selling_price"
                            value="<?php echo $row->selling_price?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Offer Name</label>
                        <input type="text" class="form-control" name="edit_offer_name"
                        value="<?php echo $row->offer_name?>" 
                        pattern="^[A-Za-z -]+$" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Offer Amount</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_offer_amt"
                            value="<?php echo $row->offer_amt?>"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Total Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_total_price"
                            value="<?php echo $row->total_price?>"> 
                         </div>
                    </div>
                </div>
                
                
            </div>
            <div class="row">
               
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">GST %</label>
                        <select class="form-control select2 form-select"  
                        name="edit_gst">
                       
                       
                        <option value="18.00" <?php echo ('18.00' == $row->gst) ? 'selected="selected"' : '';?> >18.00</option>
                            
                        <option value="12.00" <?php echo ('12.00' == $row->gst) ? 'selected="selected"' : '';?> >12.00</option>
                        <option value="5.00" <?php echo ('5.00' == $row->gst) ? 'selected="selected"' : '';?> >5.00</option>
                        <option value="0.00" <?php echo ('0.00' == $row->gst) ? 'selected="selected"' : '';?> >0.00</option>
                            
                        </select>
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
                          
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Product Name</label>
                                        <select class="form-control select2-show-search form-select"  name="member_id">
                                                                    
                                                                    <option value=""></option>
                                                                    <option value=""></option>
                                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Store Stock</label>
                                        <input type="text" class="form-control" name="ip_name" pattern="^[A-Za-z -]+$" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Quantity Sold</label>
                                        <input type="number" class="form-control" name="ip_name"  >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Select Measures</label>
                                        <select class="form-control select2 form-select"  name="status_">
                                        
                                        </option>
                                        <option value="In Grams">In Grams</option>
                                        <option value=" In KG">In Kg</option>
                                        <option value="In Numbers">In Numbers</option>
                                        <option value="In Quintals">In Quintals</option>
                                        <option value="In Ton">In ToN</option>
                                   
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
            <div class="row">
                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Selling Price(Before Offer)</label>
                                        
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                            <input type="number" class="form-control" name="cgst_amt"> 
                                        </div>
                                    </div>
                                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Offer Name</label>
                        <input type="text" class="form-control" name="ip_name" pattern="^[A-Za-z -]+$" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Offer Amount</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="cgst_amt"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Offer Percentage</label>
                        <input type="text" class="form-control" name="ip_name"  >
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Total Price(Before Invoice Offer)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="cgst_amt"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Offer Amount</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="cgst_amt"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Total Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="cgst_amt"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">GST Value</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="cgst_amt"> 
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
                            <input type="number" class="form-control" name="edit_total_tax_value"
                            value="<?php echo $row->total_tax_value?>"> 
                         </div>
                                        
                                    </div>
                            
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Total Value</label>
                                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_total_value"
                            value="<?php echo $row->total_tax_value?>"> 
                         </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Rounf Off Tax Value</label>
                                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_round_off_tax"
                            value="<?php echo $row->round_off_tax?>"> 
                         </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Total Sales Value</label>
                                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="edit_total_sales_value"
                            value="<?php echo $row->total_sales_value?>"> 
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

