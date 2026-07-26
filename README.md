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


Сайт: http://tanki-online-news.local
Админка: http://tanki-online-news.local/wp-admin

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
│   └── taxonomies.php   # таксономия типов (Новость / Видео)
└── docs/
```

## Документация

- Эпик окружения: [`docs/Theme_environment_and_frame/`](docs/Theme_environment_and_frame/)
- CPT и таксономии: [`docs/Custom_post_type_and_taxonomies/`](docs/Custom_post_type_and_taxonomies/)

## Статус

- [x] Каркас темы, стили, README
- [x] Кастомный тип записи «Новости» (`tanki_news`, архив `/news/`)
- [x] Таксономия типов (Новость / Видео)
- [ ] 16 постов, лента, поиск, шапка, футер