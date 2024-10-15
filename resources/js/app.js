import './bootstrap';

import Alpine from 'alpinejs';

import 'flowbite';

import { DataTable } from "simple-datatables";

if (document.getElementById("search-table")) {
  const dataTable = new DataTable("#search-table", {
    searchable: true,
    fixedHeight: true,
  });
}

window.Alpine = Alpine;

Alpine.start();
