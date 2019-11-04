<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Навигация</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{Route::current()->getName() == 'admin.page.dashboard' ? 'active' : ''}}">
                    <a href="{{ route('admin.page.dashboard') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="icon-home"></i></span>
                        <span class="pcoded-mtext">Главная</span>
                    </a>
                </li>
                <li class="{{Route::current()->getName() == 'admin.page.rates' ? 'active' : ''}}">
                    <a href="{{ route('admin.page.rates') }}">
                        <span class="pcoded-micon"><i class="icon-chart"></i></span>
                        <span class="pcoded-mtext">Ставки</span>
                    </a>
                </li>
                <li class="{{Route::current()->getName() == 'admin.page.clients' ? 'active' : ''}}">
                    <a href="{{ route('admin.page.clients') }}">
                        <span class="pcoded-micon"><i class="icon-people"></i></span>
                        <span class="pcoded-mtext">Клиенты</span>
                    </a>
                </li>
                <li class="{{Route::current()->getName() == 'admin.page.payments' ? 'active' : ''}}">
                    <a href="{{ route('admin.page.payments') }}">
                        <span class="pcoded-micon"><i class="icon-paypal"></i></span>
                        <span class="pcoded-mtext">Оплаты</span>
                    </a>
                </li>
                <li class="{{Route::current()->getName() == 'admin.page.purchases' ? 'active' : ''}}">
                    <a href="{{ route('admin.page.purchases') }}">
                        <span class="pcoded-micon"><i class="icon-basket-loaded"></i></span>
                        <span class="pcoded-mtext">Покупки</span>
                    </a>
                </li>
                <li class="{{Route::current()->getName() == 'admin.page.news' ? 'active' : ''}}">
                    <a href="{{ route('admin.page.news') }}">
                        <span class="pcoded-micon"><i class="icon-speech"></i></span>
                        <span class="pcoded-mtext">Новости</span>
                    </a>
                </li>
            </ul>

            {{--<div class="pcoded-navigation-label">Другое</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu ">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                        <span class="pcoded-mtext">Menu Levels</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Menu Level 2.1</span>
                            </a>
                        </li>
                        <li class="pcoded-hasmenu ">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Menu Level 2.2</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Menu Level 3.1</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Menu Level 2.3</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript:void(0)" class="disabled waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-power"></i>
<b>D</b>
</span>
                        <span class="pcoded-mtext">Disabled Menu</span>
                    </a>
                </li>
                <li class="">
                    <a href="sample-page.html" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-watch"></i>
</span>
                        <span class="pcoded-mtext">Sample Page</span>
                    </a>
                </li>
            </ul>--}}
        </div>
    </div>
</nav>