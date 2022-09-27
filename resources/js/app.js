require("./bootstrap");

const user_button = document.getElementById("user-menu-button");
const user_menu = document.getElementById("user-dropdown");

const dashboard_button = document.getElementById("dashboard-user-button");
const dashboard_menu = document.getElementById("dashboard-user-menu");

const options = {
    triggerEl: user_button,
};

const dashboard_opt = {
    triggerEl: dashboard_button,
};

const collapse = new Collapse(user_menu, options);
const dashboard_collapse = new Collapse(dashboard_menu, dashboard_opt);

user_button.addEventListener("click", function () {
    collapse.toggle();
});

dashboard_button.addEventListener("click", function () {
    dashboard_collapse.toggle();
});
