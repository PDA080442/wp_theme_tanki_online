<?php
/**
 * Demo news content (18 posts with images from assets/demo/news).
 *
 * @package Tanki_Online_News
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Demo news definitions matching the public reference feed.
 *
 * @return array<int, array{slug:string,title:string,date:string,type:string,image:string,excerpt:string}>
 */
function tanki_get_demo_news_items() {
	return array(
		array(
			'slug'    => '01-retrofuture',
			'title'   => 'Новый скин «RetroFuture» для Рельсы',
			'date'    => '2026-07-23 12:00:00',
			'type'    => 'novost',
			'image'   => '01-retrofuture.jpg',
			'excerpt' => 'В игре появился новый скин RetroFuture для Рельсы.',
		),
		array(
			'slug'    => '02-cybertank',
			'title'   => 'Мини-игра «Кибертанк 2026»',
			'date'    => '2026-07-20 12:00:00',
			'type'    => 'novost',
			'image'   => '02-cybertank.jpg',
			'excerpt' => 'Запускайте мини-игру «Кибертанк 2026» и собирайте награды.',
		),
		array(
			'slug'    => '03-summer-sport',
			'title'   => 'Summer Sport Games 2026',
			'date'    => '2026-07-16 12:00:00',
			'type'    => 'novost',
			'image'   => '03-summer-sport.jpg',
			'excerpt' => 'Летние спортивные игры возвращаются в Танки Онлайн.',
		),
		array(
			'slug'    => '04-videoblog-551',
			'title'   => 'Видеоблог №551',
			'date'    => '2026-07-15 16:00:00',
			'type'    => 'video',
			'image'   => '04-videoblog-551.jpg',
			'excerpt' => 'Новый выпуск видеоблога с новостями и обновлениями.',
		),
		array(
			'slug'    => '05-challenge-back',
			'title'   => 'Событие «Вызов принят» снова доступно',
			'date'    => '2026-07-13 12:00:00',
			'type'    => 'novost',
			'image'   => '05-challenge-back.jpg',
			'excerpt' => 'Событие «Вызов принят» снова открыто для всех игроков.',
		),
		array(
			'slug'    => '06-referral',
			'title'   => 'Реферальное событие',
			'date'    => '2026-07-09 12:00:00',
			'type'    => 'novost',
			'image'   => '06-referral.jpg',
			'excerpt' => 'Приглашайте друзей и получайте награды за рефералы.',
		),
		array(
			'slug'    => '07-ad-rewards',
			'title'   => 'Награды за просмотр рекламы',
			'date'    => '2026-07-08 12:00:00',
			'type'    => 'novost',
			'image'   => '07-ad-rewards.jpg',
			'excerpt' => 'Смотрите рекламу и получайте дополнительные награды.',
		),
		array(
			'slug'    => '08-winter-major',
			'title'   => 'Winter Major Rankings I 2026',
			'date'    => '2026-07-07 12:00:00',
			'type'    => 'novost',
			'image'   => '08-winter-major.jpg',
			'excerpt' => 'Итоги и рейтинги Winter Major Rankings I 2026.',
		),
		array(
			'slug'    => '09-office-2026',
			'title'   => 'Офис 2026',
			'date'    => '2026-07-02 12:00:00',
			'type'    => 'novost',
			'image'   => '09-office-2026.jpg',
			'excerpt' => 'Обновления офиса и новые возможности для кланов.',
		),
		array(
			'slug'    => '10-tech-issues',
			'title'   => 'Технические неполадки',
			'date'    => '2026-07-01 12:00:00',
			'type'    => 'novost',
			'image'   => '10-tech-issues.jpg',
			'excerpt' => 'Информация о технических работах и восстановлении сервисов.',
		),
		array(
			'slug'    => '11-tankofund',
			'title'   => 'Танкофонд. Розыгрыш',
			'date'    => '2026-06-29 12:00:00',
			'type'    => 'novost',
			'image'   => '11-tankofund.jpg',
			'excerpt' => 'Участвуйте в розыгрыше Танкофонда и выигрывайте призы.',
		),
		array(
			'slug'    => '12-videoblog-550',
			'title'   => 'Видеоблог №550',
			'date'    => '2026-06-25 18:00:00',
			'type'    => 'video',
			'image'   => '12-videoblog-550.jpg',
			'excerpt' => 'Юбилейный выпуск видеоблога №550.',
		),
		array(
			'slug'    => '13-ufo-day',
			'title'   => 'День НЛО',
			'date'    => '2026-06-25 12:00:00',
			'type'    => 'novost',
			'image'   => '13-ufo-day.jpg',
			'excerpt' => 'Тематическое событие «День НЛО» уже в игре.',
		),
		array(
			'slug'    => '14-challenge-cancel',
			'title'   => 'Отмена события «Вызов принят»',
			'date'    => '2026-06-16 12:00:00',
			'type'    => 'novost',
			'image'   => '14-challenge-cancel.jpg',
			'excerpt' => 'Событие «Вызов принят» временно отменено.',
		),
		array(
			'slug'    => '15-calendar',
			'title'   => 'Подписка на календарь событий',
			'date'    => '2026-06-05 12:00:00',
			'type'    => 'novost',
			'image'   => '15-calendar.jpg',
			'excerpt' => 'Подпишитесь на календарь событий и не пропускайте обновления.',
		),
		array(
			'slug'    => '16-videoblog-549',
			'title'   => 'Видеоблог №549',
			'date'    => '2026-06-04 16:00:00',
			'type'    => 'video',
			'image'   => '16-videoblog-549.jpg',
			'excerpt' => 'Свежий выпуск видеоблога с обзором событий.',
		),
		array(
			'slug'    => '17-gold-rush',
			'title'   => 'Золотая лихорадка 2026',
			'date'    => '2026-06-03 12:00:00',
			'type'    => 'novost',
			'image'   => '17-gold-rush.jpg',
			'excerpt' => 'Событие «Золотая лихорадка» — добывайте золото и обменивайте на награды.',
		),
		array(
			'slug'    => '18-skin-week',
			'title'   => 'Неделя скинов: коллекция «Neon Drive»',
			'date'    => '2026-06-02 12:00:00',
			'type'    => 'novost',
			'image'   => '18-skin-week.jpg',
			'excerpt' => 'Специальная неделя скинов с тематической коллекцией Neon Drive.',
		),
	);
}

