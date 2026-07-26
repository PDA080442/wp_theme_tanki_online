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
│   ├── search.php       # AJAX-поиск по tanki_news
│   └── customizer.php   # картинки футера (маскот, логотип партнёра)
└── docs/
```