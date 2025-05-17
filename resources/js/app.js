import $ from 'jquery';
window.$ = window.jQuery = $;

import { createPopper } from '@popperjs/core';
window.Popper = createPopper;

import 'bootstrap';

import DataTable from 'datatables.net-bs4';
import 'datatables.net-bs4/css/dataTables.bootstrap4.css';
import 'datatables.net-select';

// Perubahan utama di bagian Chart.js
import { Chart } from 'chart.js';
window.Chart = Chart;

// Import plugin rounded bars sebagai modul ES
import roundedBarPlugin from './Chart.roundedBarCharts';
Chart.register(roundedBarPlugin);

import PerfectScrollbar from 'perfect-scrollbar';
window.PerfectScrollbar = PerfectScrollbar;

import './off-canvas';
import './hoverable-collapse';
import './template';
import './settings';
import './todolist';
import './dashboard';

import '../css/vertical-layout-light/style.css';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