/**
 * Rich body copy for demo posts (reference layout: callout, feature, closing, forum CTA).
 *
 * @return array<string, array<string, mixed>>
 */
function tanki_get_demo_news_content_data() {
	return array(
		'01-retrofuture'    => array(
			'badge'         => 'Важно',
			'callout_title' => 'Пополните коллекцию уникальных скинов из линейки «RetroFuture»!',
			'callout_lead'  => 'Уже завтра стартует <strong>мини-игра «КиберТанк 2026», </strong>а это значит, что мы с вами не только погрузимся в футуристический мир технологий и научных достижений, но и начнём охоту за новым редким скином!',
			'body'          => 'Самые активные игроки, которые смогут добраться до конца маршрута в мини-игре, получат уникальный суперприз — скин «RetroFuture» для Рельсы!',
			'feature_title' => 'RetroFuture для Рельсы',
			'feature_body'  => array(
				'Этот скин — продолжение полюбившейся многим линейки скинов «RetroFuture», которые привлекают к себе взгляды всех танкистов!',
				'Существует легенда, что эти скины привёз на планету один из танкистов, чей космический корабль потерпел крушение. Ему удалось спастись, добравшись по обломкам корабля до спасательной капсулы. Во время полёта он хватал все артефакты, попадавшиеся на его пути, среди которых оказались эти скины. Они получили название «RetroFuture». Глаз не оторвать, правда?',
			),
			'closing'       => 'Мини-игра продлится 27 дней: <strong>с 05:00 МСК 24 июля до 05:00 МСК 20 августа, </strong>не пропустите свой шанс стать обладателем нового скина!',
			'forum_url'     => 'https://ru.tankiforum.com/topic/324112/',
		),
		'02-cybertank'      => array(
			'callout_title' => 'Запускайте мини-игру «Кибертанк 2026» и собирайте награды!',
			'callout_lead'  => 'Новый сезон аркадного испытания уже доступен в клиенте и браузерной версии.',
			'body'          => 'Проходите уровни, зарабатывайте очки и открывайте уникальные призы. Чем выше ваш результат — тем ценнее награда в финале события.',
			'feature_title' => 'Кибертанк 2026',
			'feature_body'  => array(
				'Мини-игра построена вокруг неонового города будущего: препятствия, ускорители и секретные маршруты ждут на каждом этапе.',
				'Собирайте бонусы, улучшайте показатели и соревнуйтесь с друзьями за место в таблице лидеров.',
			),
			'closing'       => 'Событие активно до <strong>05:00 МСК 20 августа</strong>. Награды начнут выдаваться после подведения итогов.',
			'long_form'     => true,
		),
		'03-summer-sport'   => array(
			'callout_title' => 'Летние спортивные игры возвращаются в Танки Онлайн!',
			'callout_lead'  => 'Summer Sport Games 2026 — сезон соревнований, медалей и тематических наград.',
			'body'          => 'Участвуйте в спортивных режимах, выполняйте задания и получайте уникальные элементы коллекции.',
			'feature_title' => 'Summer Sport Games 2026',
			'feature_body'  => array(
				'На аренах появились спортивные декорации, а за победы в специальных режимах начисляются медали и очки прогресса.',
				'Соберите полный комплект наград и покажите, что ваш экипаж — лучший в летнем сезоне.',
			),
			'closing'       => 'Игры продлятся до <strong>05:00 МСК 31 августа</strong>. Следите за расписанием этапов в клиенте.',
		),
		'04-videoblog-551'  => array(
			'callout_title' => 'Смотрите видеоблог №551!',
			'callout_lead'  => 'Свежий выпуск с обзором событий, обновлений и летних активностей.',
			'body'          => 'В этом выпуске — Summer Sport Games, новые скины, изменения баланса и ответы на вопросы сообщества.',
			'feature_title' => 'Видеоблог №551',
			'feature_body'  => array(
				'Рубрика «Рекламные рубрикаторы» и блок с главными новостами недели — всё, что нужно, чтобы быть в курсе.',
				'Не пропустите финальный анонс наград и советы по прохождению мини-игры «Кибертанк 2026».',
			),
			'closing'       => 'Новые выпуски выходят регулярно — подписывайтесь на канал и делитесь с друзьями.',
		),
		'05-challenge-back' => array(
			'callout_title' => 'Событие «Вызов принят» снова доступно!',
			'callout_lead'  => 'Выполняйте цепочку заданий и получайте редкие награды.',
			'body'          => 'Событие возвращается по многочисленным просьбам игроков — успейте пройти все этапы.',
			'feature_title' => 'Вызов принят',
			'feature_body'  => array(
				'Каждый этап открывает новые задачи: победы в боях, использование определённых корпусов и выполнение командных целей.',
				'Завершите цепочку полностью, чтобы забрать финальный приз и уникальную ачивку.',
			),
			'closing'       => 'Событие доступно ограниченное время — начните прохождение как можно раньше.',
		),
		'06-referral'       => array(
			'callout_title' => 'Приглашайте друзей и получайте награды!',
			'callout_lead'  => 'Реферальное событие — бонусы за каждого нового игрока в вашей команде.',
			'body'          => 'Отправьте приглашение, помогите другу пройти обучение и заберите награды за активность.',
			'feature_title' => 'Реферальное событие',
			'feature_body'  => array(
				'За каждого приглашённого друга, достигшего нужного ранга, вы получаете кристаллы и уникальные предметы.',
				'Чем больше друзей присоединится — тем больше призов откроется в вашем профиле.',
			),
			'closing'       => 'Акция действует до конца месяца. Подробные правила — в разделе событий клиента.',
		),
		'07-ad-rewards'     => array(
			'callout_title' => 'Награды за просмотр рекламы!',
			'callout_lead'  => 'Смотрите ролики и получайте дополнительные бонусы каждый день.',
			'body'          => 'Новая программа поощрений доступна в главном меню — заходите и забирайте ежедневные награды.',
			'feature_title' => 'Бонусы за рекламу',
			'feature_body'  => array(
				'После просмотра короткого ролика вы получаете кристаллы, ускорители или другие полезные предметы.',
				'Лимит обновляется ежедневно — не забывайте заходить и пополнять запасы.',
			),
			'closing'       => 'Количество доступных просмотров ограничено — используйте их до <strong>05:00 МСК</strong> следующего дня.',
		),
		'08-winter-major'   => array(
			'callout_title' => 'Итоги Winter Major Rankings I 2026!',
			'callout_lead'  => 'Подведены результаты зимнего рейтингового сезона.',
			'body'          => 'Лучшие игроки и команды получают награды за места в таблице — поздравляем победителей!',
			'feature_title' => 'Winter Major Rankings I 2026',
			'feature_body'  => array(
				'Рейтинг учитывал результаты турнирных боёв, серии побед и командную статистику за весь сезон.',
				'Топ-100 игроков получают эксклюзивные элементы коллекции и особые титулы.',
			),
			'closing'       => 'Следующий рейтинговый сезон стартует уже этой осенью — готовьтесь заранее.',
		),
		'09-office-2026'    => array(
			'callout_title' => 'Обновления офиса 2026!',
			'callout_lead'  => 'Новые возможности для кланов и улучшенный интерфейс управления.',
			'body'          => 'Офис получил свежий дизайн, дополнительные вкладки и инструменты для лидеров кланов.',
			'feature_title' => 'Офис 2026',
			'feature_body'  => array(
				'Управляйте составом, назначайте роли и отслеживайте активность участников в одном месте.',
				'Новые виджеты показывают прогресс клановых целей и ближайшие события.',
			),
			'closing'       => 'Обновление уже доступно — зайдите в офис и изучите новые функции.',
		),
		'10-tech-issues'    => array(
			'callout_title' => 'Информация о технических работах',
			'callout_lead'  => 'Краткие перебои в работе сервисов устранены.',
			'body'          => 'Команда оперативно восстановила доступ к игре и связанным сервисам. Приносим извинения за неудобства.',
			'feature_title' => 'Технические неполадки',
			'feature_body'  => array(
				'Проблема была связана с повышенной нагрузкой на серверы авторизации. Дополнительные меры уже внедрены.',
				'Если вы по-прежнему испытываете трудности — обратитесь в службу поддержки.',
			),
			'closing'       => 'Мониторинг продолжается. Спасибо за терпение и понимание.',
		),
		'11-tankofund'      => array(
			'callout_title' => 'Танкофонд: розыгрыш призов!',
			'callout_lead'  => 'Участвуйте в розыгрыше и выигрывайте ценные награды.',
			'body'          => 'Каждый внесённый вклад увеличивает шанс на приз — следите за итогами в официальных каналах.',
			'feature_title' => 'Танкофонд. Розыгрыш',
			'feature_body'  => array(
				'Главные призы — уникальные скины, кристаллы и редкие элементы коллекции.',
				'Победители будут объявлены после завершения розыгрыша — проверяйте списки в новостях.',
			),
			'closing'       => 'Приём заявок закрывается <strong>05:00 МСК 15 июля</strong>. Удачи всем участникам!',
		),
		'12-videoblog-550'  => array(
			'callout_title' => 'Юбилейный видеоблог №550!',
			'callout_lead'  => 'Праздничный выпуск с лучшими моментами и анонсами.',
			'body'          => '550 выпусков — это ваша поддержка и наша общая история. Спасибо, что с нами!',
			'feature_title' => 'Видеоблог №550',
			'feature_body'  => array(
				'В выпуске — хроника главных обновлений, интервью с командой и секретные анонсы.',
				'Не пропустите блок с ответами на популярные вопросы сообщества.',
			),
			'closing'       => 'Смотрите на официальном канале и делитесь впечатлениями в комментариях.',
		),
		'13-ufo-day'        => array(
			'callout_title' => 'Тематическое событие «День НЛО»!',
			'callout_lead'  => 'Необычные карты, награды и космическая атмосфера.',
			'body'          => 'Ищите секретные артефакты, выполняйте задания и собирайте коллекцию «День НЛО».',
			'feature_title' => 'День НЛО',
			'feature_body'  => array(
				'На картах появились инопланетные декорации, а в магазине — тематические предметы.',
				'Пройдите все этапы события, чтобы получить редкий скин и ачивку.',
			),
			'closing'       => 'Событие продлится до <strong>05:00 МСК 30 июня</strong>. Успейте забрать все награды!',
		),
		'14-challenge-cancel' => array(
			'callout_title' => 'Событие «Вызов принят» временно отменено',
			'callout_lead'  => 'Мы приостанавливаем событие для доработки баланса наград.',
			'body'          => 'Прогресс сохранён — как только событие вернётся, вы сможете продолжить с того же места.',
			'feature_title' => 'Отмена события',
			'feature_body'  => array(
				'Решение принято после анализа отзывов игроков и внутреннего тестирования.',
				'Следите за новостями — мы сообщим о новой дате запуска отдельным анонсом.',
			),
			'closing'       => 'Благодарим за понимание. Все полученные награды остаются в вашем инвентаре.',
		),
		'15-calendar'       => array(
			'callout_title' => 'Подписка на календарь событий!',
			'callout_lead'  => 'Не пропускайте старты событий, турниров и акций.',
			'body'          => 'Добавьте календарь Tanki Online в свой планировщик — все даты обновляются автоматически.',
			'feature_title' => 'Календарь событий',
			'feature_body'  => array(
				'В календаре — мини-игры, сезонные активности, технические работы и стримы.',
				'Подписка бесплатна и работает в Google Calendar, Apple Calendar и других сервисах.',
			),
			'closing'       => 'Кнопка подписки доступна в шапке сайта — нажмите «Подписка на календарь событий».',
		),
		'16-videoblog-549'  => array(
			'callout_title' => 'Свежий видеоблог №549!',
			'callout_lead'  => 'Обзор событий, обновлений и планов на лето.',
			'body'          => 'В выпуске — анонсы Summer Sport Games, изменения в балансе и ответы на вопросы игроков.',
			'feature_title' => 'Видеоблог №549',
			'feature_body'  => array(
				'Рубрики выпуска: новости недели, советы по прокачке и блок «Вопрос-ответ».',
				'Смотрите до конца — в финале скрыт тизер следующего крупного события.',
			),
			'closing'       => 'Новый выпуск уже на канале — включайте и делитесь с командой.',
		),
		'17-gold-rush'      => array(
			'callout_title' => 'Золотая лихорадка 2026 уже в игре!',
			'callout_lead'  => 'Добывайте золото в боях и обменивайте его на ценные награды.',
			'body'          => 'Событие возвращается с обновлённым списком призов и дополнительными заданиями для активных игроков.',
			'feature_title' => 'Золотая лихорадка',
			'feature_body'  => array(
				'За каждую победу и выполненное задание начисляются золотые слитки — копите их для обмена в магазине события.',
				'В финале недели откроется специальный лот с редким элементом коллекции.',
			),
			'closing'       => 'Событие активно до <strong>05:00 МСК 10 июня</strong>. Успейте забрать все награды!',
		),
		'18-skin-week'      => array(
			'callout_title' => 'Неделя скинов: коллекция «Neon Drive»!',
			'callout_lead'  => 'Светящиеся облики в неоновом стиле доступны ограниченное время.',
			'body'          => 'Каждый день недели открывается новый скин из линейки — следите за расписанием в клиенте.',
			'feature_title' => 'Neon Drive',
			'feature_body'  => array(
				'Коллекция вдохновлена ночными трассами и неоновыми огнями мегаполиса будущего.',
				'Соберите полный набор, чтобы получить бонусный камуфляж для всего экипажа.',
			),
			'closing'       => 'Неделя скинов продлится до <strong>05:00 МСК 9 июня</strong>. Не пропустите понравившиеся облики!',
		),
	);
}

