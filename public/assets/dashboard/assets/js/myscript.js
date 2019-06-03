/* ***** script show status administrators *** */
// status Online
$('button.showAdministratorOnline').click(function() {
    var showInfo = $(this).attr("");
    administratorOnline(showInfo);
});

function administratorOnline(showInfo) {
    swal({
        title: '<p class="text-success">Administrator ONLINE</p>',
        animation: true,
        customClass: 'animated bounceIn',
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success",
        showConfirmButton: false,
        timer: 3000
    })
}

// status offline
$('button.showAdministratorOffline').click(function() {
    var showInfo = $(this).attr("");
    administratorOffline(showInfo);
});

function administratorOffline(showInfo) {
    swal({
        title: '<p class="text-danger">Administrator Offline</p>',
        animation: true,
        customClass: 'animated bounceIn',
        buttonsStyling: false,
        confirmButtonClass: "btn btn-success",
        showConfirmButton: false,
        timer: 3000
    })
}