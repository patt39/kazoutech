
<div class="sidebar" data-color="azure" data-background-color="black" data-image="{{ Auth::user()->avatar }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="/" class="simple-text logo-mini">
            <b>KT</b>
        </a>
        <a href="/" class="simple-text logo-normal">
            <b style="font-size: 80%;">{{ config('app.name') }}</b>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                @if(Auth::user()->avatar)
                    <img src="{{ Auth::user()->avatar  }}" />
                @endif
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
				<span>
					<b>{{ Auth::user()->name }}</b>
					<b class="caret"></b>
				</span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <router-link  :to="{ name: 'admin.account' }" class="nav-link">
                                <span class="sidebar-mini"><b>MP</b></span>
                                <span class="sidebar-normal"><b>My Profile</b></span>
                            </router-link>
                        </li>
                        <li class="nav-item ">
                            <router-link :to="{ name: 'admin.edit_profile' }" class="nav-link">
                                <span class="sidebar-mini">EP</span>
                                <span class="sidebar-normal"><b>Edit Profile</b></span>
                            </router-link>
                        </li>
                        <li class="nav-item ">
                            <router-link :to="{ name: 'messages.index' }" class="nav-link">
                                <span class="sidebar-mini">MB</span>
                                <span class="sidebar-normal"><b>Message Box</b></span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ path: `/dashboard/tasks/u/${user.username}/`}" class="nav-link">
                                <span class="sidebar-mini">TT</span>
                                <span class="sidebar-normal"><b>Tasks Todo</b></span>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><b>MS</b></span>
                                <span class="sidebar-normal"><b>Member since:
								{!! Auth::user()->created_at->format('\<\s\t\r\o\n\g\>d\</\s\t\r\o\n\g\> M Y') !!}
								</b>
							</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><b>CL</b></span>
                                <span class="sidebar-normal"><b>Current Login:
								{!! str_limit( \Carbon\Carbon::parse(Auth::user()->current_sign_in_at)->diffForHumans(), 30,'...')!!}</b>
							</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="btnShowAlertLogout" style="cursor:pointer;">
                                <span class="sidebar-mini"><b>L</b></span>
                                <span class="sidebar-normal"><b>Logout</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <!-- Dashboard -->
            <li class="nav-item">
                <router-link  :to="{ path: '/dashboard/' }" class="nav-link">
                    <i class="material-icons">dashboard</i>
                    <p><b>Dashboard</b></p>
                </router-link>
            </li>
            <!-- Documentation site -->
            <li class="nav-item">
                <router-link  :to="{ path: '/dashboard/documentations/' }" class="nav-link">
                    <i class="material-icons">assignment_ind</i>
                    <p><b>Documentations site</b></p>
                </router-link>
            </li>
            <!-- Occupations -->
            <li class="nav-item">
                <router-link  :to="{ path: '/dashboard/occupations/' }" class="nav-link">
                    <i class="material-icons">assignment</i>
                    <p><b>Occupations</b></p>
                </router-link>
            </li>
            <!-- Links Pages -->
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#pageExamples">
                    <i class="material-icons">list_alt</i>
                    <p><b>Pages</b>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="pageExamples">
                    <ul class="nav">
                        <!-- Abouts -->
                        <li class="nav-item">
                            <router-link  :to="{ name: 'abouts.index' }"  replace class="nav-link">
                                <span class="sidebar-mini"><b>AM</b></span>
                                <span class="sidebar-normal"><b>About Member</b></span>
                            </router-link>
                        </li>
                        <!--Testimonial-->
                        <li class="nav-item">
                            <router-link  :to="{ path: '/dashboard/testimonials/' }" class="nav-link">
                                <span class="sidebar-mini"><b>TS</b></span>
                                <span class="sidebar-normal"><b>Testimonials</b></span>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Links Partial -->
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#partialExamples">
                    <i class="material-icons">contact_support</i>
                    <p><b>Partials</b>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="partialExamples">
                    <ul class="nav">
                        <!-- Links -->
                        <li class="nav-item">
                            <router-link  :to="{ path: '/dashboard/links/' }" class="nav-link">
                                <span class="sidebar-mini"><b>LI</b></span>
                                <span class="sidebar-normal"><b>Links</b></span>
                            </router-link>
                        </li>
                        <!-- Colors -->
                        <li class="nav-item">
                            <router-link  :to="{ path: '/dashboard/colors/' }" class="nav-link">
                                <span class="sidebar-mini"><b>COL</b></span>
                                <span class="sidebar-normal"><b>Colors</b></span>
                            </router-link>
                        </li>
                        <!-- Diplomas -->
                        <li class="nav-item">
                            <router-link  :to="{ path: '/dashboard/diplomas/' }" class="nav-link">
                                <span class="sidebar-mini"><b>DI</b></span>
                                <span class="sidebar-normal"><b>Diplomas</b></span>
                            </router-link>
                        </li>
                        <!-- Countries -->
                        <li class="nav-item">
                            <router-link  :to="{ name: 'countries.index' }"  replace class="nav-link">
                                <span class="sidebar-mini"><b>CO</b></span>
                                <span class="sidebar-normal"><b>Country</b></span>
                            </router-link>
                        </li>
                        <!-- Cites -->
                        <li class="nav-item">
                            <router-link  :to="{ name: 'cities.index' }"  replace class="nav-link">
                                <span class="sidebar-mini"><b>CI</b></span>
                                <span class="sidebar-normal"><b>Cities</b></span>
                            </router-link>
                        </li>
                        <!-- Tags -->
                        <li class="nav-item">
                            <router-link  :to="{ path: '/dashboard/tags/' }" class="nav-link">
                                <span class="sidebar-mini"><b>TA</b></span>
                                <span class="sidebar-normal"><b>Tags</b></span>
                            </router-link>
                        </li>
                        <!-- Categories -->
                        <li class="nav-item">
                            <router-link  :to="{ path: '/dashboard/categories/' }" class="nav-link">
                                <span class="sidebar-mini"><b>CA</b></span>
                                <span class="sidebar-normal"><b>Categories</b></span>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Categories Faqs -->
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#faqsExamples">
                    <i class="material-icons">contact_support</i>
                    <p><b>FAQs</b>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="faqsExamples">
                    <ul class="nav">
                        <li class="nav-item">
                            <router-link  :to="{ path: '/dashboard/category-faqs/' }" class="nav-link">
                                <span class="sidebar-mini"><b>CF</b></span>
                                <span class="sidebar-normal"><b>Category FAQs</b></span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link  :to="{ name: 'faqs.index' }" class="nav-link">
                                <span class="sidebar-mini"><b>FQ</b></span>
                                <span class="sidebar-normal"><b>FAQs</b></span>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Contacts -->
            <li class="nav-item">
                <router-link  :to="{ path: '/dashboard/contacts/' }" class="nav-link">
                    <i class="material-icons">message</i>
                    <p><b>Contacts</b></p>
                </router-link>
            </li>
            <!-- Technician -->
            <li class="nav-item">
                <router-link  :to="{ path: '/dashboard/technicians/' }" class="nav-link">
                    <i class="material-icons">meeting_room</i>
                    <p><b>Technicians</b></p>
                </router-link>
            </li>
            <!-- Administrations -->
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#administrationExamples">
                    <i class="material-icons">person_outline</i>
                    <p><b>Administrations</b>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="administrationExamples">
                    <ul class="nav">
                        <!-- Activities -->
                        <li class="nav-item">
                            <router-link  :to="{ name: 'activities.index' }" class="nav-link">
                                <span class="sidebar-mini">AC</span>
                                <span class="sidebar-normal"><b>Activities site</b></span>
                            </router-link>
                        </li>
                        <!-- Administrators -->
                        <li class="nav-item">
                            <router-link  :to="{ name: 'administrators.index' }" class="nav-link">
                                <span class="sidebar-mini">AD</span>
                                <span class="sidebar-normal"><b>Administrators</b></span>
                            </router-link>
                        </li>
                        <!-- Users -->
                        <li class="nav-item">
                            <router-link  :to="{ name: 'users.index' }" class="nav-link">
                                <span class="sidebar-mini">US</span>
                                <span class="sidebar-normal"><b>Users</b></span>
                            </router-link>
                        </li>
                        <!-- Notes -->
                        <li class="nav-item">
                            <router-link  :to="{ name: 'notes.index' }" class="nav-link">
                                <span class="sidebar-mini">NO</span>
                                <span class="sidebar-normal"><b>Notes</b></span>
                            </router-link>
                        </li>
                        <!-- Tasks -->
                        <li class="nav-item">
                            <router-link  :to="{ name: 'tasks.index' }" class="nav-link">
                                <span class="sidebar-mini">TA</span>
                                <span class="sidebar-normal"><b>Tasks</b></span>
                            </router-link>
                        </li>
                        <!-- Permissions -->
                        <li class="nav-item">
                            <router-link  :to="{ name: 'permissions.index' }" class="nav-link">
                                <span class="sidebar-mini">PM</span>
                                <span class="sidebar-normal"><b>Permissions</b></span>
                            </router-link>
                        </li>
                        <!-- Roles -->
                        <li class="nav-item">
                            <router-link  :to="{ name: 'roles.index' }" class="nav-link">
                                <span class="sidebar-mini">RO</span>
                                <span class="sidebar-normal"><b>Roles</b></span>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Legals Mentions -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#legalsExamples">
                    <i class="material-icons">looks</i>
                    <p><b>Legal & Mention</b>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="legalsExamples">
                    <ul class="nav">
                        <li class="nav-item">
                            <router-link  :to="{ path: '/dashboard/legal_notice/' }" class="nav-link">
                                <span class="sidebar-mini"><b>LN</b></span>
                                <span class="sidebar-normal"><b>Legal Notice</b></span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link  :to="{ path: '/dashboard/licence_site/' }" class="nav-link">
                                <span class="sidebar-mini"><b>LS</b></span>
                                <span class="sidebar-normal"><b>Licence Site</b></span>
                            </router-link>
                        </li>
                        <li class="nav-item ">
                            <router-link  :to="{ path: '/dashboard/policy_privacy/' }" class="nav-link">
                                <span class="sidebar-mini"><b>PP</b></span>
                                <span class="sidebar-normal"><b>Policy & Privacy</b></span>
                            </router-link>
                        </li>
                        <li class="nav-item ">
                            <router-link  :to="{ path: '/dashboard/conditions/' }" class="nav-link">
                                <span class="sidebar-mini"><b>TC</b></span>
                                <span class="sidebar-normal"><b>Terms & Conditions</b></span>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