/**
 * Extra rich HTML for long-form demo post verification (lists, quote, figure).
 *
 * @param string $image_url Image URL for inline figure.
 * @param string $image_alt Alt text.
 * @return string
 */
function tanki_build_demo_long_form_content( $image_url, $image_alt ) {
	$figure = '';

	if ( $image_url ) {
		$figure = sprintf(
			'<figure class="aligncenter"><img src="%1$s" alt="%2$s" loading="lazy" decoding="async"><figcaption>%2$s — неоновый маршрут мини-игры</figcaption></figure>',
			esc_url( $image_url ),
			esc_attr( $image_alt )
		);
	}

	$html  = '<h2>Как проходить мини-игру</h2>';
	$html .= '<p>Каждый день открываются новые участки маршрута. Собирайте энергию, избегайте ловушек и используйте ускорители, чтобы улучшить время прохождения.</p>';
	$html .= '<p>Основные этапы сезона:</p>';
	$html .= '<ul>';
	$html .= '<li>Разведка секторов и сбор бонусных ячеек</li>';
	$html .= '<li>Прохождение испытаний на скорость и точность</li>';
	$html .= '<li>Финальный рывок к таблице лидеров</li>';
	$html .= '</ul>';
	$html .= '<ol>';
	$html .= '<li>Зайдите в раздел событий в клиенте</li>';
	$html .= '<li>Выберите «Кибертанк 2026» и начните забег</li>';
	$html .= '<li>Заберите награды после завершения этапа</li>';
	$html .= '</ol>';
	$html .= '<blockquote><p><em>«Кибертанк»</em> — это не только скорость, но и тактика: иногда выгоднее объехать препятствие, чем пытаться прорваться через него.</p></blockquote>';
	$html .= $figure;
	$html .= '<p>Подробности и таблица лидеров обновляются в режиме реального времени — следите за анонсами в <strong>новостной ленте</strong>.</p>';

	return $html;
}

