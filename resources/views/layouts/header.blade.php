<header>
    <nav>
        @if(session('user'))
            @if(session('user')->rola == 'administrator')
                <h3>Panel Admina</h3>
                <ul>
                    <li><a href="{{ route('uzytkownicy.index') }}">Użytkownicy</a></li>
                    <li><a href="{{ route('psy.index') }}">Psy</a></li>
                    <li><a href="{{ route('wystawy.index') }}">Wystawy</a></li>
                    <li><a href="{{ route('kategorie.index') }}">Kategorie</a></li>
                    <li><a href="{{ route('oceny.index') }}">Oceny</a></li>
                    <li><a href="{{ route('bilety.index') }}">Bilety</a></li>
                    <li><a href="{{ route('zamowienia.index') }}">Zamówienia</a></li>
                    <li><a href="{{ route('pracownicy.index') }}">Pracownicy</a></li>
                    <li><a href="{{ route('logi.index') }}">Logi</a></li>
                    <li><a href="{{ route('metody-platnosci.index') }}">Metody Płatności</a></li>
                    <li><a href="{{ route('sponsorzy.index') }}">Sponsorzy</a></li>
                </ul>
            @elseif(session('user')->rola == 'klient')
                <h3>Panel Użytkownika</h3>
                <ul>
                    <li><a href="{{ route('psy.index') }}">Moje Psy</a></li>
                    <li><a href="{{ route('wystawy.index') }}">Wystawy</a></li>
                    <li><a href="{{ route('bilety.index') }}">Moje Bilety</a></li>
                    <li><a href="{{ route('zamowienia.index') }}">Moje Zamówienia</a></li>
                </ul>
            @elseif(in_array(session('user')->rola, ['sedzia', 'pracownik']))
                <h3>Panel Pracownika</h3>
                <ul>
                    <li><a href="{{ route('psy.index') }}">Psy</a></li>
                    <li><a href="{{ route('wystawy.index') }}">Wystawy</a></li>
                </ul>
            @endif
        @else
            <h1>Gość</h1>
        @endif
    </nav>
    
    @if(session('user'))
        <div style="text-align: right; color: white;">
            <span>Witaj, {{ session('user')->nazwa_uzytkownika }}!</span>
            <a style="color: white;" href="{{ route('logout') }}">Wyloguj</a>
        </div>
    @else
        <div>
            <a href="{{ route('login.form') }}">Zaloguj</a> |
            <a href="{{ route('register.form') }}">Zarejestruj</a>
        </div>
    @endif
</header>