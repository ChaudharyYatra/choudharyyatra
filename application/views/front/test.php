<form method="post" action="<?php echo base_url();?>enquiry/add">
                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Branch Name</label>
                                            <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Branch Name" name="branch_name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*)\./g, '$1');" pattern="[a-zA-Z ]+" required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        
                                        </div>
                                        <br>
                                        <div class="col-12">
                                            
                                            <input class="btn btn-primary" value="submit" type="submit" name="submit">
                                        </div>


                        <?php  
                        // $con=mysqli_connect("localhost", "sumagotest_chaudhary_yatra", "Z-f-n%rq{]1X", "sumagotest_chaudhary_yatra");
                        // if($con)
                        // {
                        //     echo "connected";
                        // }
                        // else
                        // {
                        //     echo "not connected";
                        // }
                        // if(isset($_POST['submit']))
                        //             {

                        //                 extract($_POST);
                                        
                        //             $query = mysqli_query($con,"insert into academic_years(year) values ('$branch_name')") or die(mysqli_error($con));
                                       

                        //                 if($query)
                        //                 {                                               
                        //                     echo '<script type="text/javascript">'; 
                        //                     echo 'alert("Branch Information Added Successfully");';
                                            
                        //                     echo '</script>';
                        //                 }
                        //                 else
                        //                 {
                        //                     echo '<script type="text/javascript">'; 
                        //                     echo 'alert("Branch Information Not Added");';
                                            
                        //                     echo '</script>';
                        //                 } 


                        //             }
                 ?>

                                    </form>