/**
 * Build post HTML matching the reference single-news layout.
 *
 * @param array  $item      Demo item from tanki_get_demo_news_items().
 * @param string $image_url Featured image URL for the feature block.
 * @return string
 */
function tanki_build_demo_news_content( $item, $image_url = '' ) {
	$data_map = tanki_get_demo_news_content_data();
	$slug     = isset( $item['slug'] ) ? $item['slug'] : '';
	$data     = isset( $data_map[ $slug ] ) ? $data_map[ $slug ] : array();

	$callout_title = isset( $data['callout_title'] ) ? $data['callout_title'] : $item['title'];
	$callout_lead  = isset( $data['callout_lead'] ) ? $data['callout_lead'] : $item['excerpt'];
	$body          = isset( $data['body'] ) ? $data['body'] : $item['excerpt'];
	$feature_title = isset( $data['feature_title'] ) ? $data['feature_title'] : $item['title'];
	$feature_body  = isset( $data['feature_body'] ) ? (array) $data['feature_body'] : array( $item['excerpt'] );
	$closing       = isset( $data['closing'] ) ? $data['closing'] : sprintf(
		/* translators: %s: post title */
		__( 'Следите за обновлениями — %s и другие события уже в игре.', 'tanki-online-news' ),
		esc_html( $item['title'] )
	);
	$forum_url     = isset( $data['forum_url'] ) ? $data['forum_url'] : '#';

	$image_alt = isset( $item['title'] ) ? $item['title'] : '';
	$image_html = '';

	if ( $image_url ) {
		$image_html = sprintf(
			'<div class="base-card-image"><img src="%1$s" alt="%2$s" loading="lazy" decoding="async"></div>',
			esc_url( $image_url ),
			esc_attr( $image_alt )
		);
	}

	$feature_paragraphs = '';
	foreach ( $feature_body as $paragraph ) {
		$feature_paragraphs .= sprintf( '<p>%s</p>', esc_html( $paragraph ) );
	}

	$html  = '<div class="summary">';
	$html .= sprintf( '<div class="summary-title">%s</div>', esc_html( $callout_title ) );
	$html .= sprintf( '<div class="summary-content">%s</div>', wp_kses_post( $callout_lead ) );
	$html .= '</div>';
	$html .= sprintf( '<p>%s</p>', esc_html( $body ) );
	$html .= '<div class="base-card">';
	$html .= $image_html;
	$html .= '<div class="base-card-content-wrapper">';
	$html .= sprintf( '<div class="base-card-title"><strong>%s</strong></div>', esc_html( $feature_title ) );
	$html .= sprintf( '<div class="base-card-content">%s</div>', $feature_paragraphs );
	$html .= '</div></div>';
	$html .= sprintf( '<p>%s</p>', wp_kses_post( $closing ) );

	if ( ! empty( $data['long_form'] ) ) {
		$html .= tanki_build_demo_long_form_content( $image_url, $image_alt );
	}

	$html .= sprintf(
		'<a class="forum-link" href="%1$s" target="_blank" rel="noopener noreferrer">%2$s</a>',
		esc_url( $forum_url ),
		esc_html__( 'Обсудить на форуме', 'tanki-online-news' )
	);

	return $html;
}

