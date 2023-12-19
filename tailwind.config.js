/** @type {import('tailwindcss').Config} */

import forms from "@tailwindcss/forms";

export default {
    darkMode: "class",
    presets: [require("./vendor/tallstackui/tallstackui/tailwind.config.js")],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/tallstackui/tallstackui/src/**/*.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: "#4f46e5",
                    500: "#6366f1",
                    600: "#4f46e5",
                },
                secondary: {
                    DEFAULT: "#6366f1",
                },
                dark: {
                    DEFAULT: "#3f4d69",
                    50: "#f6f7f9",
                    100: "#ebeef3",
                    200: "#d3d9e4",
                    300: "#acb8cd",
                    400: "#7f92b1",
                    500: "#5f7498",
                    600: "#4b5d7e",
                    700: "#3f4d69",
                    800: "#364156",
                    900: "#30384a",
                    950: "#202531",
                },
            },
        },
    },
    plugins: [forms],
};
