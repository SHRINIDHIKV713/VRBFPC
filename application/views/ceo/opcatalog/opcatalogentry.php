<div class="card">
    <div class="card-body">
    <form id="opcForm" enctype="multipart/form-data">
        <div class="card-header">
            <div class="card-title">Catalog Information</div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Output Product Name<span class="text-red">*</span></label>
                        <input type="text" class="form-control" name="product_name" id="product_name"
                         pattern="^[A-Za-z -]+$" placeholder="Output Product Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Product Type</label>
                        <select id="sname" class="form-control select2-show-search form-select" 
                        data-placeholder="Choose one" type="text" name="product_type">
                            <option label="Choose one">
                        </option>
                        <option value="Grains">Grains</option>
                        <option value="Pulses">Pulses</option>
                        <option value="Fruits">Fruits</option>
                        <option value="Vegetables">Vegetables</option>
                        <option value="Jaggery">Jaggery</option>
                        <option value="seeds">Seeds</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Product Photo<span class="text-red">*</span></label>
                        <input type="file" id="certificate" class="form-control" 
                        accept=".jpg, .png, image/jpeg, image/png" name="p_photo">
                    </div>
                </div>
                
            </div>

            <div class="row">
            <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="status_">
                        <option label="Choose one">
                        </option>
                        <option value="Available">Available</option>
                        <option value="Out Of Stock">Out Of Stock</option>
                        </select>
                    </div>
                </div>
                
                
            </div>
            </div>
            <div class="card-header">
            <div class="card-title">Unit,Pack And Other Attributes</div>
            </div>
            <div class="row">
                 <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Type Of Packaging</label>
                        <select class="form-control select2 form-select" data-placeholder="Choose one" 
                        name="type_p" id="type_p">
                        <option label="Choose one">
                        </option>
                        <option value="Units">Units</option>
                        <option value="Bags">Bags</option>
                        </select>
                    </div>
                    
                    <div class="form-group" id="dvptype" style="display: none">
                        <label class="form-label">Number Of Units In Each Bag</label>
                       <input type="number" class="form-control" name="units" id="txtbagNumber"> 
                         
                    </div>
                
                </div>
  
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Selling Units</label>
                       <input type="number" class="form-control" name="selling_units"> 
                         
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Select Size</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="size">
                        <option label="Choose one">
                        </option>
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Big">Big</option>
                        <option value="Large">Large</option>
                  
                   
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Specify Grade</label>
                        <select class="form-control select2 form-select" 
                        data-placeholder="Choose one" name="grade">
                        <option label="Choose one">
                        </option>
                        <option value="Grade 1">Grade 1</option>
                        <option value="Grade 2">Grade 2</option>
                        <option value="Grade 3">Grade 3</option>
                    
                  
                   
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-header">
            <div class="card-title">Pricing</div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Selling Price(Including Tax)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="selling_price"> 
                         </div>
                    </div>
                </div>
                <div class="col-md-4">
                    
                        <div class="form-group">
                            <label class="form-label">GST Percentage</label>
                            <select class="form-control select2 form-select" 
                            data-placeholder="Choose one" name="gst">
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
                        <label class="form-label">Selling Price(Before Tax)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="selling_price_before"> 
                         </div>
                    </div>
                </div>
                
            </div>
            <div class="card-header">
                <div class="card-title">GST Calculation</div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">GST Amount</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" name="gst_amount"> 
                         </div>
                    </div>
                </div>
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
            </div>
        
            <div class="mt-4 btn-list text-end">
                <input class="btn btn-facebook" type="reset" name="reset"
                 id="opc">Reset</input>
            <input class="btn btn-facebook" type="submit" name="submit" id="submit" value="Submit" />
            
            
                                        </div>
        </div>
    </form>
    </div>
</div>