<template>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                        <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <a class="navbar-brand" href="#pablo"><b></b></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">

                <!--<div class="clock">
                    <ul>
                        <li id="Date"></li>
                    </ul>
                    <ul>
                        <li id="hours"></li>
                        <li id="point">:</li>
                        <li id="min"></li>
                        <li id="point">:</li>
                        <li id="sec"></li>
                    </ul>
                </div>-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Dashboard">
                            <i class="material-icons">dashboard</i>
                            <p>
                                <span class="d-lg-none d-md-block">Stats</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Agenda">
                            <i class="material-icons">calendar_today</i>
                            <p>
                                <span class="d-lg-none d-md-block">Agenda</span>
                            </p>
                        </a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">email</i>
                            <span class="notification">21</span>
                            <p>
								<span class="d-lg-none d-md-block">Messages
									<b class="caret"></b>
								</span>
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#pablo">Message Contact Us</a>
                            <a class="dropdown-item" href="#pablo">Message Aide & Contact</a>
                            <a class="dropdown-item" href="#pablo">Message Work With Us</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#pablo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="All Notifications">
                            <i class="material-icons">notifications</i>
                            <span class="notification">5</span>
                            <p>
								<span class="d-lg-none d-md-block">Some Actions
									<b class="caret"></b>
								</span>
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#pablo">Mike John responded to your email</a>
                            <a class="dropdown-item" href="#pablo">You have 5 new tasks</a>
                            <a class="dropdown-item" href="#pablo">You're now friend with Andrew</a>
                            <a class="dropdown-item" href="#pablo">Another Notification</a>
                            <a class="dropdown-item" href="#pablo">Another One</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                                Account
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-with-icons" aria-labelledby="navbarDropdownProfile">
                            <router-link :to="{ name: 'admin.account' }" class="dropdown-item">
                                <i class="material-icons">account_circle</i>
                                Profile
                            </router-link>
                            <router-link :to="{ name: 'admin.edit_profile' }" class="dropdown-item">
                                <i class="material-icons">settings_applications</i>
                                Settings
                            </router-link>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" id="btnShowAlertUnlock" style="cursor:pointer;">
                                <i class="material-icons" style="color:green;">settings_power</i>
                                <b>Unlock</b>
                            </a>
                            <a class="dropdown-item" @click="navLogout()" style="cursor:pointer;">
                                <i class="material-icons" style="color:red;">lock</i>
                                <b>Logout</b>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "TopNav",

        methods: {

            /* ***** script logout navbar ****/
            navLogout(){
                Swal.fire({
                    title:'Logout',
                    text: 'Are you sure you want to logout ?',
                    //type:'question',
                    animation: false,
                    customClass: 'animated rubberBand',
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Yes, logout',
                    cancelButtonText: 'cancel',
                    showCancelButton: true,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        //Start Progress bar
                        this.$Progress.start();

                        //Envoyer la requet au server
                        axios.post('/logout').then(() => {

                            /** Alert notify bootstrapp **/
                           // var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                           //     allow_dismiss: false,
                           //     showProgressbar: true
                           // });
                           // setTimeout(function() {
                           //     notify.update({'type': 'success', 'message': '<strong>User deleted successfully.</strong>', 'progress': 75});
                           // }, 2000);

                            location.replace(`/`);
                            //End Progress bar
                            this.$Progress.finish();

                            Fire.$emit('AfterSave');
                        }).catch(() => {
                            //Failled message
                            this.$Progress.fail();
                            //toastr.error('', 'Ooop! Something wrong. Try later');
                        });
                    }
                })
            },
        }
    }

    // Ici c'est le script de la date
    $(document).ready(function() {
        // Making 2 variable month and day
        var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
        var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

        // make single object
        var newDate = new Date();
        // make current time
        newDate.setDate(newDate.getDate());
        // setting date and time
        $('#Date').html(dayNames[newDate.getDay()] + ', ' + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

        setInterval( function() {
            // Create a newDate() object and extract the seconds of the current time on the visitor's
            var seconds = new Date().getSeconds();
            // Add a leading zero to seconds value
            $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
        },1000);

        setInterval( function() {
            // Create a newDate() object and extract the minutes of the current time on the visitor's
            var minutes = new Date().getMinutes();
            // Add a leading zero to the minutes value
            $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
        },1000);

        setInterval( function() {
            // Create a newDate() object and extract the hours of the current time on the visitor's
            var hours = new Date().getHours();
            // Add a leading zero to the hours value
            $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
        }, 1000);
    });
</script>

<style scoped>

</style>