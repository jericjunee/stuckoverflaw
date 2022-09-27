module.exports = {
    purge: ["./resources/views/**/*.blade.php", "./resources/css/**/*.css"],
    content: ["./node_modules/flowbite/**/*.js"],
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
    plugins: [require("@tailwindcss/ui"), require("flowbite/plugin")],
};
