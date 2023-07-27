<div class="card" >
                        <div class="card-body">
                        <form id="cuserForm" enctype="multipart/form-data">
                        
                            <div class="col-md-12">
                                <div class="row">
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">State</label>
                                        <select class="form-control form-select select2" 
                                        data-bs-placeholder="Select" name="state" id="state">
                                            <option value="0">Select </option>
                                            <?php foreach($state as $row):?>
                                              <option value="<?php echo $row->s_id;?>">
                                              <?php echo ucwords($row->s_name);?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">District</label>
                                        <select class="form-control form-select select2" 
                                        data-bs-placeholder="Select" name="dist" id="dist">
                                                    <option value="0">Select </option>
                                                    
                                        </select>
                                    </div>
                                </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Taluk</label>
                                        <select class="form-control form-select select2" 
                                        data-bs-placeholder="Select" name="taluk" id="taluk">
                                        <option value="0">Select </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Gram Panchayath</label>
                                        <select class="form-control select2-show-search form-select"
                                         data-bs-placeholder="Select" name="gp" id="gp">
                                        <option value="0">Select </option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Village</label>
                                        <select class="form-control select2-show-search form-select"
                                         data-bs-placeholder="Select" name="village" id="village">
                                        <option value="0">Select </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Pincode</label>
                                        <select class="form-control form-select select2" 
                                        data-bs-placeholder="Select" name="pin" id="pin">
                                        <option value="0">Select </option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">User Name</label>
                                        <input type="text" class="form-control" name="username" id="username">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input type="text" class="form-control" name="password">
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Role</label>
                                        <select class="form-control form-select select2" 
                                        data-bs-placeholder="Select" name="role">
                                           
                                            <option label="Choose one">Choose one</option>
                                                    
                                            <option value="Accountant">Accountant</option>
                                            <option value="Agent">Agent</option>
                                                    
                                                    
                                        </select>
                                    </div>
                                </div>
                                
                                </div>
                            </div>
                                
                              
                             
                               
                                <div class="btn-list text-end mt-4">
                                <input class="btn btn-facebook" type="submit" name="submit" id="submit" 
                                value="submit" />
                                </div>
            
                                    
            
                                    
                                </div>
                            </div>
                    </form>
                </div>
            </div>
                 