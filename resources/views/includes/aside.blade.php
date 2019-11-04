<aside class="aside">
    <nav class="aside__nav">
        <ul class="nav nav-pills aside__nav__list">
            <li class="nav-item">
                <a class="nav-link {{Route::current()->getName() == 'page.dashboard' ? 'active' : ''}}" href="{{ route('page.dashboard') }}">Личный кабинет</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Route::current()->getName() == 'page.profile' ? 'active' : ''}}" href="{{ route('page.profile') }}">Мой профиль</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Route::current()->getName() == 'page.licenses' ? 'active' : ''}}" href="{{ route('page.licenses') }}">Мои лицензии</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Route::current()->getName() == 'page.partners' ? 'active' : ''}}" href="{{ route('page.partners') }}">Мои партнеры</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Route::current()->getName() == 'page.opportunities' ? 'active' : ''}}" href="{{ route('page.opportunities') }}">Мои возможности</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Route::current()->getName() == 'page.income' ? 'active' : ''}}" href="{{ route('page.income') }}">Мои доходы</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Route::current()->getName() == 'page.webinars' ? 'active' : ''}}" href="{{ route('page.webinars') }}">Вебинары</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Route::current()->getName() == 'page.materials' ? 'active' : ''}}" href="{{ route('page.materials') }}">Промо материалы</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link {{Route::current()->getName() == 'page.instructions' ? 'active' : ''}}" href="{{ route('page.instructions') }}">Инструкции</a>
            </li>
        </ul>
    </nav>
</aside>

