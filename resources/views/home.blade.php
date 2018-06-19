@extends('layouts.master')

@section('content-header')
    <!-- begin::Horizontal Menu -->
    <div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
        <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn">
            <i class="la la-close"></i>
        </button>
        <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light ">
            <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                <li class="m-menu__item  m-menu__item--active "  aria-haspopup="true">
                    <a  href="index.html" class="m-menu__link ">
                        <span class="m-menu__item-here"></span>
                        <span class="m-menu__link-text">
                                    Dashboard
                                </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end::Horizontal Menu -->
@endsection

@section('content-body')
    <!-- begin: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title ">
                    Dashboard
                </h3>
            </div>
        </div>
    </div>
    <!-- end: Subheader -->
@endsection