/**
 * Import a local demo image into the Media Library (or reuse existing).
 *
 * @param string $filename File name inside assets/demo/news/.
 * @param int    $post_id  Attachment parent post ID.
 * @return int Attachment ID or 0.
 */
function tanki_import_demo_news_image( $filename, $post_id = 0 ) {
	$filename = sanitize_file_name( $filename );
	$source   = TANKI_THEME_DIR . '/assets/demo/news/' . $filename;

	if ( ! file_exists( $source ) ) {
		return 0;
	}

	$existing = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'meta_key'       => '_tanki_demo_image',
			'meta_value'     => $filename,
		)
	);

	if ( ! empty( $existing ) ) {
		$attachment_id = (int) $existing[0];
		if ( $post_id ) {
			wp_update_post(
				array(
					'ID'          => $attachment_id,
					'post_parent' => $post_id,
				)
			);
		}
		return $attachment_id;
	}

	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';

	$upload_dir = wp_upload_dir();
	if ( ! empty( $upload_dir['error'] ) ) {
		return 0;
	}

	$dest = trailingslashit( $upload_dir['path'] ) . $filename;
	if ( ! copy( $source, $dest ) ) {
		return 0;
	}

	$filetype   = wp_check_filetype( $filename, null );
	$attachment = array(
		'post_mime_type' => $filetype['type'],
		'post_title'     => preg_replace( '/\.[^.]+$/', '', $filename ),
		'post_content'   => '',
		'post_status'    => 'inherit',
		'post_parent'    => $post_id,
	);

	$attachment_id = wp_insert_attachment( $attachment, $dest, $post_id );
	if ( is_wp_error( $attachment_id ) || ! $attachment_id ) {
		return 0;
	}

	$metadata = wp_generate_attachment_metadata( $attachment_id, $dest );
	wp_update_attachment_metadata( $attachment_id, $metadata );
	update_post_meta( $attachment_id, '_tanki_demo_image', $filename );

	return (int) $attachment_id;
}

