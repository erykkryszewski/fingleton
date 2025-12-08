import $ from 'jquery';

let archiveTitle = $('.woocommerce-products-header');
let breadcrumbs = $('.woocommerce-breadcrumb');
let filters = $('.product-filters');

$(document).ready(function(){
  if(archiveTitle.length > 0 && breadcrumbs.length > 0) {
    archiveTitle.insertBefore(breadcrumbs);
  } else if(archiveTitle.length > 0 && filters.length > 0 && breadcrumbs.length == 0) {
    archiveTitle.insertBefore(filters);
  }
});