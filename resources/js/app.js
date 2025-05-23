import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

Echo.private(`App.Models.Admin.1`).notification((notification) => {
    console.log("comes");
    alert(3);
    toastr.success(notification.msg);
});
