<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
 <div class="card shadow">
     <div class="card-header">
         <div class="row">
             <div class="col-md-8 col-8">
                 <h4 class="mb-sm-0 font-size-18">Manage Team</h4>
             </div>
             <div class="col-md-4 col-4">
                 <a href="<?= base_url()?>Admin/create_team"><button class="btn btn-primary float-right">+ Add</button></a>
             </div>
         </div>
             
     </div>
     <div class="card-body">
          <!--filter-->
             <div class="data-filters">
                 <!--<h6>Filters</h6>-->
                 <div class="row">
                     <!--<div class="col-md-3"></div>-->
                     <div class="col-md-4">
                         <div class="mb-3">
                             <label class="mb-2">Category</label>
                            <select class="form-control" name="" required>
                                <option value="">All Category</option>
                                <option value="">Uttar Pradesh</option>
                                <option value="">Madhya Pradesh</option>
                            </select>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="mb-3">
                             <label class="mb-2">State</label>
                            <select class="form-control" name="" required>
                                <option value="">All State</option>
                                <option value="">Uttar Pradesh</option>
                                <option value="">Madhya Pradesh</option>
                            </select>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="mb-3">
                             <label class="mb-2">Status</label>
                            <select class="form-control" name="" required>
                                <option value="">All</option>
                                <option value="">Open To Play</option>
                             </select>
                         </div>
                     </div>
                 </div>
             </div>
             <!--filter-->
           <table class="table table-bordered table-responsive datatable nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Team Name</th>
                                                 <th>Sports Category</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                                <th>Players</th>
                                                <th>About</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                     <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><img src="https://image.shutterstock.com/image-vector/cricket-team-logo-creative-icon-260nw-1952590060.jpg" class="user-img">Cricket Team Club</td>
                                                 <td>Cricket</td>
                                                <td><a class="text-color" href="tel:+91 9999999999">+91 9999999999</a></td>
                                                <td><a class="text-color" href="mailto:user@gmail.com">user@gmail.com</a></td>
                                                <td><button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#team_player"><i class="bx bx-info-circle"></i> Team Member</button></td>
                                                <td><button class="btn btn-primary btn-edit btn-sm" data-bs-toggle="modal" data-bs-target="#about"><i class="bx bx-info-circle"></i> About</button></td>
                                                <td><button class="btn btn-success btn-sm">Open to play</button></td>
                                                <td>
                                                  <div class="action-btn">
                                                      <a href="<?= base_url()?>Admin/update_team"><button class="btn btn-primary btn-sm btn-edit"><i class="bx bxs-pencil"></i></button></a>
                                                      <button class="btn btn-danger btn-sm"><i class="bx bxs-trash"></i></button>
                                                  </div>
                                                </td>
                                             </tr>
                      </tbody>
          </table>
     </div>
 </div>
<!--about player-->
 <div class="modal fade" id="about" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">About Us</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="" name="">

                          <div class="modal-body">
                              <p>Cricket Team Club was founded in 2020 in Gwalior,
                                Madhya Pradesh. We have competed over 50+ Cricket
                                Tournaments. Our main goal is "We want to play as next
                                Indian team because we love our nation, we love India.</p>
                               <h6 class="mb-2">Team Details</h6>
                                <div class="row">
                                    <div class="col-4 mb-2">
                                        City
                                    </div>
                                    <div class="col-8 mb-2">
                                        Agra
                                    </div>
                                    <div class="col-4 mb-2">
                                        State
                                    </div>
                                    <div class="col-8 mb-2">
                                        U.P
                                    </div>
                                    <div class="col-4 mb-2">
                                        Address
                                    </div>
                                    <div class="col-8 mb-2">
                                        Sadar Bazaar, Agra
                                    </div>
                                    
                                    <h6 class="mb-2 mt-3">Achievements</h6>
                                    <div>
                                        <ul>
                                            <li>2 Times DDL Football Tournament 2017 & 2020, Winner.</li>
                                            <li>Best Team Leader awarded in 2021.</li>
                                            <li>Winner, Agra Football Tournament 2017.</li>
                                        </ul>
                                    </div>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <!--<button type="button" class="btn btn-primary">Submit</button>-->
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
<!--about player-->
<!--Team player-->
 <div class="modal fade" id="team_player" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Team Members</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="" name="">

                          <div class="modal-body">
                               <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="card team-member-card p-2 mb-2">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <div class="name-first-letter btn-success">J</div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="details">
                                                        Jayesh <br>
                                                        <b>Captain</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="card team-member-card p-2 mb-2">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <div class="name-first-letter btn-danger">J</div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="details">
                                                        Jayesh <br>
                                                        <b>Captain</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="card team-member-card p-2 mb-2">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <div class="name-first-letter btn-info">J</div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="details">
                                                        Jayesh <br>
                                                        <b>Captain</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="card team-member-card p-2 mb-2">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <div class="name-first-letter btn-primary">J</div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="details">
                                                        Jayesh <br>
                                                        <b>Captain</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                      <div class="col-md-6 mb-2">
                                        <div class="card team-member-card p-2 mb-2">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <div class="name-first-letter btn-success">J</div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="details">
                                                        Jayesh <br>
                                                        <b>Captain</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="card team-member-card p-2 mb-2">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <div class="name-first-letter btn-danger">J</div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="details">
                                                        Jayesh <br>
                                                        <b>Captain</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <!--<button type="button" class="btn btn-primary">Submit</button>-->
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
<!--Team player-->
<?php include('includes/footer.php')?>