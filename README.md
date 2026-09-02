# СТЭЛ-Инвест (stelinvest.ru)

Сайт застройщика **ООО Специализированный застройщик «Стэл-инвест»** (Воронеж). Продажа квартир в новостройках: каталог объектов и квартир, ход строительства, ипотека, новости, вакансии, заявки в CRM.

- Продакшен: [https://stelinvest.ru](https://stelinvest.ru)
- Репозиторий: [https://github.com/bziksv/stelinvest](https://github.com/bziksv/stelinvest)
- Document root на сервере: `/home/s/stelinvst/stelinvest.ru/public_html`
- Корень репозитория = document root (`public_html` на сервере)

Ядро — **1С-Битрикс: Управление сайтом**, редакция Standard. Шаблон и кастомные компоненты сделаны студией [ТВИМ](https://creatwim.ru) в 2018, дальше сайт дорабатывался (MacroCRM, Roistat, Calltouch, юридические документы).

---

## Стек

| Слой | Что используется |
| --- | --- |
| CMS | 1С-Битрикс, ядро `25.1150.200` (обновление от 20.01.2026) |
| PHP | PHP 7.x (в `.htaccess` есть `mod_php7`, `auto_prepend_file` модуля security) |
| БД | MySQL / MariaDB через `mysqli`, база `stelinvst_base`, кодировка UTF-8 |
| Шаблон | `local/templates/stelApative` (в описании: «stelAdaptive», адаптив 2018) |
| Фронт | jQuery, Bootstrap 4, кастомный `App` в `js/init.js`, сборка `build/script.min.js` + `build/style.min.css` |
| Карты | Яндекс.Карты (`App.yaMapContacts`, координаты офиса `[51.712068, 39.178992]`) |
| Хостинг | типичный shared/VPS с документом в `/home/s/stelinvst/…` |

Сайт односайтовый: `SITE_ID = s1`, канонический хост `stelinvest.ru` (www редиректится на без-www, HTTP → HTTPS).

---

## Как устроен сайт

Это не интернет-магазин Битрикс. Каталог недвижимости сделан на **инфоблоках + комплексных компонентах `news`**, плюс кастомные компоненты неймспейса `twim`.

Два контура каталога квартир:

1. **Старый (Битрикс)** — инфоблок «Квартиры» (ID 7), раздел `/stroyawiesya_doma/`, умный фильтр, поэтажные планы, 3D, виртуальные туры.
2. **Новый (MacroCRM / Сбер CRM)** — виджет в футере (`mcrm-inline-form`, `data-type="catalog"`). Пункт меню «Квартиры» ведёт на хеш-роут MacroCRM:  
   `/#/macrocatalog/complexes/list?studio=null&category=flat&activity=sell`

Заявки с веб-форм уходят в MacroCRM API (`https://api.macro.sbercrm.com/estate/request/`).

---

## Карта разделов

| URL | Назначение | Источник данных |
| --- | --- | --- |
| `/` | Главная: объекты на главной, фильтр квартир, новости, SEO-текст | ИБ 6, 7, 1 + включаемые области |
| `/buildings/` | Объекты (ЖК / дома) | ИБ 6, компонент `bitrix:news` шаблон `buildings` |
| `/stroyawiesya_doma/` | Квартиры в строящихся домах | ИБ 7, компонент `twim:news` шаблон `apartments` |
| `/hod_strojki/` | Ход строительства (фотоальбомы) | ИБ 9 |
| `/news/` | Новости компании | ИБ 1 |
| `/poleznoe/` | Полезные статьи | ИБ 2 |
| `/information/` | Информационные страницы | ИБ 10 |
| `/about/` | О компании + подразделы | статичные страницы + меню `section` |
| `/contacts/` | Контакты + Яндекс.Карта | `tplvar` + schema.org |
| `/jobs/` | Вакансии | ИБ 3, `twim:vacancies` |
| `/ipoteka/` | Ипотека, банки-партнёры | статичная страница + HL-списки иконок |
| `/legal/` | PDF: cookies, согласие, ПДн, рекомендательные технологии | файлы в разделе |
| `/xml.php` | XML-выгрузка | ИБ 11, `twim:xml.out` |
| `/xml_domclick.php` | XML для ДомКлик | ИБ 11, шаблон `domClick` |
| `/camera.html` | Онлайн-камеры стройки (ipeye.ru) | статичный HTML |
| `/catalog/`, `/dev/`, `/test/` | заготовки / служебное | не продуктовые разделы |

### О компании (`/about/`)

- `/about/` — о компании
- `/about/our-advantages/` — преимущества
- `/about/history/` — история
- `/about/social-responsibility/` — соцответственность
- `/about/brick-construction/` — кирпичное домостроение
- `/about/otdelk/` — отделка
- `/about/awards/` — награды (ИБ 5)
- `/about/repair/` — ремонт (страница есть, в меню раздела не выведена)

### Объекты: разделы инфоблока 6

ЧПУ: `/buildings/#SECTION_CODE#/#ELEMENT_CODE#/`

- `under-construction` — строящиеся (на главной фильтр `PROPERTY_IN_MAIN = Y` + этот раздел)
- `built` — сданные
- `planned` — планируемые

---

## Инфоблоки

Константы в `local/php_interface/include/constant.php`:

- `IBLOCK_OBJECT_ID = 6`
- `IBLOCK_APARTAMENT_ID = 7`

Полный список из дампа БД:

| ID | Тип | Код | Название | Где используется |
| --- | --- | --- | --- | --- |
| 1 | articles | news | Новости | `/news/`, карусель на главной |
| 2 | articles | poleznoe | Полезное | `/poleznoe/` |
| 3 | jobs | — | Вакансии | `/jobs/` |
| 4 | media | photos | Фотогалерея | медиабиблиотека / старые галереи |
| 5 | media | — | Награды | `/about/awards/` |
| 6 | catalog | catalog | Объекты | `/buildings/`, главная |
| 7 | catalog | catalog_apartments | Квартиры | `/stroyawiesya_doma/`, умный фильтр |
| 8 | media | banners | Баннеры | `includes/banner.php` |
| 9 | catalog | stage_photos | Ход строительства | `/hod_strojki/` |
| 10 | articles | information | Информация | `/information/` |
| 11 | catalog | export_xml | Выгрузка XML | `/xml.php`, `/xml_domclick.php` |

Связь объект ↔ квартира: у квартиры свойство `OBJECT` (привязка к элементу ИБ 6). Очередь (`QUEUE`) проставляется обработчиком при сохранении элемента ИБ 7: берётся раздел 2-го уровня и пишется в свойство.

Ключевые свойства **объекта** (ИБ 6): адрес, срок сдачи, карта, ипотека / военная ипотека / маткапитал, фото, планировки, документы, очереди, иконки преимуществ, флаг «на главную» (`IN_MAIN`), признак старого дома (`OLD_BUILD`).

Ключевые свойства **квартиры** (ИБ 7): комнаты, площадь, этаж, продано, скрыть ссылку, планы (2D/3D/вид сверху), 360, виртуальный тур, привязка к объекту и очереди, координаты image-map.

---

## Кастомный код (`local/`)

Всё проектное живёт здесь. Ядро Битрикс (`bitrix/`) трогать не нужно.

```
local/
├── php_interface/
│   ├── init.php                          # редирект URL в нижний регистр, автозагрузка
│   └── include/
│       ├── constant.php                  # ID инфоблоков + токен MacroCRM
│       ├── event_handlers.php            # события ИБ и веб-форм
│       └── StelApp.php                   # \Twim\Helper\StelApp, GarbageStorage
├── components/twim/                      # свои компоненты
│   ├── news / news.detail
│   ├── catalog.smart.filter
│   ├── catalog.section.list
│   ├── vacancies
│   ├── xml.out
│   └── highloadblock.list
└── templates/stelApative/                # единственный рабочий шаблон сайта
```

### `init.php`

- 301, если в URL есть заглавные буквы → тот же путь в lowercase
- подключает константы и обработчики
- автозагрузка `\Twim\Helper\StelApp`
- хелперы `getPageClass()`, `getPageFix()` для класса `<body>` и сетки
- полифилл `each()` (удалённый в PHP 8)

### События (`event_handlers.php`)

- `OnAfterIBlockElementAdd/Update` — синхронизация `QUEUE` у квартир
- `onBeforeResultAdd` — отправка формы ID 3 в MacroCRM
- `OnEndBufferContent` — минификация HTML для гостей (не в `/bitrix/` и не при `save_kernel=Y`); вырезание куска после `<!--RestartBuffer-->` для AJAX

### Компоненты `twim`

Форки штатных битриксовых компонентов под витрину квартир:

- `twim:news` + шаблон `apartments` — комплексный каталог квартир
- `twim:catalog.smart.filter` — фильтр, SEF `/stroyawiesya_doma/filter/#SMART_FILTER_PATH#/apply/`
- `twim:catalog.section.list` — список секций (дом → подъезд → этаж)
- `twim:vacancies` — вакансии
- `twim:xml.out` — фиды для площадок
- `twim:highloadblock.list` — банки и иконки (шаблоны `listBanks`, `listIcons`)

---

## Шаблон `stelApative`

Подключается как шаблон сайта. Имя в файловой системе с опечаткой (`stelApative`), в `description.php` — `stelAdaptive`.

Подключаемые ассеты в `header.php`:

- `/local/templates/stelApative/build/script.min.js`
- `/local/templates/stelApative/build/style.min.css`
- `/local/templates/stelApative/js/init.js?v=2`
- языковой JS `/js/lang/ru.js`

Телефоны и почта не захардкожены в шаблоне: берутся из модуля **asd.tplvars** через `tplvar('phonesale1')`, `tplvar('phonecompany')`, `tplvar('phonesupply')`, `tplvar('phoneproduce')`, `tplvar('emailcompany')`. Меняются в админке шаблонных переменных.

Включаемые области:

- `includes/banner.php` — баннер (ИБ 8)
- `includes/filter.php` — умный фильтр квартир
- `includes/footer_contacts_company.php` / `footer_contacts_sale.php`
- `index_advantagetext.php`, `index_seotext.php` — блоки на главной
- `sect_forms.php` в разделах — модалки форм (подключаются рекурсивно из футера)

Исходники фронта: `js/init.js` (объект `App`: меню, фильтр, карусели, модалки, карты, шаринг). Сборка лежит в `build/`, отдельного `package.json` в выгрузке нет.

---

## Меню

Файлы в корне сайта:

- `.top.menu.php` — шапка и мобильное: Главная, Объекты, Квартиры (MacroCRM), Новости, О нас, Контакты, Вакансии
- `.bottom.menu.php` — подвал: Новости, О нас, Объекты, Вакансии, Контакты, Полезное, Ипотека
- `.soc.menu.php` — [ВКонтакте](https://vk.com/club42594435)
- `about/.section.menu.php` — подразделы «О нас»

---

## Формы и лиды

Веб-формы Битрикс (`bitrix:form.result.new`, шаблон `form-popup`):

| ID | Назначение | Куда уходит |
| --- | --- | --- |
| 2 | Обратный звонок (`#modal-callback`) | сохраняется в Битрикс; хук MacroCRM для ID 2 пустой |
| 3 | Заявка по объекту (`#modal-order`) | Битрикс + POST в MacroCRM (`action=question`) |

Модалки подключаются через `AREA_FILE_SUFFIX = forms` (файлы `sect_forms.php` в `/buildings/`, `/stroyawiesya_doma/`, `/jobs/`).

Дополнительно внешние виджеты в футере: Envybox callback, Calltouch, виджет каталога MacroCRM.

---

## Интеграции

| Сервис | Зачем | Где |
| --- | --- | --- |
| MacroCRM (Сбер CRM) | каталог квартир + заявки | футер, меню «Квартиры», `event_handlers.php` |
| Roistat | коллтрекинг (Prime) | футер, классы `roistat-phone-*` на телефонах |
| Calltouch | коллтрекинг | футер |
| Envybox | виджет обратного звонка | футер |
| Яндекс.Метрика | счётчик `23072971` | футер |
| Яндекс.Карты | карта на контактах | `contacts/index.php` |
| Яндекс / Google / Mail.ru | верификация вебмастеров | `yandex_*.html`, `google*.html` в корне |
| ipeye.ru | камеры стройки | `/camera.html` |
| Sotbit SEO Meta | посадочные SEO-страницы фильтра | модуль `sotbit.seometa` |
| Open Graph | OG-теги | модуль `dev2fun.opengraph` |
| Cookies | баннер cookies | модуль `niges.cookiesaccept` |
| ДомКлик и др. | XML-фиды | `/xml.php`, `/xml_domclick.php` |
| Prime | SEO-продвижение | ссылка/лого в футере |

Токен MacroCRM лежит в `local/php_interface/include/constant.php` (константа `macrocrmtoken`). В git его класть нельзя — вынести в `.settings.php` / env.

---

## Маршрутизация

`urlrewrite.php` + `mod_rewrite` в `.htaccess`.

ЧПУ разделов:

- `/buildings/` → `bitrix:news`
- `/stroyawiesya_doma/` → `twim:news`
- `/hod_strojki/`, `/information/`, `/poleznoe/`, `/news/` → `bitrix:news`
- `/rest/` → REST Битрикс
- старый алиас `/stroyawiesya-doma/` (дефис) тоже прописан

Правила в `.htaccess`:

- HTTPS, слеш на конце, схлопывание `//`
- `www.stelinvest.ru` → `stelinvest.ru`
- 301 для устаревших URL статей `/poleznoe/…`
- блок списка IP (`Require not ip`)
- `max_input_vars 50000`
- 404 → `/404.php`

Композитный / HTML-кеш: каталог `bitrix/html_pages/`. После правок шаблона или контента сбрасывать кеш Битрикс.

---

## Модули Marketplace (не ядро)

| Модуль | Роль |
| --- | --- |
| `asd.tplvars` | шаблонные переменные (телефоны, email) |
| `asd.iblock` | расширения инфоблоков (в т.ч. чекбоксы свойств) |
| `sotbit.seometa` | SEO-мета для фильтра / посадочных |
| `dev2fun.opengraph` | Open Graph |
| `niges.cookiesaccept` | согласие на cookies |
| `prime.cleaner` | очистка (Prime) |
| `thebrainstech.copyiblock` | копирование инфоблоков |
| `twim.recaptchafree` | reCAPTCHA на формах |

---

## Конфигурация и сервер

Файлы (секреты не коммитить):

- `bitrix/.settings.php` — UTF-8, cookies `http_only`, БД `localhost` / `stelinvst_base`, **debug = true**
- `bitrix/php_interface/dbconn.php` — классическое подключение
- `bitrix/license_key.php` — ключ лицензии
- `.htaccess` — редиректы и PHP-флаги, путь `auto_prepend_file` завязан на `/home/s/stelinvst/stelinvest.ru/public_html/...`

Админка: `https://stelinvest.ru/bitrix/`

Полезные места в админке:

- Контент → Инфоблоки — объекты, квартиры, новости
- Сервисы → Веб-формы — заявки 2 и 3
- Настройки → Настройки продукта → Сайты — шаблон `stelApative`
- Шаблонные переменные (`asd.tplvars`) — телефоны и почта
- Настройки → Инструменты → SEO / Sotbit SEO Meta

---

## Что править при разработке

| Задача | Куда идти |
| --- | --- |
| Вёрстка, шапка, подвал, виджеты | `local/templates/stelApative/header.php`, `footer.php` |
| Поведение JS | `local/templates/stelApative/js/init.js` |
| Карточка ЖК | `…/components/bitrix/news/buildings/` |
| Карточка / список квартир | `…/components/twim/news/apartments/` |
| Фильтр квартир | `local/components/twim/catalog.smart.filter` + шаблон `main_filter` |
| Главная | корневой `index.php` + `includes/` |
| CRM-заявки | `local/php_interface/include/event_handlers.php` |
| Телефоны в шапке | админка `tplvar`, не PHP |
| Редиректы статей | `.htaccess` |

После выкладки: сбросить кеш (`/bitrix/admin/cache.php`), при необходимости удалить `bitrix/html_pages/` и `bitrix/managed_cache/`.

---

## Локальная разработка

Стек как у соседних проектов: Homebrew nginx + php-fpm 8.3 + MySQL. Порты **8104 / 9104** — следующие свободные после 8080–8103.

| Параметр | Значение |
| --- | --- |
| URL | **http://127.0.0.1:8104/** |
| Админка | http://127.0.0.1:8104/bitrix/ |
| Nginx | `:8104` → `.local/nginx/nginx.conf` |
| PHP-FPM | `:9104`, PHP 8.3, ondemand, 512M |
| БД | `stelinvest_local` / `stelinvest_local` @ `127.0.0.1` |
| Дамп | `../stelinvst_base.sql.gz` (рядом с сайтом, не в git) |
| Учётка БД | `.local/db.env` (gitignored) |

```bash
cp .local/db.env.example .local/db.env
./scripts/setup-local-db.sh       # один раз: создать БД и импорт дампа
./scripts/start-dev.sh            # nginx :8104 + php-fpm :9104
./scripts/stop-dev.sh
```

Переимпорт дампа: `./scripts/setup-local-db.sh --force`

`apply-local-db-config.sh` пишет `dbconn.local.php`, правит `.settings.php` и ставит `SERVER_NAME` сайта на `127.0.0.1:8104`. Боевые `dbconn.php` / `.settings.php` копируются в `.local/backup/`.

### Порты соседних проектов

| Проект | HTTP |
| --- | --- |
| … | 8080–8103 |
| **stelinvest.ru** | **8104** |

### Что лежит рядом с репо, но не в git

- `stelinvest.ru-public_html.tar.gz` — архив выгрузки
- `stelinvst_base.sql.gz` — дамп БД

Не коммитить: кеш Битрикс, `upload/`, `.settings.php`, `dbconn.php`, `dbconn.local.php`, `license_key.php`, `constant.php`, `.local/db.env`, `.local/run/`, `.local/backup/`, архивы и дампы.

---

## Замечания по состоянию кода

- В `.settings.php` на проде включён `exception_handling.debug = true` — для продакшена лучше выключить.
- Токен MacroCRM и пароль БД лежат в файлах сайта в открытом виде.
- Меню «Квартиры» уже смотрит в MacroCRM, старый каталог `/stroyawiesya_doma/` жив. Два контура нужно явно решать: что source of truth.
- В PHP есть полифилл `each()` — признак, что код ещё не готов к PHP 8 без ревизии.
- Имя шаблона `stelApative` историческое, переименовывать опасно (пути и настройки сайта).
- Sitemap в корне датирован 2018–2019, актуальный лучше генерировать из админки SEO.
