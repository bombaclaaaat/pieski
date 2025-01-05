<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Aplikacja Wystawy Kotów'); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <!-- Wstaw w sekcji <head> -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1><a href="<?php echo e(route('home')); ?>" style="text-decoration: none; color: white;">Aplikacja Laravel</a></h1>
        <nav>
            <?php if(session('user')): ?>
                <?php if(session('user')->rola == 'administrator'): ?>
                    <h3>Panel Admina</h3>
                    <ul>
                        <li><a href="<?php echo e(route('uzytkownicy.index')); ?>">Użytkownicy</a></li>
                        <li><a href="<?php echo e(route('psy.index')); ?>">Psy</a></li>
                        <li><a href="<?php echo e(route('wystawy.index')); ?>">Wystawy</a></li>
                        <li><a href="<?php echo e(route('kategorie.index')); ?>">Kategorie</a></li>
                        <li><a href="<?php echo e(route('oceny.index')); ?>">Oceny</a></li>
                        <li><a href="<?php echo e(route('bilety.index')); ?>">Bilety</a></li>
                        <li><a href="<?php echo e(route('zamowienia.index')); ?>">Zamówienia</a></li>
                        <li><a href="<?php echo e(route('pracownicy.index')); ?>">Pracownicy</a></li>
                        <li><a href="<?php echo e(route('logi.index')); ?>">Logi</a></li>
                        <li><a href="<?php echo e(route('metody-platnosci.index')); ?>">Metody Płatności</a></li>
                        <li><a href="<?php echo e(route('sponsorzy.index')); ?>">Sponsorzy</a></li>
                    </ul>
                <?php elseif(session('user')->rola == 'klient'): ?>
                    <h3>Panel Użytkownika</h3>
                    <ul>
                        <li><a href="<?php echo e(route('psy.index')); ?>">Moje Psy</a></li>
                        <li><a href="<?php echo e(route('wystawy.index')); ?>">Wystawy</a></li>
                        <li><a href="<?php echo e(route('bilety.index')); ?>">Moje Bilety</a></li>
                        <li><a href="<?php echo e(route('zamowienia.index')); ?>">Moje Zamówienia</a></li>
                    </ul>
                <?php elseif(in_array(session('user')->rola, ['sedzia', 'pracownik'])): ?>
                    <h3>Panel Pracownika</h3>
                    <ul>
                        <li><a href="<?php echo e(route('psy.index')); ?>">Psy</a></li>
                        <li><a href="<?php echo e(route('wystawy.index')); ?>">Wystawy</a></li>
                    </ul>
                <?php endif; ?>
            <?php else: ?>
                <h1>Gość</h1>
            <?php endif; ?>
        </nav>
        
        <?php if(session('user')): ?>
            <div style="text-align: right; color: white;">
                <span>Witaj, <?php echo e(session('user')->nazwa_uzytkownika); ?>!</span>
                <a style="color: white;" href="<?php echo e(route('logout')); ?>">Wyloguj</a>
            </div>
        <?php else: ?>
            <div>
                <a href="<?php echo e(route('login.form')); ?>">Zaloguj</a> |
                <a href="<?php echo e(route('register.form')); ?>">Zarejestruj</a>
            </div>
        <?php endif; ?>
    </header>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer>
        <p>© 2025 Aplikacja Wystawy Kotów</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\PROJEKT\resources\views/layouts/app.blade.php ENDPATH**/ ?>