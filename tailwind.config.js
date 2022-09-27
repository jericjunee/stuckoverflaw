module.exports = {
    content: [
        "./node_modules/flowbite/**/*.js",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#62929e",
                accent: "#c6c5b9",
                light: "#fdfdff",
                dark: "#393d3f",
            },
            fontFamily: {
                heading: "Albert Sans",
                body: "Akshar",
            },
            backgroundImage: {
                hero: "url('/public/image/hero-bg.jpg')",
            },
        },
    },
    variants: {},
    plugins: [require("flowbite/plugin")],
};
