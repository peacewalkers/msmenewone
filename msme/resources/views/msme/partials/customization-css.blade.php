<style>
    /**
     * Start site primary color
     */
    a {
        color:{{ $customization_site_primary_color }};
    }
    .btn-primary {
        background-color:{{ $customization_site_primary_color }};
        border-color:{{ $customization_site_primary_color }} !important;
    }
    .btn-primary:hover {
        background-color:#fff!important;
        color:{{ $customization_site_primary_color }} !important;
        border-color:{{ $customization_site_primary_color }} !important;
    }
    .btn-primary:disabled {
        color:#fff!important;
        background-color:{{ $customization_site_primary_color }} !important;
        border-color:{{ $customization_site_primary_color }} !important;
    }
    .btn-outline-primary {
        color:{{ $customization_site_primary_color }};
        border-color:{{ $customization_site_primary_color }} !important;
    }
    .btn-outline-primary:hover {
        background-color:{{ $customization_site_primary_color }} !important;
        border-color:{{ $customization_site_primary_color }} !important;
    }
    .btn-outline-primary:disabled {
        color:{{ $customization_site_primary_color }} !important;
    }
    .btn-outline-primary.dropdown-toggle {
        background-color:{{ $customization_site_primary_color }} !important;
        border-color:{{ $customization_site_primary_color }} !important;
    }
    .btn-link {
        color:{{ $customization_site_primary_color }} !important;
    }
    .dropdown-item.active,.dropdown-item:active {
        background-color:{{ $customization_site_primary_color }} !important;
    }
    .custom-control-input:checked~.custom-control-label:before {
        background-color:{{ $customization_site_primary_color }} !important;
    }
    .custom-control-input:checked~.custom-control-label:before {
        background-color:{{ $customization_site_primary_color }} !important;
    }
    .custom-control-input:indeterminate~.custom-control-label:before {
        background-color:{{ $customization_site_primary_color }} !important;
    }
    .custom-radio .custom-control-input:checked~.custom-control-label:before {
        background-color:{{ $customization_site_primary_color }} !important;
    }
    .custom-range::-webkit-slider-thumb {
        background-color:{{ $customization_site_primary_color }} !important;
    }
    .custom-range::-moz-range-thumb {
        background-color:{{ $customization_site_primary_color }} !important;
    }
    .custom-range::-ms-thumb {
        background-color:{{ $customization_site_primary_color }} !important;
    }
    .nav-pills .nav-link.active,.nav-pills .show>.nav-link {
        background-color:{{ $customization_site_primary_color }} !important;
    }
    .page-link {
        color:{{ $customization_site_primary_color }} !important;
    }
    .page-item.active .page-link {
        color:#ffffff !important;
        background-color:{{ $customization_site_primary_color }} !important;
        border-color:{{ $customization_site_primary_color }};
    }
    .badge-primary {
        background-color:{{ $customization_site_primary_color }} !important;
    }
    .progress-bar {
        background-color:{{ $customization_site_primary_color }} !important;
    }
    .list-group-item.active {
        background-color:{{ $customization_site_primary_color }} !important;
        border-color:{{ $customization_site_primary_color }} !important;
    }
    .bg-primary {
        background-color:{{ $customization_site_primary_color }} !important;
    }
    .border-primary {
        border-color:{{ $customization_site_primary_color }} !important;
    }
    .text-primary {
        color:{{ $customization_site_primary_color }} !important;
    }
    .pace .pace-progress {
        background:{{ $customization_site_primary_color }} !important;
    }
    .btn.btn-outline-white:hover {
        color:{{ $customization_site_primary_color }} !important;
    }
    .form-control:active, .form-control:focus {
        border-color:{{ $customization_site_primary_color }} !important;
    }
    .site-section-heading:after {
        background:{{ $customization_site_primary_color }} !important;
    }
    .site-section-heading.text-center:after {
        background:{{ $customization_site_primary_color }} !important;
    }
    .ul-check.primary li:before {
        color:{{ $customization_site_primary_color }} !important;
    }
    .site-navbar .site-navigation .site-menu .active > a {
        color:{{ $customization_site_primary_color }} !important;
    }
    .site-navbar .site-navigation .site-menu > li > a:hover {
        color:{{ $customization_site_primary_color }} !important;
    }
    .site-navbar .site-navigation .site-menu .has-children .dropdown {
        border-top: 2px solid {{ $customization_site_primary_color }} !important;
    }
    .site-navbar .site-navigation .site-menu .has-children .dropdown .active > a {
        color:{{ $customization_site_primary_color }} !important;
    }
    .site-navbar .site-navigation .site-menu .has-children:hover > a, .site-navbar .site-navigation .site-menu .has-children:focus > a, .site-navbar .site-navigation .site-menu .has-children:active > a {
        color:{{ $customization_site_primary_color }} !important;
    }
    .site-mobile-menu .site-nav-wrap a:hover {
        color:{{ $customization_site_primary_color }} !important;
    }
    .site-mobile-menu .site-nav-wrap li.active > a {
        color:{{ $customization_site_primary_color }} !important;
    }
    .site-block-tab .nav-item > a:hover, .site-block-tab .nav-item > a.active {
        border-bottom: 2px solid {{ $customization_site_primary_color }} !important;
    }
    .block-13 .owl-nav .owl-prev:hover, .block-13 .owl-nav .owl-next:hover, .slide-one-item .owl-nav .owl-prev:hover, .slide-one-item .owl-nav .owl-next:hover {
        color:{{ $customization_site_primary_color }} !important;
    }
    .slide-one-item .owl-dots .owl-dot.active span {
        background:{{ $customization_site_primary_color }} !important;
    }
    .block-12 .text .text-inner:before {
        background:{{ $customization_site_primary_color }} !important;
    }
    .block-16 figure .play-button {
        color:{{ $customization_site_primary_color }} !important;
    }
    .block-25 ul li a .meta {
        color:{{ $customization_site_primary_color }} !important;
    }
    .player .team-number {
        background:{{ $customization_site_primary_color }} !important;
    }
    .site-block-27 ul li.active a, .site-block-27 ul li.active span {
        background:{{ $customization_site_primary_color }} !important;
    }
    .feature-1, .free-quote, .feature-3 {
        background:{{ $customization_site_primary_color }} !important;
    }
    .border-primary:after {
        background:{{ $customization_site_primary_color }} !important;
    }
    .how-it-work-item .number {
        background:{{ $customization_site_primary_color }} !important;
    }
    .custom-pagination a, .custom-pagination span {
        background:{{ $customization_site_primary_color }} !important;
    }
    .popular-category:hover {
        background:{{ $customization_site_primary_color }} !important;
    }
    .listing-item .listing-item-content .category {
        background:{{ $customization_site_primary_color }} !important;
    }
    .accordion-item[aria-expanded="true"] {
        color:{{ $customization_site_primary_color }} !important;
    }
    .rangeslider.rangeslider--horizontal .rangeslider__fill {
        background:{{ $customization_site_primary_color }} !important;
    }
    .rangeslider .rangeslider__handle:after {
        border: 3px solid {{ $customization_site_primary_color }} !important;
    }
    /**
     * End site primary color
     */

    /**
     * Start menu header background color
     */
    .customization-header-background-color {
        background-color:{{ $customization_site_header_background_color }} !important;
    }
    /**
     * End menu header background color
     */

    /**
     * Start menu header font color
     */
    .customization-header-font-color {
        color:{{ $customization_site_header_font_color }} !important;
    }
    .site-navbar .site-navigation .site-menu > li > a {
        color:{{ $customization_site_header_font_color }} !important;
    }
    /**
     * End menu header font color
     */

    /**
     * Start footer background color
     */
    .site-footer {
        background: {{ $customization_site_footer_background_color }} !important;
    }
    /**
     * End footer background color
     */

    /**
     * Start footer font color
     */
    .site-footer .footer-heading {
        color: {{ $customization_site_footer_font_color }} !important;
    }
    .site-footer p {
        color: {{ $customization_site_footer_font_color }} !important;
    }
    .site-footer a {
        color: {{ $customization_site_footer_font_color }} !important;
    }
    .customization-footer-font-color {
        color: {{ $customization_site_footer_font_color }} !important;
    }
    /**
     * End footer font color
     */
</style>

