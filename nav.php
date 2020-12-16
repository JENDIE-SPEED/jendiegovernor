
<nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                       <?php
                        if ($_SESSION['role']==='super admin') {
                            # code...
                            ?>
                            <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon treris-new-file icon-wrap"></i> <span class="mini-click-non">SWITCH</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Acounts " href="accounts.php"><span class="mini-sub-pro">Acounts</span></a></li>
                            <li><a title="cancel " href="admin_cancel.php"><span class="mini-sub-pro">Cancel</span></a></li>
                            <li><a title="cancel" href="canceled.php"><span class="mini-sub-pro">Canceled</span></a></li>
                            <li><a title="Update Vehicle" href="update_vehicle.php"><span class="mini-sub-pro">Update Vehicle</span></a></li>
                            </ul>
                        </li>
                            <?php
                        }
                        ?>
                        
                        
                        <li class="active">
                            <a class="has-arrow" href="#">
                                   <i class="icon treris-home icon-wrap"></i>
                                   <span class="mini-click-non">MAIN</span>
                                </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard " href="index-1.php"><span class="mini-sub-pro">New Installation</span></a></li>
                                
                                <li><a title="History List" href="product-list.php"><span class="mini-sub-pro">History</span></a></li>
								<li><a title="History List" href="renewed.php"><span class="mini-sub-pro">Renewed</span></a></li>
                                <li><a title="History List" href="upcoming_renewals.php"><span class="mini-sub-pro">Upcoming renewals</span></a></li>
                                <li><a title="Technician list" href="presenter-list.php"><span class="mini-sub-pro">Technician</span></a></li>
                                
                                <?php
                                if ($company==="JENDIE"  && $user !='simsgit@gmail.com') {
                                    # code...
                                    ?>
								
                                <li><a title="date" href="report_date.php"><span class="mini-sub-pro">Export date</span></a></li>
                                <li><a title="date" href="export_customer.php"><span class="mini-sub-pro">Export customer</span></a></li>
                               <li><a title="dealer" href="dealer.php"><span class="mini-sub-pro">Dealer</span></a></li>
                                <li><a title="addstock" href="addstock.php"><span class="mini-sub-pro">Add Stock</span></a></li>
                                <li><a title="stock" href="stock.php"><span class="mini-sub-pro">Allocate Stock</span></a></li>
                                
                                
                                <li><a title="Presenter list" href="reverse.php"><span class="mini-sub-pro">Reverse Stock</span></a></li>
                                
                                <li><a title="stock summary" href="summary.php"><span class="mini-sub-pro">Sales Summary</span></a></li>
                                 
                                
                                    <?php
                                } 
                                
                                    
                                
                                 
                                else
                                {
                                    ?>
                                    <li><a title="Presenter list" href="pending_stock.php"><span class="mini-sub-pro">Pending Stock</span></a></li>
                                    <?php
                                }
                                ?>
                                
                                
                                <li><a title="Analytics" href="analytics.php"><span class="mini-sub-pro">Sales Analytics</span></a></li>
                            </ul>
                        </li>
                        <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon treris-new-file icon-wrap"></i> <span class="mini-click-non">RENEWAL</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                
                                <li><a title="Batch" href="batch.php"><span class="mini-sub-pro"> Renewal</span></a></li>
                                <li><a title="Pending " href="pending_renewal.php"><span class="mini-sub-pro">Pending Renewal</span></a></li>
                                <?php
                                if ($_SESSION['role']==='super admin' ) {
                                    # code...
                                    ?>
                                    <li><a title="Pending " href="approve.php"><span class="mini-sub-pro"></span>Approve</a></li>
									<li><a title="Transactions " href="transactions.php"><span class="mini-sub-pro"></span>Transactions</a></li>
									
                                    <?php
                                } 
                                
                                
                                ?>
                            </ul>
                        </li>
                        <li id="removable">
                                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon treris-new-file icon-wrap"></i> <span class="mini-click-non">REPLACE</span></a>
                                                    <ul class="submenu-angle" aria-expanded="false">

                                                        <li><a title="suspend" href="replace.php"><span class="mini-sub-pro">Replace</span></a></li>
                                                        
                                                    </ul>
                                                </li>
                        <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon treris-new-file icon-wrap"></i> <span class="mini-click-non">ACCOUNT</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="ACCOUNT" href="create_account.php"><span class="mini-sub-pro">Create Account</span></a></li>
                                <li><a title="ACCOUNT" href="add_vehicles.php"><span class="mini-sub-pro">Add Vehicle</span></a></li>
                                <li><a title="ACCOUNT" href="view_account.php"><span class="mini-sub-pro">View Vehicle</span></a></li>

                            </ul>
                        </li>

                       <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon treris-new-file icon-wrap"></i> <span class="mini-click-non">OCCURENCE</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <?php
                                if ($company==="JENDIE"  && $user !='simsgit@gmail.com') {
                                    # code...
                                    ?>
                                
                                <li><a title="Signup" href="view_incident.php"><span class="mini-sub-pro">View Incidents</span></a></li>
                                <li><a title="Signup" href="new_incidents.php"><span class="mini-sub-pro">New Incident</span></a></li>
                                    <?php
                                } 
                                else
                                {
                                    ?>
                                     <li><a title="Signup" href="view_incident.php"><span class="mini-sub-pro">View Incidents</span></a></li>
                                    <li><a title="Signup" href="new_incidents.php"><span class="mini-sub-pro">New Incidents</span></a></li>
                                    <?php
                                }
                                ?>
                               
                                

                            </ul>
                        </li>
                       
                        <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon treris-new-file icon-wrap"></i> <span class="mini-click-non">DEALERLIST</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                               
                                     <li><a title="Signup" href="dealerlist.php"><span class="mini-sub-pro">List</span></a></li>
                                 </ul>
                             </li>
                             <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon treris-new-file icon-wrap"></i> <span class="mini-click-non">PULSE SETTINGS</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                               
                                     <li><a title="Signup" href="pulselist.php"><span class="mini-sub-pro">Pulses</span></a></li>
                                     <?php
                                     if ($company==='JENDIE'  && $user !='simsgit@gmail.com') {
                                         # code...
                                        ?>
                                        <li><a title="Signup" href="addpulse.php"><span class="mini-sub-pro">Add Pulses</span></a></li>
                                        <?php
                                     }
                                     ?>
                                     
                                 </ul>
                             </li>
                        <li id="removable">
                                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon treris-new-file icon-wrap"></i> <span class="mini-click-non">ADD USERS</span></a>
                                                    <ul class="submenu-angle" aria-expanded="false">
                                                        
                                                       
                                                        <li><a title="Signup" href="addtechnican.php"><span class="mini-sub-pro">Technician</span></a></li>
                                                        <?php
                                                        if ($_SESSION['role']==='super admin' || $_SESSION['role']==='admin' ) {
                                                            # code...
                                                            ?>
                                                        <li><a title="Signup" href="signup.html"><span class="mini-sub-pro">Company Users</span></a></li>
                                                        <li><a title="Signup" href="adddealer.php"><span class="mini-sub-pro">Dealers</span></a></li>
                                                        <li><a title="Signup" href="location.php"><span class="mini-sub-pro">Add Location</span></a></li>
                                                            <?php
                                                        }
                                                        
                                                        ?>
                                                    </ul>
                                                </li>
                                                <?php
                                                if ($company==='JENDIE'  && $user !='simsgit@gmail.com') {
                                                    # code...
                                                    ?>
                                                    <li id="removable">
                                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon treris-new-file icon-wrap"></i> <span class="mini-click-non">LEDGER</span></a>
                                                    <ul class="submenu-angle" aria-expanded="false">
                                                        
                                                       
                                                        <li><a title="ledger" href="ledger.php"><span class="mini-sub-pro">list</span></a></li>
                                                        
                                                    </ul>
                                                </li>
                                                <li id="removable">
                                                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon treris-new-file icon-wrap"></i> <span class="mini-click-non">SUSPENDED</span></a>
                                                    <ul class="submenu-angle" aria-expanded="false">
                                                        
                                                       
                                                        <li><a title="suspend" href="sus.php"><span class="mini-sub-pro">Suspended Tech</span></a></li>
                                                        <li><a title="suspend" href="supended_dealers.php"><span class="mini-sub-pro">Suspended dealers</span></a></li>
                                                        
                                                    </ul>
                                                </li>
                                                
                                                    <?php
                                                }
                                                ?>
                                                 
                                    
                                    
                               
                                

                            </ul>
                        </li>
                         
                    </ul>
                </nav>