/**
 * Create or refresh 18 demo tanki_news posts with featured images.
 *
 * @param bool $replace_all Delete existing tanki_news before seeding.
 * @return array{created:int,updated:int,skipped:int}
 */
function tanki_seed_demo_news( $replace_all = false ) {
	$stats = array(
		'created' => 0,
		'updated' => 0,
		'skipped' => 0,
	);

	if ( $replace_all ) {
		$old = get_posts(
			array(
				'post_type'      => 'tanki_news',
				'post_status'    => 'any',
				'posts_per_page' => -1,
				'fields'         => 'ids',
			)
		);
		foreach ( $old as $old_id ) {
			wp_delete_post( (int) $old_id, true );
		}
	}

	if ( function_exists( 'tanki_ensure_news_type_terms' ) ) {
		tanki_ensure_news_type_terms();
	}

	foreach ( tanki_get_demo_news_items() as $item ) {
		$existing = get_posts(
			array(
				'post_type'      => 'tanki_news',
				'post_status'    => 'any',
				'posts_per_page' => 1,
				'fields'         => 'ids',
				'meta_key'       => '_tanki_demo_slug',
				'meta_value'     => $item['slug'],
			)
		);

		$content = sprintf(
			"<!-- wp:paragraph -->\n<p>%s</p>\n<!-- /wp:paragraph -->",
			esc_html( $item['excerpt'] )
		);

		$postarr = array(
			'post_type'    => 'tanki_news',
			'post_status'  => 'publish',
			'post_title'   => $item['title'],
			'post_excerpt' => $item['excerpt'],
			'post_content' => $content,
			'post_date'    => $item['date'],
			'post_date_gmt'=> get_gmt_from_date( $item['date'] ),
		);

		if ( ! empty( $existing ) ) {
			$post_id = (int) $existing[0];
			$postarr['ID'] = $post_id;
			wp_update_post( $postarr );
			++$stats['updated'];
		} else {
			$post_id = wp_insert_post( $postarr, true );
			if ( is_wp_error( $post_id ) ) {
				++$stats['skipped'];
				continue;
			}
			++$stats['created'];
		}

		update_post_meta( $post_id, '_tanki_demo_slug', $item['slug'] );
		wp_set_object_terms( $post_id, $item['type'], 'news_type' );

		$thumb_id = tanki_import_demo_news_image( $item['image'], $post_id );
		if ( $thumb_id ) {
			set_post_thumbnail( $post_id, $thumb_id );
		}

		$image_url = $thumb_id ? (string) wp_get_attachment_image_url( $thumb_id, 'large' ) : '';
		wp_update_post(
			array(
				'ID'           => $post_id,
				'post_content' => tanki_build_demo_news_content( $item, $image_url ),
			)
		);

		$content_data = tanki_get_demo_news_content_data();
		$slug         = isset( $item['slug'] ) ? $item['slug'] : '';
		if ( isset( $content_data[ $slug ]['badge'] ) && is_string( $content_data[ $slug ]['badge'] ) ) {
			update_post_meta( $post_id, '_tanki_news_badge', $content_data[ $slug ]['badge'] );
		} else {
			delete_post_meta( $post_id, '_tanki_news_badge' );
		}
	}

	return $stats;
}

