<nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                         
                        <li class="active">
                            <a class="has-arrow" href="index.html">
                                   <i class="icon treris-home icon-wrap"></i>
                                   <span class="mini-click-non">MAIN</span>
                                </a>
                            <ul class="submenu-angle" aria-expanded="true">
                             <li><a title="Defaulters" href="accounts.php"><span class="mini-sub-pro">Defaulters</span></a></li>

                                <li><a title="Serial" href="search_serial.php"><span class="mini-sub-pro">Search Serial</span></a></li>
                                <?php 
                        if ($_SESSION['role']==='super admin') {
                            # code...
                            ?>
                                <li><a title="quotation" href="renewal_prizes.php"><span class="mini-sub-pro">Renewal Prizes</span></a></li>
                                <?php
                            }
                            ?>
                                 <li><a title="quote hist" href="transactions_accounts.php"><span class="mini-sub-pro">Transactions</span></a></li>
                                <li><a title="quote hist" href="presenter-list.php"><span class="mini-sub-pro">Invoice HISTORY</span></a></li>
                                <li><a title="Analytics" href="accounts_analytics.php"><span class="mini-sub-pro">Sales Analytics</span></a></li> 
                                <li><a title="New Installation Invoice " href="Invoice/index.php"><span class="mini-sub-pro">New Installation Invoice</span></a></li>
                                <li><a title="Renewal Invoice " href="Invoice/renewal_invoice.php"><span class="mini-sub-pro">Renewal Invoice</span></a></li>
                                <li><a title="Valve Invoice " href="Invoice/valves.php"><span class="mini-sub-pro">Valves Invoice</span></a></li>
                                <li><a title="LPOs and Bank Cheques " href="lpos.php"><span class="mini-sub-pro"></span>LPOs and Cheques</a></li>

                            </ul>
                        </li>
                         
                    </ul>
                </nav>