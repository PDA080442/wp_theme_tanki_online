# Tanki Online News

Кастомная WordPress-тема новостного блога.

## О проекте

Небольшой новостной сайт в духе раздела новостей Tanki Online: лента постов, отдельные страницы записей, поиск, шапка и футер.

**Референс дизайна и контента:** [tankionline.com/ru/news](https://tankionline.com/ru/news/)

**Стек:** WordPress 6+, PHP 8.1+, HTML / CSS / JavaScript (vanilla, без jQuery).

Стили и CSS-переменные — в [`assets/css/main.css`](assets/css/main.css) и [`assets/css/single.css`](assets/css/single.css).

## Установка

1. Установить [Local](https://localwp.com/) и создать сайт (например `tanki-online-news`).
2. Скопировать папку темы в:

   ```
   wp-content/themes/tanki-online-news/
   ```

3. **Внешний вид → Темы → Tanki Online News → Активировать**.
4. **Настройки → Постоянные ссылки → «Название записи» → Сохранить** (обязательно для URL вида `/news/...`).

### Локальная разработка (симлинк)

Чтобы править код в репозитории без копирования:

```bash
ln -s "/path/to/wp_theme_tanki_online" \
  "$HOME/Local Sites/tanki-online-news/app/public/wp-content/themes/tanki-online-news"
```

Подставь свой путь к клону репозитория вместо `/path/to/wp_theme_tanki_online`.

## Быстрая проверка 

1. Установить Local, создать сайт.
2. Скопировать тему в `wp-content/themes/tanki-online-news/`.
3. Активировать тему **Tanki Online News**.
4. Сохранить постоянные ссылки (**«Название записи»**).
5. Загрузить демо-контент — способ A или B (см. раздел ниже).
6. Открыть `{домен}/` — на первой странице **12 карточек**, кнопка **«Загрузить ещё»** добавляет **6** (итого **18**).
7. Клик по любой карточке — single-страница открывается.
8. Кнопка **«Найти новость»** в шапке.

Пример `{домен}`: `http://tanki-online-news.local`.

## Демо-контент (18 новостей)

После активации темы и сохранения постоянных ссылок можно загрузить **18 демо-новостей** с обложками, типами (Новость / Видео) и HTML-контентом по структуре референса.

Обложки лежат в репозитории: [`assets/demo/news/`](assets/demo/news/) (18 JPG). Сидер копирует их в Media Library; повторный запуск переиспользует файлы по meta `_tanki_demo_image`.

**Зачем 18:** на ленте 12 постов на страницу + «Загрузить ещё» → ровно **6** карточек (2 ряда по 3), без «висящей» одиночной.

### Способ A — WP-CLI (рекомендуется)

```bash
wp tanki seed-demo-news
```

Из корня WordPress (подставь свой `--path`):

```bash
wp --path="/path/to/wordpress" tanki seed-demo-news
```

Опции:

- **`--replace-all`** — удалить **все** записи `tanki_news` (включая созданные вручную), затем загрузить 18 демо-постов.

### Способ B — админка

**Инструменты → Демо-новости → «Загрузить 18 демо-новостей»**

Чекбокс «Удалить все текущие новости» = `--replace-all` (осторожно: удаляются все новости CPT, не только демо).

### Способ C — импорт WXR

1. Установить плагин [WordPress Importer](https://wordpress.org/plugins/wordpress-importer/).
2. **Инструменты → Импорт → WordPress** → файл [`assets/demo/tanki-news-demo.xml`](assets/demo/tanki-news-demo.xml).
3. Отметить «Загрузить и импортировать вложения файлов».

Если обложки не подтянулись — используйте способ A (обложки берутся из `assets/demo/news/`).


## Админка WordPress


Кастомный тип «Новости» - Боковое меню → **Новости**
Список записей - **Новости → Все новости**
Добавить запись - **Новости → Добавить**
Таксономия типов - В редакторе новости — метабокс **Типы**; также **Новости → Типы**
Сидер демо - **Инструменты → Демо-новости**


## Структура темы

```
wp_theme_tanki_online/
├── style.css                 # метаданные темы
├── screenshot.png            # превью в списке тем
├── functions.php             # setup, меню, fallback-меню
├── index.php                 # запасной шаблон
├── header.php, footer.php    # шапка и футер
├── searchform.php            # форма модального поиска
├── home.php                  # главная = лента новостей
├── archive-tanki_news.php    # архив /news/
├── single-tanki_news.php     # одиночная новость
├── search.php                # fallback страницы поиска
├── assets/
│   ├── css/
│   │   ├── main.css          # лента, шапка, футер, поиск
│   │   └── single.css        # single, related, share
│   ├── js/
│   │   └── main.js           # бургер, поиск, load more, related
│   ├── img/                  # иконки, логотипы
│   └── demo/
│       ├── news/             # 18 обложек JPG
│       └── tanki-news-demo.xml  # WXR-экспорт (опциональный импорт)
├── template-parts/
│   ├── content-news-feed.php      # лента, load more, пагинация
│   ├── content-news-card.php      # карточка в сетке
│   ├── content-single-news.php    # тело single-страницы
│   ├── content-single-news-nav.php # prev/next на single
│   ├── content-related-news.php   # блок «Похожие новости»
│   ├── content-search-item.php    # строка в результатах поиска
│   └── search-overlay.php         # модалка поиска
└── inc/
    ├── cpt.php               # CPT «Новости» (tanki_news)
    ├── taxonomies.php        # таксономия news_type (Новость / Видео)
    ├── query.php             # главная, архив, фильтры: 12 постов на страницу
    ├── demo-content.php      # сидер 18 демо-новостей
    ├── wp-cli.php            # команда wp tanki seed-demo-news
    ├── search.php            # AJAX-поиск по tanki_news
    ├── ajax-load-more.php    # AJAX «Загрузить ещё»
    ├── admin-duplicate.php   # «Дублировать» новость в админке
    └── customizer.php        # картинки футера (маскот, логотип партнёра)
```

## Меню и кастомайзер

**Внешний вид → Меню** — назначь меню в областях:

- **Главное меню (слева)** — пункты шапки слева
- **Внешние ссылки (справа)** — Киберспорт, Вики, Форум
- **Меню футера** — ссылки в подвале

Пока меню не назначены, показываются запасные пункты.

**Внешний вид → Настроить → Футер**.

- **Заглушки меню:** если меню не назначены, пункты Скины, Медиа, Киберспорт, Вики, Форум и ссылки футера ведут на `#`.

## Сдача

**Репозиторий:** [github.com/PDA080442/wp_theme_tanki_online](https://github.com/PDA080442/wp_theme_tanki_online)

**Версия темы:** 1.0.0 (`style.css`, константа `TANKI_THEME_VERSION` в `functions.php`).

### Zip-архив темы


```bash
git archive --format=zip HEAD -o tanki-online-news.zip
```

Распаковать и положить папку как:

```
wp-content/themes/tanki-online-news/
```