/**
 * Admin Tools page: seed demo news.
 */
function tanki_register_demo_news_tools_page() {
	add_management_page(
		__( 'Демо-новости', 'tanki-online-news' ),
		__( 'Демо-новости', 'tanki-online-news' ),
		'manage_options',
		'tanki-demo-news',
		'tanki_render_demo_news_tools_page'
	);
}
add_action( 'admin_menu', 'tanki_register_demo_news_tools_page' );

/**
 * Render Tools → Демо-новости.
 */
function tanki_render_demo_news_tools_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$message = '';
	if ( isset( $_POST['tanki_seed_demo_news'] ) ) {
		check_admin_referer( 'tanki_seed_demo_news' );
		$replace = ! empty( $_POST['tanki_replace_all'] );
		$stats   = tanki_seed_demo_news( $replace );
		$message = sprintf(
			/* translators: 1: created count, 2: updated count, 3: skipped count */
			__( 'Готово: создано %1$d, обновлено %2$d, пропущено %3$d.', 'tanki-online-news' ),
			(int) $stats['created'],
			(int) $stats['updated'],
			(int) $stats['skipped']
		);
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Демо-новости', 'tanki-online-news' ); ?></h1>
		<p><?php esc_html_e( 'Загружает 18 новостей с обложками и контентом по структуре референса (callout, feature-блок, кнопка форума). Повторный запуск обновит существующие демо-посты по slug — дубликаты не создаются.', 'tanki-online-news' ); ?></p>
		<p><strong><?php esc_html_e( 'Внимание:', 'tanki-online-news' ); ?></strong> <?php esc_html_e( 'опция «Удалить все текущие новости» удалит каждую запись tanki_news, в том числе созданную вручную, а не только демо.', 'tanki-online-news' ); ?></p>
		<?php if ( $message ) : ?>
			<div class="notice notice-success is-dismissible"><p><?php echo esc_html( $message ); ?></p></div>
		<?php endif; ?>
		<form method="post">
			<?php wp_nonce_field( 'tanki_seed_demo_news' ); ?>
			<p>
				<label>
					<input type="checkbox" name="tanki_replace_all" value="1" />
					<?php esc_html_e( 'Удалить все текущие новости перед загрузкой', 'tanki-online-news' ); ?>
				</label>
			</p>
			<?php submit_button( __( 'Загрузить 18 демо-новостей', 'tanki-online-news' ), 'primary', 'tanki_seed_demo_news' ); ?>
		</form>
	</div>
	<?php
}
