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

## Design tokens

Визуальная система темы задана CSS-переменными в [`assets/css/main.css`](assets/css/main.css) (`:root`). Референс: [tankionline.com/ru/news](https://tankionline.com/ru/news/).

### Цвета

| Токен | Значение | Использование |
|-------|----------|---------------|
| `--tanki-bg` | `#001926` | базовый фон страницы |
| `--tanki-surface` | `#012233` | панели, превью single, футер |
| `--tanki-card-bg` | `#0a2a38` | фон карточек, image-wrap |
| `--tanki-card-bg-alt` | `#0a3040` | градиент placeholder |
| `--tanki-text` | `#ffffff` | основной текст |
| `--tanki-muted` / `--tanki-meta` | `#9bb0ba` | дата, метки типов, вторичный текст |
| `--tanki-meta-feed` | `rgba(255,255,255,.5)` | мета в карточках ленты (как референс) |
| `--tanki-accent` / `--tanki-link` | `#76ff33` | акцент, ссылки, CTA |
| `--tanki-on-accent` | `#001926` | текст на зелёном фоне |
| `--tanki-border` | `rgba(255,255,255,.25)` | разделители |
| `--tanki-border-strong` | `rgba(255,255,255,.5)` | outline кнопок |
| `--tanki-border-subtle` | `rgba(255,255,255,.15)` | тонкие границы карточек |
| `--tanki-overlay` | `rgba(0,0,0,.95)` | модалка поиска |
| `--tanki-surface-elevated` | `#414965` | выпадающие меню |
| `--tanki-fill-light` | `#ffffff` | белая подложка pill-кнопок |
| `--tanki-feed-pad-x` | `6rem` | горизонтальные отступы ленты и search-row |

### Шрифт

- **Rubik** (Google Fonts), веса 400 / 500 / 700
- `--tanki-font-weight-normal`, `--medium`, `--bold`
- Fluid `html { font-size }` масштабирует rem под viewport (как на референсе)

### Типографическая шкала

| Токен | rem | Назначение |
|-------|-----|------------|
| `--tanki-text-xs` | 0.75 | мета, метки типов |
| `--tanki-text-sm` | 0.875 | кнопки, вторичный текст |
| `--tanki-text-base` | 1 | body |
| `--tanki-text-lg` | 1.125 | заголовки карточек, h3 |
| `--tanki-text-xl` | 1.5 | h2 в prose, mobile h1 |
| `--tanki-text-2xl` | 2.25 | h1 single |
| `--tanki-text-display` | clamp | заголовки разделов |

Line-height: `--tanki-leading-tight` (1.2), `--tanki-leading-normal` (1.5), `--tanki-leading-snug` (1.22), `--tanki-leading-prose` (1.625).

### Кнопки и ссылки

- **Ссылки:** `color: var(--tanki-link)`, hover — underline
- **Primary:** фон `--tanki-accent`, текст `--tanki-on-accent` (help CTA, menu toggle)
- **Outline:** прозрачный фон, текст `--tanki-accent`, border `--tanki-border-strong` (forum-link, «Загрузить ещё», nav CTA)

### Фон

`body` использует многослойный radial-gradient на токенах (`--tanki-accent-glow`, `--tanki-glow-cyan`) поверх `--tanki-bg` — не плоский одноцветный фон.

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
│   ├── js/
│   ├── img/
│   └── demo/news/       # 16 обложек демо-ленты
├── template-parts/
├── inc/
│   ├── cpt.php          # кастомный тип записи «Новости» (tanki_news)
│   ├── taxonomies.php   # таксономия типов (Новость / Видео)
│   ├── query.php        # архив /news/ и главная: 12 постов на страницу
│   ├── search.php       # AJAX-поиск по tanki_news
│   ├── admin-duplicate.php # «Дублировать» новость в админке
│   ├── demo-content.php # сидер 16 демо-новостей с обложками
│   ├── ajax-load-more.php # AJAX «Загрузить ещё» для ленты
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
- [x] Лента: `/` и `/news/`, сетка **3** колонки (desktop, как референс), **12** на страницу + «Загрузить ещё» (демо 16)
- [x] Шапка / футер / поиск
- [ ] Single, «Загрузить ещё», polish