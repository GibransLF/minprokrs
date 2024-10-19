import "./bootstrap";

import Alpine from "alpinejs";

import "flowbite";

import { DataTable } from "simple-datatables";

if (document.getElementById("search-table")) {
    const dataTable = new DataTable("#search-table", {
        searchable: true,
        fixedHeight: true,
    });
}
if (document.getElementById("simple-table")) {
    const dataTable = new DataTable("#simple-table", {
        searchable: false,
        fixedHeight: true,
        perPageSelect: false,
    });
}

window.Alpine = Alpine;

Alpine.start();
