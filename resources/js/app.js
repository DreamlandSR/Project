import $ from 'jquery';
window.$ = window.jQuery = $;

import Popper from 'popper.js/dist/umd/popper';
window.Popper = Popper;

import 'bootstrap';

import DataTable from 'datatables.net-bs4';
import 'datatables.net-bs4/css/dataTables.bootstrap4.css';
import 'datatables.net-select';

import Chart from 'chart.js';
window.Chart = Chart;

import PerfectScrollbar from 'perfect-scrollbar';
window.PerfectScrollbar = PerfectScrollbar;

// File custom JS dari template Skydash
import './bootstrap';
import './off-canvas';
import './hoverable-collapse';
import './template';
import './settings';
import './todolist';
import './dashboard';
import './Chart.roundedBarCharts';
import '../css/vertical-layout-light/style.css';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
