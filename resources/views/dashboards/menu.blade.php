<!-- LEFT SIDEBAR -->
            <div id="sidebar-nav" class="sidebar">
                <div class="sidebar-scroll">
                    <nav>
                        <ul class="nav">
                            @if(session['duty'] === '1'){
                                <li><a href="#"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                            <li>
                                <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Courts</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                <div id="subPages" class="collapse">
                                    <ul class="nav">
                                        <li><a href="{{ url('courts')}}">List of courts</a></li>
                                        <li><a href="{{ route('bindcourts.index')}}" class="">Add court to LGA</a></li>
                                    </ul>
                                </div>
                            </li>


                            <li>
                                <a href="#x2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Users</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                <div id="x2" class="collapse ">
                                    <ul class="nav">

                                        <li><a href="{{url('users')}}">List of users</a></li>
                                        <li><a href="{{url('clients')}}" class="">List of Clients</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#x3" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Affidavits</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                <div id="x3" class="collapse ">
                                    <ul class="nav">

                                        <li><a href="" class="">Type setup</a></li>
                                        <li><a href="" class="">Validate</a></li>
                                        <li><a href="" class="">History</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#x4" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Fee</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                <div id="x4" class="collapse ">
                                    <ul class="nav">

                                        <li><a href="{{ url('tfee')}}">Transaction fee</a></li>
                                    </ul>
                                </div>
                            </li>

                            elseif(session['duty'] == '2')
                        </ul>				
                    </nav>
                </div>
            </div>
            <!-- END LEFT SIDEBAR -->