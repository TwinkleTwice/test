<nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 px-6 bg-white shadow sm:items-baseline w-full">
    <div class="mb-2 sm:mb-0 inner">
    </div>
    <div class="sm:mb-0 self-center">
        <a href="{{ route("checks") }}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Чеки</a>

        @auth("web")
            <a href="{{ route("check_form") }}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Загрузка чека</a>
        @endauth

        @auth("web")
            <a href="{{ route("home") }}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Главная</a>
        @endauth

        @auth("web")
            <a href="{{ route("logout") }}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Выйти</a>
        @endauth

        @guest("web")
            <a href="{{ route("login") }}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Войти</a>
        @endguest
    </div>
</nav>
