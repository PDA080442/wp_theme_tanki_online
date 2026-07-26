# Tanki Online News

Кастомная WordPress-тема новостного блога.

## О проекте

Небольшой новостной сайт в духе раздела новостей Tanki Online: лента постов, отдельные страницы записей, поиск, шапка и футер.

**Референс дизайна и контента:** [tankionline.com/ru/news](https://tankionline.com/ru/news/)

## Стек
- WordPress
- PHP
- HTML / CSS / JavaScript

## Требования

WordPress 6+
PHP 8.1+
LocalWP [Local](https://localwp.com/)

## Установка

1. Установить [Local](https://localwp.com/) и создать сайт (например `tanki-online-news`).
2. Скопировать папку темы в:

   ```
   wp-content/themes/tanki-online-news/
   ```

3. В админке: **Внешний вид → Темы → активировать «Tanki Online News»**.
4. **Настройки → Постоянные ссылки → «Название записи» → Сохранить**.

### Локальная разработка (симлинк)

Чтобы править код в репозитории без копирования:

```bash
ln -s "/path/to/wp_theme_tanki_online" \
  "$HOME/Local Sites/tanki-online-news/app/public/wp-content/themes/tanki-online-news"
```

Подставь свой путь к клону репозитория вместо `/path/to/wp_theme_tanki_online`.

## Локальные URL (пример Local)

| Страница | URL |
|----------|-----|
| Главная | http://tanki-online-news.local/ |
| Админка | http://tanki-online-news.local/wp-admin |
| Архив новостей | http://tanki-online-news.local/news/ |
| Одна новость | http://tanki-online-news.local/news/{slug}/ |
| Поиск | http://tanki-online-news.local/?s=запрос |

После установки темы обязательно: **Настройки → Постоянные ссылки → Сохранить** (чтобы `/news/` не отдавал 404).

Меню шапки: **Внешний вид → Меню** — назначь меню в области **«Главное меню (слева)»** и **«Внешние ссылки (справа)»**. Пока не назначено, показываются запасные пункты.

Футер: меню в области **«Меню футера»**; картинки маскота и логотипа партнёра — **Внешний вид → Настроить → Футер**.

## Структура темы

```
wp_theme_tanki_online/
├── style.css
├── functions.php
├── index.php
├── header.php
├── footer.php
├── screenshot.png
├── assets/
│   ├── css/
│   └── js/
├── template-parts/
├── inc/
│   ├── cpt.php          # кастомный тип записи «Новости» (tanki_news)
│   ├── taxonomies.php   # таксономия типов (Новость / Видео)
│   ├── query.php        # архив /news/ (12 постов) и лента на главной
│   └── customizer.php   # картинки футера (маскот, логотип партнёра)
└── docs/
```

## Документация

- Эпик окружения: [`docs/Theme_environment_and_frame/`](docs/Theme_environment_and_frame/)
- CPT и таксономии: [`docs/Custom_post_type_and_taxonomies/`](docs/Custom_post_type_and_taxonomies/)
- Шапка / футер / поиск: [`docs/Header_footer_search/`](docs/Header_footer_search/)
- Лента новостей: [`docs/News_feed_archive_home/`](docs/News_feed_archive_home/)

## Статус

- [x] Каркас темы, стили, README
- [x] Кастомный тип записи «Новости» (`tanki_news`, архив `/news/`)
- [x] Таксономия типов (Новость / Видео)
- [x] Архив и ЧПУ: 12 постов на странице, главная = `tanki_news`
- [x] CRUD / права CPT: чеклист в [`docs/.../Checking_CRUD_and_access_rights/`](docs/Custom_post_type_and_taxonomies/Checking_CRUD_and_access_rights/)
- [x] Шапка: топбар + поиск по центру (как на референсе)
- [x] Лента: сетка карточек 3 колонки (`home.php` / `archive-tanki_news.php`)
- [x] Футер: два ряда, меню из админки, картинки в Customizer
- [ ] Страница поиска, 16 постов, polish
