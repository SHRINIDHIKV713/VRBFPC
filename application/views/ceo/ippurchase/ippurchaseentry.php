<!-- <div class="card" id="printableArea"> -->
<div class="card">
    <div class="card-body">
    <form id="ippurchaseForm" enctype="multipart/form-data">
        <div class="card-header">
            <div class="card-title">New Input Purchase</div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Invoice No<span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="invoice_no" id="invoice_no" placeholder="Invoive No">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Upload Invoice<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control" 
                        accept=".jpg, .png, .pdf, .doc, image/jpeg, image/png" name="invoice_photo">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Store/Godown</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="store">
                        <option label="Choose one">
                        </option>
                        <option value="Store">Store</option>
                        <option value="Godown">Godown</option>
                        </select>
                    </div>
                </div>
                
            </div>

            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Date </label>
                        <input class="form-control" type="date" id="start" 
                       
                        name="date_of">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Entry Type</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="entry_type">
                        <option label="Choose one">
                        </option>
                        <option value="Output Stock">Output Stock</option>
                        <option value="Purchases">Purchases</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                        <label class="form-label">Purchase Type</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="purchase_type">
                        <option label="Choose one">
                        </option>
                        <option value="From Seller">From Seller</option>
                        <option value="From Organization">From Organization</option>
                        <option value="From Market">From Market</option>
                        </select>
                    </div>
                </div>
                
            </div>
           
            <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                        <label class="form-label">From Seller</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="seller">
                        <option label="Choose one">
                        </option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Phone No<span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="phone" placeholder="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Payment Type</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="payment">
                        <option label="Choose one">
                        </option>
                        <option value="Credit">Credit</option>
                        <option value="Cash">Cash</option>
                        <option value="Cheque">Cheque</option>
                        <option value="Online/Digital Payment">Online/Digital Payment</option>
                        <option value="NEFT/IMPS">NEFT/IMPS</option>
                        <option value="Partial Credit">Partial Credit</option>
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
                        data-placeholder="Choose one" name="product_name">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Store Name</label>
                        <input type="text" class="form-control" name="store_name" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Batch Number</label>
                        <input type="number" class="form-control" name="batch" pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Expiry Date </label>
                        <input class="form-control" type="date" id="start" max="<?php echo date("Y-m-d"); ?>" 
                        name="expiry_date">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Unit Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="unit_price"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Quantity Purchased</label>
                        <input type="number" class="form-control" name="quantity"  placeholder="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Select Measures</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="measures">
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
                            <input type="number" class="form-control" name="total_price"> 
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
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Available Stock</label>
                        <input type="number" class="form-control" name="stocks"  placeholder="">
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
                                        <label class="form-label">Store/Godown Name</label>
                                        <input type="text" class="form-control"  pattern="^[A-Za-z -]+$" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Batch Number</label>
                                        <input type="number" class="form-control"  pattern="^[A-Za-z -]+$" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Expiry Date </label>
                                        <input class="form-control" type="date" id="start" max="<?php echo date("Y-m-d"); ?>" 
                                    >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Unit Price</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                            <input type="number" class="form-control" > 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Quantity Purchased</label>
                                        <input type="number" class="form-control"   placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Select Measures</label>
                                        <select class="form-control select2 form-select" 
                                        data-placeholder="Choose one" >
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
                                        <input type="number" class="form-control" > 
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">GST %</label>
                                        <select class="form-control select2 form-select"
                                         data-placeholder="Choose one" >
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
                                        <input type="number" class="form-control" > 
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Available Stock</label>
                                        <input type="number" class="form-control"   placeholder="">
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
                        <input type="text" class="form-control" name="cgst"> 
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
                        <input type="text" class="form-control" name="sgst"> 
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
                        <input type="text" class="form-control" name="igst"> 
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Total Tax Value</label>
                                            <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="tax_value"> 
                         </div>
                                            
                                        </div>
                                
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Total Value</label>
                                            <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="total_value"> 
                         </div>
                                        </div>
                                    </div>
                        
                    
                                </div>
                                    
                                  
                        
        
            <div class="mt-4 btn-list text-end">
            <!-- <input class="btn btn-facebook" href="delivery_note"
                 id="ipc">Delivery Note</input> -->
                <input class="btn btn-facebook" type="reset" name="reset"
                 id="ipc">Reset</input>
            <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Submit" />
            <!-- <a href="ip_invoice" class="btn btn-facebook">Print</a> -->
            <!-- <button class="btn btn-facebook" onClick="window.print()"><i class="fa fa-print m-1" aria-hidden="true"></i>Print</button> -->
            <!-- <input type="button" class="btn btn-facebook" onclick="printDiv('printableArea')" value="Print">Print</input> -->
                                        </div>
        </div>
    </form>
    </div>
</div>