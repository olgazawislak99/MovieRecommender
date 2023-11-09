Zadanie rekrutacyjne - Movie Recommender
=====

## Treść zadania

Napisz prostą aplikację w PHP do wyszukiwania rekomendacji filmów (wystarczy sama część backendowa).
Lista filmów w formie tablicy jest dostarczona w pliku movies.php, możesz ją skopiować lub bezpośrednio dodać do Twojej aplikacji.

Aplikacja zawiera 3 algorytmy rekomendacji:
1) Zwracane są 3 losowe tytuły.
2) Zwracane są wszystkie filmy na literę ‘W’ ale tylko jeśli mają parzystą liczbę znaków w tytule.
3) Zwracany są wszystkie tytuły, które składają się z więcej niż 1 słowa.

Napisz testy jednostkowe, które sprawdzą poprawność rozwiązania.

# Instalacja

```bash
composer install
```
# Uruchomienie
Utwórz plik .env i dodaj w nim linię
```bash
MOVIES_FILE_PATH=
```
Aplikację można uruchomić z poziomu lini komend wpisując:
```bash
php bin/console app:find-movie
```

# Testy
Testy można uruchomić z poziomu lini komend wpisując:
```bash
php php bin/phpunit
```

