<div class="card">
    <div class="card-body">
    <form id="ipsalesForm" enctype="multipart/form-data">
     <div class="card-header">
            <div class="card-title">New Input Sales</div>
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
    <label class="form-label">From Store/Godown</label>
    <select class="form-control select2 form-select" data-placeholder="Choose one" 
    name="store" onchange="toggleStockField(this)">
      <option label="Choose one"></option>
      <option value="Store">Store</option>
      <option value="Godown">Godown</option>
    </select>
  </div>
</div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Date </label>
                        <input class="form-control" type="date" id="start" max="<?php echo date("Y-m-d"); ?>" 
                        name="date">
                    </div>
                </div>
            </div>

            <div class="row">
<!-- <div class="col-md-4">
  <div class="form-group">
    <label class="form-label">Sales Type</label>
    <select class="form-control select2 form-select" 
    data-placeholder="Choose one" name="sales_type" onchange="handleSalesType(this.value)">
      <option label="Choose one"></option>
      <option value="Public">Public</option>
      <option value="Shareholders">Shareholders</option>
      <option value="Agents">Agents</option>
      <option value="Organization">Organization</option>
    </select>
  </div>
</div> 
 onchange="handleSalesType(this.value)"
-->

<div class="col-md-4">
  <div class="form-group">
    <label class="form-label">Sales Type</label>
    <select class="form-control select2 form-select" 
      data-placeholder="Choose one" name="sales_type" 
      onchange="handleSalesType1(this.value); handleSalesType2(this.value)"
      >
      <option label="Choose one"></option>
      <option value="Public">Public</option>
      <option value="Shareholders">Shareholders</option>
      <option value="Agents">Agents</option>
      <option value="Organization">Organization</option>
    </select>
  </div>
</div>

<div class="col-md-4">
<div class="form-group" id="customerNameField" style="display: none;">
  <label class="form-label">Customer Name</label>
  <input type="text" class="form-control" name="c_name">
</div>

<div class="form-group" id="shareNoField" style="display: none;">
  <label class="form-label">Share No.</label>
  <select class="form-control select2-show-search form-select" 
    data-placeholder="Choose one" name="share_no">
    <option label="Choose one">Choose</option>
  </select>
</div>

<div class="form-group" id="agentNameField" style="display: none;">
  <label class="form-label">Agent Name</label>
  <select class="form-control select2-show-search form-select" 
    data-placeholder="Choose one" name="a_name">
    <option label="Choose one">Choose</option>
    <option value=""></option>
  </select>
</div>

<div class="form-group" id="organizationNameField" style="display: none;">
  <label class="form-label">Organization Name</label>
  <input type="text" class="form-control" name="o_name">
</div>




                <!-- <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Customer Name</label>
                        <input type="text" class="form-control" name="types">
                    </div>


                    <div class="form-group">
                        <label class="form-label">Share No.</label>
                        <select class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one" name="types">
                        <option label="Choose one">Choose</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Agent Name</label>
                       <select class="form-control select2-show-search form-select" 
                       data-placeholder="Choose one" name="types">
                            <option label="Choose one">Choose</option>
                            <option value=""></option>
                       </select>   
                    </div>

                    <div class="form-group">
                        <label class="form-label">Organization Name</label>
                        <input type="text" class="form-control" name="types">
                    </div> -->
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Phone No<span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="phone_no" pattern="" placeholder="">
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-4">  
                   <div class="form-group">
                      <label class="form-label">Payment Type</label>
                         <select class="form-control select2 form-select" data-placeholder="Choose one" 
                           name="payment_type">
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
                        data-placeholder="Choose one" name="product_name">
                                                    <option label="Choose one">Choose</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                            </select>
                    </div>
                </div>
               

                <div class="col-md-3" id="storeStockField" style="display: none;">
  <div class="form-group">
    <label class="form-label">Store Stock</label>
    <input type="text" class="form-control" name="stocks" pattern="^[A-Za-z -]+$" placeholder="">
  </div>
</div>

<div class="col-md-3" id="godownStockField" style="display: none;">
  <div class="form-group">
    <label class="form-label">Godown Stock</label>
    <input type="text" class="form-control" name="stocks" pattern="^[A-Za-z -]+$" placeholder="">
  </div>
</div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Quantity Sold</label>
                        <input type="number" class="form-control" name="quantity"  placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Select Measures</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="measures">
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
                
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">MRP</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" 
                            aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="selling_price"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Offer Name</label>
                        <input type="text" class="form-control" name="offer_name" 
                        pattern="^[A-Za-z -]+$" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Offer Amount</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="offer_amt"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Total Price</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="total_price"> 
                         </div>
                    </div>
                </div>
                
                
            </div>
            <div class="row">
                <!-- <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Total Price(Before Invoice Offer)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="total_price_before_offer"> 
                         </div>
                    </div>
                </div> -->
                <!-- <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Offer Amount</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="offer_amount"> 
                         </div>
                    </div>
                </div> -->
               
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">GST %</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="gst">
                        <option label="Choose one">
                        </option>
                        <option value="18.00">18.00</option>
                        <option value="12.00">12.00</option>
                        <option value="5.00">5.00</option>
                        <option value="0.00">0.00</option>
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
                                        <select class="form-control select2-show-search form-select" data-placeholder="Choose one" name="member_id">
                                                                    <option label="Choose one">Choose</option>
                                                                    <option value=""></option>
                                                                    <option value=""></option>
                                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Store Stock</label>
                                        <input type="text" class="form-control" name="ip_name" pattern="^[A-Za-z -]+$" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Quantity Sold</label>
                                        <input type="number" class="form-control" name="ip_name"  placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Select Measures</label>
                                        <select class="form-control select2 form-select" data-placeholder="Choose one" name="status_">
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
                        <input type="text" class="form-control" name="ip_name" pattern="^[A-Za-z -]+$" placeholder="">
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
                        <input type="text" class="form-control" name="ip_name"  placeholder="">
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
                            <input type="number" class="form-control" name="total_tax_value"> 
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Rounf Off Tax Value</label>
                                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="round_off_tax"> 
                         </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Total Sales Value</label>
                                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="total_sales_value"> 
                         </div>
                                    </div>
                                </div>

                                <!-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Total Credit Sales Amount</label>
                                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="cgst_amt"> 
                         </div>
                                    </div>
                                </div> -->

                                <!-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Cash Received Amount</label>
                                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="cgst_amt"> 
                         </div>
                                    </div>
                                </div> -->

                                <!-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Balance Amount</label>
                                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="cgst_amt"> 
                         </div>
                                    </div>
                                </div>
                
                            </div>
        -->
            
        
            <div class="mt-4 btn-list text-end">
                <input class="btn btn-facebook" type="reset" name="reset"
                 id="ips">Reset</input>
            <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Submit" />
         
                                        </div>
        </div>
    </form>
    </div>
</div>

