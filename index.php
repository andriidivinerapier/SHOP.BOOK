<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пошук книг</title>
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(to right, #000000, #5900ff);
}

        .header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background: linear-gradient(to right, #000000, #5900ff);
            box-shadow: 0 2px 5px rgba(255, 0, 0, 0.1);
    
        }
        .category-button {
    background: linear-gradient(to right, #5900ff, #000000);
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 20px;
    display: flex;
    align-items: center;
    font-size: 16px;
    color: white;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    box-shadow: 0 0px 5px rgb(85, 0, 255);
    
}

.category-button:hover {
    transform: translateY(-2px); /* Зменшує кнопку трохи при наведенні */
    box-shadow: 0px 4px 10px rgb(255, 255, 255); /* Додає легку тінь */
}

        .category-button::before {
            content: "☰";
            margin-right: 8px;
        }
        .search-container {
            display: flex;
            align-items: center;
            border: 1px solid #1837ff;
            border-radius: 25px;
            overflow: hidden;
            background: rgb(0, 0, 0);
            margin-left:450px;
            margin-top: -49px;
            flex: 1;
            max-width: 500px;
            box-shadow: 0 2px 5px rgb(85, 0, 255);

            
        }
        .search-container input {
            border: none;
            padding: 10px;
            outline: none;
            width: 100%;
            font-size: 16px;
            box-shadow: 0 2px 5px rgb(85, 0, 255);
        }
        .search-container button {
            background: #000000;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 0 25px 25px 0;
        }
        /* Стиль для випадаючого меню категорій */
        .category-dropdown {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0px 8px 16px rgba(0, 98, 255, 0.2);
            z-index: 1;
            min-width: 200px;
            top: 1px;
            
        }
        .category-dropdown a {
    padding: 12px 16px;
    display: block;
    background: linear-gradient(to right, #5900ff, #000000);
    text-decoration: none;
    color: white; /* Стандартний колір */
    transition: color 0.3s ease; /* Плавний ефект зміни кольору */
}

#categoryDropdown {
    top: 55px; /* Менша відстань від кнопки */
    left: 20px; /* Вирівнювання по лівому краю */
    width: 150px; /* Фіксована ширина для компактності */
    max-height: 120px; /* Обмеження висоти */
    background: linear-gradient(to right, #5900ff, #000000); /* Темніший фон */
    padding: 5px 0; /* Менші внутрішні відступи */
    border-radius: 5px; /* Закруглені кути */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5); /* Більш реалістична тінь */
}

/* Стиль пунктів меню */
#categoryDropdown a {
    display: block;
    padding: 6px 10px; /* Менші відступи всередині */
    font-size: 12px; /* Зменшений шрифт */
    color: white;
    text-decoration: none;
    transition: background 0.3s ease, color 0.3s ease;
}

/* Ефект при наведенні */
#categoryDropdown a:hover {
    background-color: rgba(255, 255, 255, 0.2); /* Легка підсвітка */
    color: #000000;
}

    /* Позиціонування підкаталогів для "Мій аккаунт" */
    #profileDropdown {
        top: 40px; /* Відстань від верхнього краю кнопки */
        right: 0; /* Вирівнювання підкаталогу під правий край кнопки */
    }
    #infoDropdown {
    top: 55px; /* Менша відстань від кнопки */
    left: 180px;
    width: 150px; /* Фіксована ширина для компактності */
    max-height: 120px; /* Обмеження висоти */
    background: linear-gradient(to right, #5900ff, #000000); /* Темніший фон */
    padding: 5px 0; /* Менші внутрішні відступи */
    border-radius: 5px; /* Закруглені кути */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5); /* Більш реалістична тінь */
}
/* Стиль пунктів меню */
#infoDropdown a {
    display: block;
    padding: 6px 10px; /* Менші відступи всередині */
    font-size: 12px; /* Зменшений шрифт */
    color: white;
    text-decoration: none;
    transition: background 0.3s ease, color 0.3s ease;
}

/* Ефект при наведенні */
#infoDropdown a:hover {
    background-color: rgba(255, 255, 255, 0.2); /* Легка підсвітка */
    color: #000000;
}


    </style>
</head>
<body>

<div class="header">
    <!-- Кнопка категорій товару -->
    <button class="category-button" onclick="toggleCategoryMenu()">Категорії книг</button>
    <div class="category-dropdown" id="categoryDropdown">
        <a href="#">Фантастика</a>
        <a href="#">Романтика</a>
        <a href="#">Детективи</a>
        <a href="#">Наукова література</a>
        <a href="#">Манга</a>
    </div>
    <!-- Кнопка корзини -->

<!-- Кнопка корзини --> 
<button class="category-button" onclick="toggleCartMenu()">Корзина</button>
<div class="category-dropdown" id="cartDropdown" style="display: none;">
    <a href="#" onclick="viewCart()">Переглянути корзину</a>
   
</div>

    <script>
        // Функція для відкриття/закриття меню корзини
        function toggleCartMenu() {
            const menu = document.getElementById('cartDropdown');
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        }

        // Закриваємо меню корзини, якщо користувач клацає поза ним
        window.onclick = function(event) {
            if (!event.target.matches('.category-button')) {
                const cartDropdown = document.getElementById('cartDropdown');
                if (cartDropdown.style.display === 'block') {
                    cartDropdown.style.display = 'none';
                }
            }
        };
    </script>
    <!-- Кнопка інформації --> 
    <button class="category-button" onclick="toggleInfoMenu()">Інформація</button>
    <div class="category-dropdown" id="infoDropdown" style="display: none;">
        <a href="#" id="aboutUs">Про Нас</a>
        <a href="#" id="contactInfo">Контактні Дані</a>
    </div>


    </div>
    <script>
        // Функція для відкриття/закриття меню інформації
        function toggleInfoMenu() {
            const menu = document.getElementById('infoDropdown');
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        }

        // Закриваємо меню інформації, якщо користувач клацає поза ним
        window.onclick = function(event) {
                   if (!event.target.matches('.category-button')) {
                        const infoDropdown = document.getElementById('infoDropdown');
                        if (infoDropdown.style.display === 'block') {
                            infoDropdown.style.display = 'none';
                        }
                    }
                };
        
               // Функція для відкриття/закриття меню
        function toggleInfoMenu() {
            const dropdown = document.getElementById('infoDropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }
        
        // Обробка натискання на "Про Нас" та "Контактні Дані"
        document.querySelectorAll('#infoDropdown a').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Запобігає переходу за посиланням
                
                // Отримуємо текст пункту меню
                const infoTitle = this.textContent; 
                document.querySelector('header h1').textContent = infoTitle; // Оновлюємо заголовок
        
                let content = '';
        
                // Вміст для розділу "Про Нас"
                if (infoTitle === 'Про Нас') {
                    content = `
                        <p>Ласкаво просимо до "Книгоман" – місця, де книги оживають! Ми створили цей магазин для справжніх поціновувачів літератури, які шукають захопливі історії, нові знання та незабутні емоції.</p>
                        <p>У нашому асортименті ви знайдете книги на будь-який смак:</p>
                        <p>✨ Фантастика – пориньте у світи майбутнього, магії та незвіданих галактик. Епічні битви, неймовірні пригоди та альтернативні реальності чекають на вас!</p>
                        <p>❤️ Романтика – історії, що зачіпають серце. Пристрасні кохання, ніжні почуття та випробування, які роблять любов ще сильнішою.</p>
                        <p>🔍 Детективи – розгадуйте таємниці разом із геніальними слідчими. Заплутані справи, несподівані повороти та напружений сюжет – усе, що потрібно для справжнього інтелектуального задоволення.</p>
                        <p>🔬 Наукова література – розширюйте свої горизонти та дізнавайтеся більше про світ. Від фізики до психології – ми зібрали найкращі книги для допитливих умів.</p>
                        <p>🎌 Манга – японські комікси для будь-якого настрою. Від епічних бойовиків до ніжних романтичних історій – у нас є те, що вам сподобається!</p>
                        <p>Ми обираємо тільки найкращі видання, щоб кожна книга приносила вам справжнє задоволення. Приєднуйтесь до читацької спільноти "Книгоман" та відкривайте нові історії разом із нами!</p>
                        <p>📚 З любов’ю до книг, ваша команда "Книгоман"</p>
                    `;
                // Вміст для розділу "Контактні Дані"
                } else if (infoTitle === 'Контактні Дані') {
                    content = `
                        <p>📞 Контактні Дані</p>
                        <p>Маєте питання або шукаєте ідеальну книгу? Ми завжди на зв’язку!</p>
                        <p>📍 Адреса: м. Коломия, вул. Січових стрільців</p>
                        <p>📧 Email: knihoman.shop@gmail.com</p>
                        <p>📞 Телефон: +38 (097) 123-45-67</p>
                        <p>💬 Месенджери:</p>
                        <p>🔹 Telegram: <a href="https://t.me/+IvU6FHkU2Z5kZmRi" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg" alt="Telegram" style="width: 24px; height: 24px;"></a></p>
                        <p>🔹 Instagram: <a href="https://www.instagram.com/knigomania.com.ua?utm_source=ig_web_button_share_sheet&igshid=ZDNlZDc0MzIxNw==" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram" style="width: 24px; height: 24px;"></a></p>
                        <p>🕒 Графік роботи:</p>
                        <p>📅 Пн-Сб: 08:00 – 24:00</p>
                        <p>🌟 Неділя – вихідний</p>
                        <p>Будемо раді допомогти вам знайти ідеальну книгу! 📚✨</p>
                    `;
                }
                
                // Вставка контенту у блок container
                document.querySelector('.container').innerHTML = content;
                
                // Закриваємо меню після натискання
                document.getElementById('infoDropdown').style.display = 'none';
            });
        });
</script>
    <!-- Пошук книг -->
     
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Знайти книгу...">
        <button onclick="searchBook()">Пошук</button>
    </div>
</div>

<script>
    // Функція для відкриття/закриття меню категорій
    function toggleCategoryMenu() {
        const menu = document.getElementById('categoryDropdown');
        menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
    }

    // Функція для пошуку книги
    function searchBook() {
        const query = document.getElementById('searchInput').value.trim();
        if (query) {
            alert('Шукаємо книгу: ' + query);
            // Тут можна додати функціональність для реального пошуку книги
        } else {
            alert('Введіть назву книги для пошуку');
        }
    }

    // Закриваємо меню категорій, якщо користувач клацає поза ним
    window.onclick = function(event) {
        if (!event.target.matches('.category-button')) {
            const dropdown = document.getElementById('categoryDropdown');
            if (dropdown.style.display === 'block') {
                dropdown.style.display = 'none';
            }
        }
    };
</script>
</body>
</html>

<header>
    <h1 style="color: white;">Магазин книг</h1>
    <p>Виберіть свою улюблену книгу</p>
</header>

<div class="container"></div>
    <!-- Book cards here -->
</div>

<div class="container">
    <!-- Книга 1 -->
    <div class="book-card">
        <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book.png?raw=true" alt="Book 1">
        <h3>Найбагатший чоловік у Вавилоні</h3>
        <p>Автор:  Джордж Клейсон</p>
        <p class="short-description"></p>
            Про книгу: Змінилися часи, замість золотих монет з’явилися паперові купюри й картки для виплат, та незмінними залишаються закони грошей...
        </p>
        <p class="full-description">
            <p class="full-description">
                Змінилися часи, замість золотих монет з’явилися паперові купюри й картки для виплат, та незмінними залишаються закони грошей. Ще давні вавилоняни знали, як заробляти й примножувати статки. Так вони перетворили своє місто в найбагатше у світі. Завдяки книжці «Найбагатший чоловік у Вавилоні» кожна людина може відкрити для себе закони грошей. Цю збірку притч Джорджа Клейсона, стилізованих під вавилонські історії, ще називають посібником із фінансової кмітливості. Книга розкриває прості, але ефективні принципи, які допомагають досягти фінансової стабільності. Вона навчає, як правильно заощаджувати, інвестувати та уникати непотрібних витрат. Через історії героїв, які долають труднощі та досягають успіху, читачі отримують натхнення та практичні поради. Ця книга стане в нагоді як для початківців, так і для тих, хто вже має досвід у фінансах. Вона нагадує, що багатство — це не лише про гроші, а й про мудрість, дисципліну та терпіння. Прочитавши її, ви зрозумієте, як змінити своє фінансове мислення та крок за кроком рухатися до фінансової свободи. Кожна сторінка цієї книги — це урок, який допоможе вам стати господарем своїх грошей, а не їхнім рабом.
            </p>
            <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
            <p class="price">Ціна: 900 грн</p>
            <a href="#" class="btn">Купити</a>
            <a href="#" class="btn">Читати онлайн</a>
            <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
        </div>
        <script>
            function toggleDescription(button) {
                const bookCard = button.closest('.book-card');
                const shortDescription = bookCard.querySelector('.short-description');
                const fullDescription = bookCard.querySelector('.full-description');
        
                if (fullDescription.style.display === 'none') {
                    fullDescription.style.display = 'block';
                    shortDescription.style.display = 'none';
                    button.textContent = 'Згорнути';
                } else {
                    fullDescription.style.display = 'none';
                    shortDescription.style.display = 'block';
                    button.textContent = 'Читати повністю';
                }
            }
        </script>
        <style>
            .read-more-btn {
                background: linear-gradient(to right, #5900ff, #000000);
                border: none;
                padding: 10px 15px;
                cursor: pointer;
                border-radius: 10px;
                color: white;
                text-align: center;
                margin-top: 10px;
                transition: transform 0.3s ease;
            }
            .read-more-btn:hover {
                transform: scale(1.1);
            }
        </style>
        
        <div class="book-card">
            <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book1.png?raw=true" alt="Book 2">
            <h3>Макова війна</h3>
            <p>Автор:  Ребекка Кван</p>
            <p class="short-description">Про Книгу: Сирота війни з глухої провінції зробила неможливе — на відмінно склала загальноімперський іспит Кедзю для вступу в військову академію....

            </p>
            <p class="full-description"> Це стало несподіванкою для всіх: екзаменаторів, які не могли повірити в те, що бідна селючка здатна на таке; опікунів дівчини, котрі планували видати її заміж та розширити незаконну торгівлю опіумом; і для самої Жинь, яка нарешті відчула себе вільною. Намагаючись протистояти могутнім ворогам і хапаючись за будь-яку можливість залишитись у військовій академії Сінеґард, Жинь відкриває в собі схильність до шаманізму і зв’язок із богом вогню. Цієї сили навіть забагато для успіху в Академії, та чи не замало її буде на полі битві під час війни? І якої платні забажає від неї мстивий бог Фенікс? Жинь доводиться балансувати між навчанням, боротьбою з внутрішніми демонами та зовнішніми загрозами. Її шлях — це історія про мужність, жертви та пошук себе. Чи зможе вона витримати тиск Академії та виклики війни? Чи стане її зв’язок із богом вогню благословенням чи прокляттям? Ця книга — епічна історія про силу волі, магію та війну, яка зачарує кожного читача.</p>
            <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
            <p class="price">Ціна: 650 грн</p>
            <a href="#" class="btn">Купити</a>
            <a href="#" class="btn">Читати онлайн</a>
            <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
           
        </div>
        <div class="book-card">
            <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book3.png?raw=true" alt="Book 3">
            <h3>Розсікаючи хвилі</h3>
            <p>Автор: Крістіна Монінгер</p>
            <p class="short-description">Про Книгу:  Молоді, дикі, відчайдушні Ейвері, Ізабелла, Одіна, Лі та Джозі — найкращі подруги відтоді, як познайомилися в серфінг-таборі. Їхнє безтурботне літо триває доти....</p>
            <p class="full-description">поки їхня подруга Джозі, зірка, яка грала Вітті в «Міській присязі», раптово не зникає… Усе почалося того класного літа, коли вони тільки познайомилися: Ейвері, Ізабелла, Одіна, Лі та Джозі. Серфінг, піца, фільм «Вбивство Тайлера»… Літо було безтурботним і шаленим, доки Джозі раптово не зникла… Розслідування мало що дало. Проте назовні виплили всі конфлікти між подругами й усі таємниці. Що більше дівчата намагалися допомогти поліції, то очевиднішою ставало їхнє власне залучення…</p>
            <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
            <p class="price">Ціна: 710 грн</p>
            <a href="#" class="btn">Купити</a>
            <a href="#" class="btn">Читати онлайн</a>
            <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
        </div>
        <div class="book-card">
            <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book4.png?raw=true" alt="Book 4">
            <h3>Це те, що вас зцілить, коли будете готові</h3>
            <p>Автор: Бріанна Вест</p>
            <p class="short-description">Про Книгу:Зцілення — це не одноразова подія. Воно може розпочатися з одноразової події — зазвичай із якоїсь раптової втрати, що руйнує наше уявлення про майбутнє. Однак справжнє зцілення дає нам змогу</p>
            <p class="full-description">пробудитися з глибокого стану неусвідомленості, відпустити особистість, до якої ми звикли й адаптувалися, і почати усвідомлено збирати докупи шматочки правди про те, ким ми насправді маємо бути. У цій збірці, що стала своєрідним продовженням бестселера «101 есей, який змінить ваше мислення», Бріанна Вест ділиться новими творами, які допоможуть знайти внутрішню святиню й стати на шлях справжньої трансформації. Слова Бріанни Вест — бальзам для кожної душі, що прямує до свого становлення.  Ви не знайдете тут лекцій про роботу мозку, особливості реакції психіки на втрату чи деталей гормонального регулювання роботи організму під час стресу. </p>
            <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
            <p class="price">Ціна: 690 грн</p>
            <a href="#" class="btn">Купити</a>
            <a href="#" class="btn">Читати онлайн</a>
            <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
        </div>
        <div class="book-card">
            <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book5.png?raw=true" alt="Book 5">
            <h3>Залізний генерал. Уроки людяності</h3>
            <p>Автор:Людмила Долгоновська</p>
            <p class="short-description">Про Книгу: Книга Людмили Долгоновської «Залізний генерал. Уроки людяності» є надзвичайно важливим та вражаючим літературним проектом, який проливає світло на одну з найбільш знакових постатей сучасної української історії.
            <p class="full-description">Це не просто біографія або військова хроніка, а комплексний портрет людини, яка стала символом мужності, стійкості та стратегічного генія в часи найгостріших випробувань.
             Книга фокусується на Валерії Залужному, Головнокомандувачу ЗСУ, чия роль у військових операціях та управлінні військами під час російської агресії в Україні стала вражаючим прикладом національного спротиву. У той час як більшість з нас спостерігала за подіями з відстані, Долгоновська забезпечує читача унікальним поглядом на обставини та особистості, які сформували образ Залужного як непереможного стратега та лідера.</p>
             <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
             <p class="price">Ціна: 550 грн</p>
            <a href="#" class="btn">Купити</a>
            <a href="#" class="btn">Читати онлайн</a>
            <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
        </div>
        <div class="book-card">
            <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book6.png?raw=true" alt="Book 6">
            <h3>Пригоди української літератури</h3>
            <p>Автор:Ростислав Семків</p>
            <p>Автор:Ольга Глумчер</p>
            <p class="short-description">Про Книгу: Автор починає свою подорож із майже романтичних глибин думок Григорія Сковороди, і його власний стиль знаряджає читача на творчий подих та роздуми. Семків переходить до різних періодів літературної історії,
            <p class="full-description"> висвітлюючи не тільки великі та відомі рухи, але й враховуючи менш відомі аспекти та авторів, що також залишили свій внесок у розвиток української культури. 
Особливо цікавим є те, як автор звертає увагу на жіночий внесок українських письменників, привертаючи увагу читача до тих, хто можливо не завжди був на передньому плані.</p>
            <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
            <p class="price">Ціна: 980грн</p>
            <a href="#" class="btn">Купити</a>
            <a href="#" class="btn">Читати онлайн</a>
            <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
        </div>
        <div class="book-card">
            <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book7.jpg?raw=true" alt="Book 7">
            <h3>По той бік чарівної палички. Магія і хаос мого дорослішання</h3>
            <p>Автор: Том Фелтон</p>
            <p class="short-description">Про Книгу: По той бік чарівної палички. Магія і хаос мого дорослішання» – це мемуари актора Тома Фелтона, добре відомого усім читачам за роллю Драко Мелфоя у фільмах Поттеріани. Дитинство акторів головних героїв
            <p class="full-description">цих культових фільмів складно назвати звичайним, адже вони потрапили на знімальний майданчик ще дітьми. Як і його колеги, Фелтон ріс і навчався фактично на знімальному майданчику. У своїх мемуарах актор розповідає, як відомість вплинула на його подальше життя та яким були його взаємодії з іншими учасниками зйомок. Зі сторінок книжки читачі довідаються, як Том проходив прослуховування до «Гаррі Поттера» і як складно було визначатись після фільму, що він може робити в цьому житті.</p>
            <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
            <p class="price">Ціна: 490 грн</p>
            <a href="#" class="btn">Купити</a>
            <a href="#" class="btn">Читати онлайн</a>
            <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
        </div>
        <div class="book-card">
            <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book8.png?raw=true" alt="Book 8">
            <h3>Мистецтво й створення серіалу Аркейн</h3>
            <p>Автор:Елізабет Вінчентеллі</p>
            <p class="short-description">Про Книгу: Мистецтво й створення серіалу Аркейн» — це захоплива подорож залаштунками анімаційного серіалу від Netflix, відзначеного нагородою «Еммі», сповнена приголомшливих ілюстрацій та концепт-артів!
            <p class="full-description">Артбук запрошує у візуальну подорож революційним анімаційним серіалом, створеним Riot Games та Fortiche. Це вичерпна збірка, що вмістила ранні художні напрацювання, еволюції дизайнів персонажів і разючі роботи, що супроводжували розбудову світу.Фанати «Аркейну» та League of Legends будуть вражені візуальним розвитком улюблених чемпіонів, захопливими міськими пейзажами Пілтовера та Зауна й дивовижними винаходами гекстеку та мерехту.Книга містить ранні дизайни, що демонструють візуальну еволюцію персонажів, панорамні зображення фонів та декорацій, а також інтерв'ю з понад двадцятьма ключовими аніматорами, сценаристами, режисерами, художниками, дизайнерами гри, звукорежисерами та іншими творцями.</p>
                <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
            <p class="price">Ціна: 450 грн</p>
            <a href="#" class="btn">Купити</a>
            <a href="#" class="btn">Читати онлайн</a>
            <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
        </div>
       

        <div class="book-card">
            <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book9.png?raw=true" alt="Book 10">
            <h3>Evangelion</h3>
            <p>Автор:Hideaki Anno</p>
            <p class="short-description">Про Книгу:Дія відбувається в 2015 році, через чотирнадцять років після катастрофічного Другого удару, причиною якого, за офіційною версією, стало падіння метеорита, що знищив дві третини населення Земліі 
            <p class="full-description">відхилив планетарну вісь. Люди, що вижили, зуміли відновити комунікації і постачання. Події серіалу починаються з того, що на місто Токіо-3 нападає дивна істота, названа Ангелом (в японському оригіналі — Апостолом). Звичайне озброєння не ефективне проти нього і єдиним захистом і засобом протидії виявляються біомеханічні машини, створені воєнізованою організацією NERV, — Єванґеліони (Єви).</p>
            <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
            <p class="price">Ціна: 550 грн</p>
            <a href="#" class="btn">Купити</a>
            <a href="#" class="btn">Читати онлайн</a>
            <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
        </div>
            <div class="book-card">
                <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book10.png?raw=true" alt="Book 11">
                <h3>Танець Недоумка</h3>
                <p>Автор:  Ілларіон Павлюк</p>
                <p class="short-description">Про книгу: Космічний біолог Гіль, за плечима якого чимало військових операцій, переживає не найкращі часи: безробіття, безгрошів'я, сім'я на межі розлучення, ще й висока ймовірність, що проявиться
                <p class="full-description">спадкова генетична хвороба, в якій швидка смерть — це чи не найкращий фінал. І ось неочікувано з'являється пропозиція роботи, яка, здавалося б, вирішує всі проблеми одночасно: наукова експедиція на далеку планету. Хороші гроші, медична страховка, мінімальні ризики. Чи виявиться рішення летіти, до якого підштовхує страх, правильним? І чи такі вже мінімальні ризики на далекій і химерній планеті Іш-Чель?</p>
                <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
                <p class="price">Ціна: 480 грн</p>
                <a href="#" class="btn">Купити</a>
                <a href="#" class="btn">Читати онлайн</a>
                <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>

        <div class="book-card">
            <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book11.png?raw=true" alt="Book 12">
            <h3>Життя в середньовічному замку</h3>
            <p>Автор: Джозеф Ґіс,</p>
            <p class="short-description">Про Книгу: Уявіть, як крокуєте вузькими коридорами кам’яного замку, вдихаєте запахи готичних залів і чуєте дзвін мечів у ритуалі посвяти лицаря. Ця книга — не просто збірка фактів, а справжнє запрошення
            <p class="full-description">зазирнути за завісу: що їли, як вдягалися, про що мріяли ті, для кого замок був і домом, і фортецею. Вона відповідає на питання, які ви могли й не ставити, але без відповіді на які повністю зрозуміти середньовіччя неможливо.</p>
            <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
            <p class="price">Ціна: 1050 грн</p>
            <a href="#" class="btn">Купити</a>
            <a href="#" class="btn">Читати онлайн</a>
            <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
        </div>
            <div class="book-card">
                <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book12.png?raw=true" alt="Book 13">
                <h3>Королівство проклятих</h3>
                <p>Автор:  Керрі Маніскалко</p>
                <p class="short-description">Про книгу: Емілія та її сестра-близнючка Вітторія — відьми, які таємно живуть серед людей. Одного вечора Вітторія не з’являється на родинну вечерю. І незабаром Емілія знаходить тіло дорогої сестри
                <p class="full-description">неймовірно понівеченим. Спустошена Емілія затялася відшукати вбивцю близнючки і помститися за будь-яку ціну, навіть якщо для цього доведеться вдатися до темної магії, яку давно заборонено. Іще в дитинстві бабуся застерігала дівчаток не бавитися чорною магією і не мати жодного стосунку до потойбіччя. Утім близнючки до неї не дослухалися. Емілія здійснює магічний ритуал викликання князя пекла, і до неї з’являється Гнів — один із Нечестивих. Від нього дівчина дізнається, що господар доручив йому розкрити серію жіночих убивств, що і далі тривають на острові. Хто ж той загадковий убивця, який полює на відьом-незайманок? Із ким іще з князів темряви має зіткнутися Емілія, щоб помститися за жорстоке вбивство Вітторії? І до чого тут Ріг Аїда, який відмикає ворота пекла?</p>
                <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
                <p class="price">Ціна: 290 грн</p>
                <a href="#" class="btn">Купити</a>
                <a href="#" class="btn">Читати онлайн</a>
                <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
            </div>
            <div class="book-card">
                <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book13.png?raw=true" alt="Book 14">
                <h3>Дюна</h3>
                <p>Автор:  Френк Герберт</p>
                <p class="short-description">Про книгу: Меланж, або прянощі, — найцінніша і найрідкісніша речовина у всесвіті, яка може все: від подовження життя до сприяння міжзоряним подорожам. І знайти її можна лише на одній планеті
                <p class="full-description">непривітному пустельному Арракісі. Той, хто володарює на Арракісі, контролює прянощі. А хто контролює прянощі — керує всесвітом. Коли Імператор позбавляє клан Харконненів звання правлячого і віддає цей титул Атрідам, Харконнени вбивають герцога Лето Атріда. Його син Пол і наложниця Джессіка тікають у пустелю. Щоб помститися за батька і відвоювати планету в Харконненів, Пол має здобути довіру фрименів — корінних мешканців Арракіса — і повести крихітну армію проти незліченних сил супротивника.</p>
                <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
                <p class="price">Ціна: 550 грн</p>
                <a href="#" class="btn">Купити</a>
                <a href="#" class="btn">Читати онлайн</a>
                <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
            </div>
            <div class="book-card">
                <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book14.png?raw=true" alt="Book 15">
                <h3>Світло в темряві</h3>
                <p>Автор:  Стейсі Віллінгем</p>
                <p class="short-description">Про книгу: Двадцять років тому Луїзіані зникли дівчата-підлітки. Батько дванадцятирічної Хлої Девіс зізнався у вбивстві шістьох жертв, за що був засуджений на довічне ув’язнення. Після цього життя Хлої,
                <p class="full-description">її брата й матері стало нестерпним: усі знали, хто вони такі та що їх спіткало. Щоб позбутися спогадів і якось зарадити собі, уже доросла Хлоя стала психологом. Але іноді їй здається, що вона не контролює свого життя, так само як і складні підлітки, з якими працює. Та найстрашніше те, що напередодні її весілля в місті, де вона тепер мешкає, знову зникли дівчата. Хто ж тепер у цьому винний?..</p>
                <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
                <p class="price">Ціна: 342 грн</p>
                <a href="#" class="btn">Купити</a>
                <a href="#" class="btn">Читати онлайн</a>
                <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
    <div class="book-card">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book15.png?raw=true" alt="Book 16">
    <h3>Переслідування Аделіни</h3>
    <p>Автор:  Карлтон Х. Д</p>
    <p class="short-description">Про книгу: У середині 1940-х червоногубу красуню Женев’єву (Джіджі) Парсонс переслідує сталкер. Одначе їй така увага й таємничість цього чоловіка стають приємними і дарують живу віддушину, ковток свіжого повітря, маленькі радощі життя. Щоправда, красуня гине за загадкових обставин, а вбивство лишається нерозкритим.</p>
    <p class="full-description">У середині 1940-х червоногубу красуню Женев’єву (Джіджі) Парсонс переслідує сталкер. Одначе їй така увага й таємничість цього чоловіка стають приємними і дарують живу віддушину, ковток свіжого повітря, маленькі радощі життя. Щоправда, красуня гине за загадкових обставин, а вбивство лишається нерозкритим.</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 370 грн</p>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
<div class="book-card">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book16.png?raw=true" alt="Book 17">
    <h3>Дрімаючий демон Декстера</h3>
    <p>Автор:  Джефф Ліндсей</p>
    <p class="short-description">Про книгу: Декстер Морган працює експертом з бризк крові в поліції Маямі, але у нього є страшна таємниця. Він — серійний вбивця, але вбиває він лише вбивць, ґвалтівників та інших злочинців, яким вдалося втекти від справедливості. Декстер прислуховується до свого внутрішнього голосу, свого «темного пасажира», який спонукає його до вбивств. Кожного разу, коли Декстер вбиває когось, голос у його голові зникає, але завжди повертається.</p>
    <p class="full-description">Декстер Морган працює експертом з бризк крові в поліції Маямі, але у нього є страшна таємниця. Він — серійний вбивця, але вбиває він лише вбивць, ґвалтівників та інших злочинців, яким вдалося втекти від справедливості. Декстер прислуховується до свого внутрішнього голосу, свого «темного пасажира», який спонукає його до вбивств. Кожного разу, коли Декстер вбиває когось, голос у його голові зникає, але завжди повертається.</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 350 грн</p>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
<div class="book-card">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book17.png?raw=true" alt="Book 18">
    <h3>Ніколи не бреши</h3>
    <p>Автор:  Фріда Мак-Фадден</p>
    <p class="short-description">Про книгу: ноді правда вбиває.. У пошуках будинку своєї мрії молодята Трісія та Ейтан опиняються в розкішному маєтку на Кедровій Алеї, виставленому на продаж. Оглядаючи кімнати, вони розуміють, що саме тут жила докторка Адріана Гейл, відома фахівчиня з психіатрії, яка загадково зникла майже чотири роки тому.
    <p class="full-description">У пошуках розваги чи бодай якоїсь книжки Трісія натрапляє на таємну кімнату, де зберігаються аудіозаписи розмов докторки Гейл з усіма пацієнтами. Вирішивши послухати їх, касета за касетою, вона неочікувано дізнається про низку подій, які передували зникненню психіатрині. Щось жахливе сталося в цьому будинку…  злочинців, яким вдалося втекти від справедливості. Декстер прислуховується до свого внутрішнього голосу, свого «темного пасажира», який спонукає його до вбивств. Кожного разу, коли Декстер вбиває когось, голос у його голові зникає, але завжди повертається.</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 288 грн</p>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
<div class="book-card">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book18.png?raw=true" alt="Book 19">
    <h3>Багряні Ріки</h3>
    <p>Автор:  Жан-Крістоф Ґранже</p>
    <p class="short-description">Про книгу: Маленьке французьке містечко Ґернон охоплене жахом через серію жорстоких убивств. Жертви — бібліотекар Кайюа, санітар Філіпп Серті та лікар Шернсе — зазнали пекельних тортур. Місцева поліція не може відшукати вбивцю, тому звертається по допомогу до столичного комісара Ньємана.</p>
    <p class="full-description">Про книгу: Маленьке французьке містечко Ґернон охоплене жахом через серію жорстоких убивств. Жертви — бібліотекар Кайюа, санітар Філіпп Серті та лікар Шернсе — зазнали пекельних тортур. Місцева поліція не може відшукати вбивцю, тому звертається по допомогу до столичного комісара Ньємана.</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 330 грн</p>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
<div class="book-card">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book19.png?raw=true" alt="Book 20">
    <h3>Із крові й попелу</h3>
    <p>Автор:  Дженніфер Л. Арментраут</p>
    <p class="short-description">Про книгу: Пенеллафі Балфур, вона ж Маківка — не просто осиротіла донька багатіїв, наближених до королівської родини, а ще й Діва. Діву роками готують до важливого релігійного ритуалу, глибоко шанують і ревно стережуть, тож Маківка виросла в достатку й має все, крім особистої свободи.
    <p class="full-description">Вона скута жорсткими рамками правил, але нишком порушує їх усі: навчається бойових мистецтв, допомагає тим, кому пощастило менше, потай вибирається на прогулянки до міста й не тільки. Під час однієї з таких прогулянок Маківка, сховавшись під маскою, зустрічає прекрасного незнайомця. Той плутає її зі служницею, з якою в нього побачення, — розвага, про яку Діві навіть мріяти не можна. Невдовзі цей прекрасний незнайомець опиняється в замку, де живе Маківка, і стає... її новим особистим охоронцем. Дівчина, звісно, шокована.Однак це — лише початок неймовірних пригод, які спонукають її засумніватися майже в усьому, що вона знає про людство.</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 313 грн</p>
    <a href="#" class="btn">Купити</p>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
<div class="book-card">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book20.png?raw=true" alt="Book 21">
    <h3>Палюче тепло вб’є нас найперше</h3>
    <p>Автор:  Дж. Ґуделл</p>
    <p class="short-description">Про книгу:Лісові пожежі, що не вщухають у Каліфорнії. Теплові хвилі, які вже стали сезонними в Європі. Танення льодовиків, що не припиняється в Арктиці й Антарктиці. Підвищення температури нині — це екологічна загроза найвищого порядку, яка зумовлює всі інші наслідки кліматичної кризи.
    <p class="full-description">У своїй новій книзі Джефф Ґуделл, письменник і редактор журналу Rolling Stone, який десятиліттями працював у сфері екологічної журналістики, пояснює, чому весна настає на кілька тижнів раніше, а осінь — на кілька тижнів пізніше, і який уплив це матиме на все, починаючи від продуктів, якими ми харчуємося, і закінчуючи хворобами, на які хворіємо.</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 425 грн</p>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
<div class="book-card">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/ghoul.png?raw=true" alt="Book 22">
    <h3>Tokyo Ghoul</h3>
    <p>Автор:  Ішіда Суї</p>
    <p class="short-description">Про книгу:Кен Канекі — вісімнадцятирічний студент університету, який внаслідок нещасного випадку потрапляє до лікарні, де йому незаконно пересаджують органи одного з гулів, щоб врятувати йому життя. Для того, щоб вижити, гулям необхідно харчуватися людською плоттю, тому вони вбивають людей або знаходять тіла самогубців. Через таку пересадку органів Канекі стає лише напівгулем, але харчуватися людською плоттю йому необхідно як і всім. Канекі прагне зберегти свою людяність, намагаючись зберегти зв'язок зі світом людей, занурившись у співтовариство гулів.</p>
    <p class="full-description">Про книгу:Кен Канекі — вісімнадцятирічний студент університету, який внаслідок нещасного випадку потрапляє до лікарні, де йому незаконно пересаджують органи одного з гулів, щоб врятувати йому життя. Для того, щоб вижити, гулям необхідно харчуватися людською плоттю, тому вони вбивають людей або знаходять тіла самогубців. Через таку пересадку органів Канекі стає лише напівгулем, але харчуватися людською плоттю йому необхідно як і всім. Канекі прагне зберегти свою людяність, намагаючись зберегти зв'язок зі світом людей, занурившись у співтовариство гулів.</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 276 грн</p>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</p>
</div>
<div class="book-card">
    <img src="https://bookclub.ua/images/db/goods/59142_118361.jpg" alt="Book 23">
    <h3>Сяйво</h3>
    <p>Автор:  Стівен Кінг</p>
    <p class="short-description">Про книгу:орранси найнялися доглядати взимку за розкішним готелем, вони й гадки не мали, який невимовний жах чекає на них... Одного разу там скоїлася страшна трагедія: колишній доглядач зарубав сокирою власну родину. Саме тут п’ятирічний Денні дізнався, що він може бачити справжніх мешканців будинку. І це — привиди. Хлопчику, наділеному даром передбачення, відкривається страшна суть речей. Він уже знає, звідки його родині загрожує смерть...</p>
    <p class="full-description">Про книгу:орранси найнялися доглядати взимку за розкішним готелем, вони й гадки не мали, який невимовний жах чекає на них... Одного разу там скоїлася страшна трагедія: колишній доглядач зарубав сокирою власну родину. Саме тут п’ятирічний Денні дізнався, що він може бачити справжніх мешканців будинку. І це — привиди. Хлопчику, наділеному даром передбачення, відкривається страшна суть речей. Він уже знає, звідки його родині загрожує смерть...</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 460 грн</p>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
<div class="book-card">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book21.jpg?raw=true" alt="Book 24">
    <h3>Гра Друзів</h3>
    <p>Автор:  Mikoto Yamaguchi</p>
    <p class="short-description">Про книгу:Хлопці з дружного та згуртованого класу збирають гроші, щоб разом вирушити у поїздку, проте кошти зникають. Вони хочуть організувати власну екскурсію для всього колективу. У результаті підозра під час розслідування падає на двох персонажів - Макото Шібе та Шіхо Саварагі. Саме їм здавалася готівка. Двоє хлопців знають, що не причетні до крадіжки, але вину свою визнають, бо справжній винуватець вирішив мовчати.
    <p class="full-description"> ЮітІ Катагірі найбільше страждає через втрату грошей. Головний персонаж і так знаходиться на волосині від становлення жебраком. Фінансові проблеми даються взнаки вже не перший рік. Декілька днів потому Юіті виявляється захопленим у полон разом зі своїми близькими приятелями. Їх викрав Макото, який заявив героям, що ті будуть змушені брати участь у жорстокій грі, яка перевірить реальність дружби персонажів. Юїті завжди довіряв своїм близьким людям. Він готовий кинути виклик негіднику і показати, що, як і раніше, є вірним своїм товаришам. Його воля до життя та перемоги проявляється у найскладніші моменти випробування. Саме тут він дізнається, хто для нього справжній друг, а хто жорстокий зрадник. Можливо, тут розкриється і таємниця нещодавньої крадіжки.</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 330 грн</p>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
<div class="book-card">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book22.png?raw=true" alt="Book 25">
    <h3>Бліч</h3>
    <p>Автор:  Tite Kubo</p>
    <p class="short-description">Про книгу:Центральний персонаж Бліч — п'ятнадцятирічний школяр Куросакі Ічіґо, який випадково отримує надприродні сили шиніґамі — «богів смерті». Наділений їх здібностями, Ічіґо вимушений битися із злими духами, захищати людей та відправляти душі померлих у потойбічний світ.</p>
    <p class="full-description">Про книгу:Центральний персонаж Бліч — п'ятнадцятирічний школяр Куросакі Ічіґо, який випадково отримує надприродні сили шиніґамі — «богів смерті». Наділений їх здібностями, Ічіґо вимушений битися із злими духами, захищати людей та відправляти душі померлих у потойбічний світ.</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 432 грн</п>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
<div class="book-card">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book23.png?raw=true" alt="Book 26">
    <h3>One Piece</h3>
    <p>Автор:  Eiichiro Oda</p>
    <p class="short-description">Про книгу:Дія відбувається у вигаданому світі у час «Ери піратів». Подія, що стала точкою відліку ери — страта «Короля піратів», Ґол Д. Роджера. Коли Роджеру було надано право останнього слова, він оголосив, що сховав всі свої скарби в одному місці. Після цього тисячі людей вирушили на пошуки скарбу, названого «Ван піс».</p>
    <p class="full-description">Про книгу:Дія відбувається у вигаданому світі у час «Ери піратів». Подія, що стала точкою відліку ери — страта «Короля піратів», Ґол Д. Роджера. Коли Роджеру було надано право останнього слова, він оголосив, що сховав всі свої скарби в одному місці. Після цього тисячі людей вирушили на пошуки скарбу, названого «Ван піс».</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 436 грн</p>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
<div class="book-card">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book24.jpg?raw=true" alt="Book 27">
    <h3>Jujutsu Kaisen</h3>
    <p>Автор:  Gege Akutami</p>
    <p class="short-description">Про книгу:Ітадорі Юджі — старшокласник атлетичної статури, який живе в Сендаї разом з дідусем. Через нелюбов до спорту він постійно уникає шкільної команди з легкої атлетики, хоч і має надлюдську фізичну силу та талант до цього виду спорту. Замість цього він приєднується до шкільного клубу вивчення окультизму
    <p class="full-description">і проводить в ньому час зі старшокласниками. Одного дня він йде зі школи, щоби провідати свого дідуся в лікарні. Перед смертю той залишає Юджі два накази: «Завжди допомагай людям» і «Помри, оточений людьми». Після його смерті підліток робить з його слів такий висновок: кожна людина повинна «піти з життя гідно»..</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 632 грн</p>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
<div class="book-card">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book25.jpg?raw=true" alt="Book 28">
    <h3>Chainsaw Man</h3>
    <p>Автор:  Tatsuki Fujimoto</п>
   <p class="short-description">Про книгу:Сюжет "Chainsaw Man" розповідає про юнака на ім'я Дені, який працює як мисливець на демонів під керівництвом жорстокого і безжалісного наставника. Після того, як його обдурюють і зраджують, Дені об'єднується зі своїм собакою-демоном, який перетворюється на ланцюгову пилку, і стає "Chainsaw Man" - потужним борцем з демонами.
    <p class="full-description">Про книгу:Сюжет "Chainsaw Man" розповідає про юнака на ім'я Дені, який працює як мисливець на демонів під керівництвом жорстокого і безжалісного наставника. Після того, як його обдурюють і зраджують, Дені об'єднується зі своїм собакою-демоном, який перетворюється на ланцюгову пилку, і стає "Chainsaw Man" - потужним борцем з демонами. Протягом своєї подорожі він зустрічає різних персонажів, знаходить нових союзників і стикається зі своєю власною темною сутністю.</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 500 грн</p>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
<div class="book-card" data-genres="Манга">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book26.png?raw=true" alt="Book 29">
    <h3>Attack On Titan</h3>
    <p>Автор:  Hajime Isayama</p>
    <p class="short-description">>Про книгу: за 100 років до початку її подій людство було практично повністю знищено невідомою людиноподібною расою величезних істот, названих «титанами». Люди були змушені сховатися за трьома високими стінами, яким дали назви Сіна (яп. シーナ Сі: на, внутрішня стіна), Роза (яп. ローゼ Ро: дзе, середня стіна) і Марія (яп. マリア Маріа, зовнішня стіна). Так люди жили багато років, думаючи, що перебувають у цілковитій безпеці. За кожною стіною із зовнішнього боку були побудовані «райони» — містечка, що слугують зовнішнім кордоном оборони і також оточені стінами.</p>
    <p class="full-description">>Про книгу: за 100 років до початку її подій людство було практично повністю знищено невідомою людиноподібною расою величезних істот, названих «титанами». Люди були змушені сховатися за трьома високими стінами, яким дали назви Сіна (яп. シーナ Сі: на, внутрішня стіна), Роза (яп. ローゼ Ро: дзе, середня стіна) і Марія (яп. マリア Маріа, зовнішня стіна). Так люди жили багато років, думаючи, що перебувають у цілковитій безпеці. За кожною стіною із зовнішнього боку були побудовані «райони» — містечка, що слугують зовнішнім кордоном оборони і також оточені стінами.</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 432 грн</p>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
<div class="book-card">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book27.jpg?raw=true" alt="Book 30">
    <h3>Berserk</h3>
    <p>Автор:  Kentaro Miura</p>
    <p class="short-description">Про книгу: пригоди мечника по імені Гатс, який подорожує країною, боронячись від демонів та людських ворогів. Гатс був колишнім командиром банди найманців, але після того, як його товариш зрадив його і вбив всіх членів банди, Гатс присягнув помститися та став самотнім воїном.</p>
    <p class="full-description">Про книгу: пригоди мечника по імені Гатс, який подорожує країною, боронячись від демонів та людських ворогів. Гатс був колишнім командиром банди найманців, але після того, як його товариш зрадив його і вбив всіх членів банди, Гатс присягнув помститися та став самотнім воїном.</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 352 грн</p>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>
<div class="book-card">
    <img src="https://github.com/andriidivinerapier/SHOP.BOOK/blob/main/images/book28.png?raw=true" alt="Book 30">
    <h3>По сліду Джека Різника</h3>
    <p>Автор:  Керрі Маніскалко</p>
    <p class="short-description">Про книгу: Одрі Роуз Водсворт сімнадцять, вона донька заможного англійського лорда. Статки і привілеї гарантують дівчині спокійне і передбачуване майбутнє. Але між світськими чаюваннями та примірками модних суконь вона веде заборонене таємне життя.</p>
    <p class="full-description"> Всупереч батьковій волі, Одрі Роуз часто вислизає до лабораторії свого дядька, щоб вивчати моторошну практику судово-медичної експертизи. Досліджуючи тіла по-звірячому вбитих жінок, дівчина втягується в розслідування справи серійного вбивці, а пошуки відповідей несподівано повертають її у власний захищений світ. Завдяки несподіваним поворотам сюжету, доповненим справжніми приголомшливими фотографіями, цей вражаючий дебютний роман Керрі Маніскалко, який неможливо оминути увагою, став бестселером №1 за версією New York Times.</p>
    <button class="read-more-btn" onclick="toggleDescription(this)">Читати повністю</button>
    <p class="price">Ціна: 700 грн</p>
    <a href="#" class="btn">Купити</a>
    <a href="#" class="btn">Читати онлайн</a>
    <a href="#" class="btn" onclick="openReviewForm()">Відгук</a>
</div>











</script>
<!-- Модальне вікно для кнопки "Купити" -->
<!-- Модальне вікно для кнопки "Купити" -->
<div id="buyModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('buyModal')">&times;</span>
        <h2>Заповніть форму для покупки</h2>
        <form id="buyForm">
            <div class="form-row">
                <label for="firstName">Ім'я:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-row">
                <label for="lastName">Прізвище:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            <div class="form-row">
                <label for="phone">Номер телефону:</label>
                <div style="display: flex;">
                    <select id="phoneCode" name="phoneCode" required>
                        <option value="+380">+380</option>
                        <option value="+231">+231 | Ліберія</option>
                        <option value="+223">+223 | Малі</option>
                        <option value="+1264">+1264 | Англія</option>
                        <option value="+3395">+3395 | Корсика</option>
                    </select>
                    <input type="tel" id="phone" name="phone" required style="flex: 1;">
                </div>
            </div>
            <div class="form-row">
                <label for="city">Місто:</label>
                <input type="text" id="city" name="city" required>
            </div>
            <div class="form-row">
                <label for="postOffice">Номер відділення пошти:</label>
                <input type="text" id="postOffice" name="postOffice" required>
            </div>
            <div class="form-row">
                <label for="postomatAddress">Адреса поштомату:</label>
                <input type="text" id="postomatAddress" name="postomatAddress" required>
            </div>
            <button type="submit">Купити</button>
            <p id="successMessage" style="color: green; font-weight: bold; display: none;">Замовлення успішно оформлено!</p>
        </form>
    </div>
</div>

<script>
    document.getElementById("buyForm").addEventListener("submit", function(event) {
        event.preventDefault();
        document.getElementById("successMessage").style.display = "block";
    });
</script>

<style>
    .form-row {
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
    }
    .form-row label {
        margin-bottom: 5px;
    }
    .form-row input {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>
<div id="buyModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('buyModal')">&times;</span>
        <h2>Заповніть форму для покупки</h2>
        <label for="name">Ім'я:</label>
        <input type=
        "text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="phone">Телефон:</label>
        <input type="tel" id="phone" name="phone" required>
        <label for="city">Місто:</label>
        <input type="text" id="city" name="city" required>
        <label for="postOffice">Номер відділення пошти:</label>
        <input type="text" id="postOffice" name="postOffice" required>
        <label for="postomat">Номер відділення поштомату:</label>
        <input type="text" id="postomat" name="postomat" required>
        <button type="submit">Купити</button>
    </div>
</div>
<style>
    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .book-card {
        background: linear-gradient(to right,  #5900ff, #000000);
        border: 1px solid #000000;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        margin: 5px;
        padding: 5x;
        width: calc(33.333% - 20px);
        box-sizing: border-box;
    }
    .book-card img {
        max-width: 100%;
        border-radius: 10px;
    }
    .book-card h3 {
        margin: 10px 0;
    }
    .book-card p {
        margin: 5px 0;
    }
    .book-card .price {
        font-weight: bold;
        color: #ffffff;
    }
    .book-card .btn {
        display: inline-block;
        margin: 5px 0;
        padding: 10px 15px;
        background: linear-gradient(to right, #000000, #5900ff);
        color: white;
        text-decoration: none;
        border-radius: 10px;
        text-align: center;
        margin-left: -15px;
    }
</style>
    <!-- Модальне вікно для кнопки "Читати онлайн" -->
    <div id="readModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('readModal')">&times;</span>
            <h2>Читати онлайн</h2>
            <img src="https://nashformat.ua/files/products_preview_resized/p709042/04.1024x1024.jpg" alt="Сторінка книги">
            <img src="https://nashformat.ua/files/products_preview_resized/p709042/05.1024x1024.jpg" alt="Сторінка книги">
        </div>
        </div>
    </div>

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
            position: relative;
        }
        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close-btn:hover,
        .close-btn:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(event) {
                if (this.textContent === 'Купити') {
                    openModal('buyModal');
                } else if (this.textContent === 'Читати онлайн') {
                    openModal('readModal');
                }
            });
        });
    </script>
    <!-- Модальне вікно для кнопки "Відгук" -->
    <div id="reviewModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('reviewModal')">&times;</span>
            <h2>Відгук</h2>
            <img id="reviewBookImage" src="" alt="Зображення книги" style="max-width: 100%; border-radius: 10px;">
            <div id="commentsSection">
                <h3>Коментарі:</h3>
                <div id="commentsList">
                    <!-- Коментарі будуть додаватися тут -->
                </div>
            </div>
            <label for="reviewerName">Ваше ім'я:</label>
            <input type="text" id="reviewerName" name="reviewerName" required>
            <label for="review">Ваш відгук:</label>
            <textarea id="review" name="review" rows="4" style="width: 100%;" required></textarea>
            <button type="button" onclick="submitReview()">Надіслати</button>
        </div>
    </div>

    <script>
        function openReviewForm() {
            const bookCard = event.target.closest('.book-card');
            const bookImage = bookCard.querySelector('img').src;
            document.getElementById('reviewBookImage').src = bookImage;
            openModal('reviewModal');
        }

        function submitReview() {
            const reviewerName = document.getElementById('reviewerName').value.trim();
            const reviewText = document.getElementById('review').value.trim();

            if (reviewerName && reviewText) {
                const comment = document.createElement('div');
                comment.innerHTML = `<strong>${reviewerName}:</strong> <p>${reviewText}</p>`;
                document.getElementById('commentsList').appendChild(comment);

                document.getElementById('reviewerName').value = '';
                document.getElementById('review').value = '';
            } else {
                alert('Будь ласка, заповніть всі поля.');
            }
        }
    </script>
    <script>
        function searchBook() {
            const query = document.getElementById('searchInput').value.trim().toLowerCase();
            const books = document.querySelectorAll('.book-card');
            let found = false;

            books.forEach(book => {
                const title = book.querySelector('h3').textContent.toLowerCase();
                if (title.includes(query)) {
                    book.style.display = 'block';
                    found = true;
                } else {
                    book.style.display = 'none';
                }
            });

            if (!found) {
                alert('Книгу не знайдено');
            }
        }
    </script>
    <script>
        function filterBooksByCategory(category) {
            const books = document.querySelectorAll('.book-card');
    
            // Всі категорії та відповідні книги
            const categories = {
                'Фантастика': ['Макова війна', 'Розсікаючи хвилі', 'Пригоди української літератури','Світло в темряві', 'По той бік чарівної палички. Магія і хаос мого дорослішання','Дрімаючий демон Декстера'],
                'Романтика': ['Розсікаючи хвилі', 'Це те, що вас зцілить, коли будете готові', 'Із крові й попелу', 'Tokyo Ghoul','Evangelion' ,'Дюна'],
                'Детективи': ['Світло в темряві', 'Ніколи не бреши', 'Багряні Ріки', 'Танець Недоумка', 'Переслідування Аделіни', 'Дрімаючий демон Декстера'],
                'Наукова література': ['Життя в середньовічному замку', 'Це те, що вас зцілить, коли будете готові', 'Мистецтво й створення серіалу Аркейн', 'Палюче тепло вб’є нас найперше', 'Пригоди української літератури','Ніколи не бреши'],
                'Манга': ['Гра Друзів', 'Berserk', 'One Piece', 'Jujutsu Kaisen', 'Chainsaw Man', 'Attack On Titan']
            };
    
            // Ховаємо всі книги
            books.forEach(book => book.style.display = 'none');
    
            // Отримуємо список книг для вибраної категорії
            const selectedBooks = categories[category] || [];
    
            // Відображаємо лише відповідні книги
            let found = false;
            books.forEach(book => {
                const title = book.querySelector('h3').textContent;
                if (selectedBooks.includes(title)) {
                    book.style.display = 'block';
                    found = true;
                }
            });
    
        }
    
        // Додаємо обробник подій для випадаючого списку категорій
        document.querySelectorAll('.category-dropdown a').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                filterBooksByCategory(this.textContent);
            });
        });
    </script>
    
    </script>
    </script>
   
     <!--  
     <div id="welcomeModal" class="modal">
        <div class="modal-content">
            <img src="C:/JS/images/logo.jpg" 
            alt="Welcome Image" style="max-width: 100%; border-radius: 10px;">
        </div>
    </div> -->

    <script>
        
        // Відкриваємо вспливаюче вікно при завантаженні сторінки
        window.onload = function() {
            const welcomeModal = document.getElementById('welcomeModal');
            welcomeModal.style.display = 'block';

            // Закриваємо вспливаюче вікно через 3 секунди
            setTimeout(function() {
                welcomeModal.style.display = 'none';
            }, 3000);
        };
    </script>

   
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: linear-gradient(to right, #5900ff, #000000);
            margin: 15% auto;
            padding: 20px;
            border: 10px solid #ffffff;
            width: 90%;
            max-width: 500px;
            border-radius: 50px;
            position: relative;
            animation: zoomIn 2s forwards;
        }
        @keyframes zoomIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
    
<style>
    .account-button {
        background: #000000;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        border-radius: 20px;
        display: flex;
        align-items: center;
        font-size: 16px;
        position: fixed;
        bottom: 20px;
        right: 20px;
        box-shadow: 0 2px 5px rgb(255, 255, 255);
        transition: transform 0.3s ease;
    }
    .account-button:hover {
        transform: scale(1.1);
    }
    .account-button::before {
        content: "👤";
        margin-right: 8px;
    }
</style>
<!-- Removed duplicate button -->

<!-- Модальне вікно для Логіну -->
<div id="accountModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('accountModal')">&times;</span>
        <h1>Login Form</h1>
        <form>
            <div class="form-control">
                <input type="text" required>
                <label>Email</label>
            </div>
            <div class="form-control">
                <input type="password" required>
                <label>Password</label>
            </div>
            <button class="btn" onclick="loginUser(event)">Login</button>
            <p class="text">Don't have an account? <a href="#" onclick="showRegisterModal()">Register</a></p>
        </form>
    </div>
</div>

<!-- Модальне вікно для Реєстрації -->
<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('registerModal')">&times;</span>
        <h1>Register Form</h1>
        <form>
            <div class="form-control">
                <input type="text" required>
                <label>Name</label>
            </div>
            <div class="form-control">
                <input type="email" required>
                <label>Email</label>
            </div>
            <div class="form-control">
                <input type="tel" required>
                <label>Phone</label>
            </div>
            <div class="form-control">
                <input type="password" required>
                <label>Password</label>
            </div>
            <button class="btn" onclick="registerUser(event)">Register</button>
        </form>
    </div>
</div>

<div class="header">
    <!-- Кнопка профілю користувача -->
    <button class="category-button account-button" onclick="openAccountModal()">Мій аккаунт</button>
    <div class="category-dropdown" id="profileDropdown">
        <a href="#" onclick="openSettings()">Налаштування</a>

        <a href="#" onclick="openPromoCode()">Промокод</a>
    </div>
</div>



<!-- Модальне вікно для промокоду -->
<div id="promoCodeModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('promoCodeModal')">&times;</span>
        <h2>Введіть промокод</h2>
        <input type="text" id="promoCodeInput" placeholder="Введіть промокод">
        <button onclick="applyPromoCode()">Застосувати</button>
        <p id="promoCodeMessage"></p>
    </div>
</div>

<script>
    function openPromoCode() {
        openModal('promoCodeModal');
    }

    function applyPromoCode() {
        const promoCode = document.getElementById('promoCodeInput').value.trim();
        const promoCodeMessage = document.getElementById('promoCodeMessage');

        if (promoCode === 'DISCOUNT50') {
            promoCodeMessage.textContent = 'Промокод застосовано! Ви отримали знижку 50%';
            promoCodeMessage.style.color = 'green';

            // Додаємо етикетку зі знижкою до кожної книги
            const books = document.querySelectorAll('.book-card');
            books.forEach(book => {
                if (!book.querySelector('.discount-label')) {
                    const discountLabel = document.createElement('img');
                    discountLabel.src = 'https://png.pngtree.com/png-vector/20210129/ourlarge/pngtree-50-percent-discount-offer-png-image_2858029.jpg';
                    discountLabel.alt = 'Знижка 50%';
                    discountLabel.classList.add('discount-label');
                    book.appendChild(discountLabel);
                }

                // Додаємо знижку до ціни
                const priceElement = book.querySelector('.price');
                if (priceElement && !priceElement.querySelector('.discounted-price')) {
                    const originalPrice = parseFloat(priceElement.textContent.replace('Ціна: ', '').replace(' грн', ''));
                    const discountedPrice = originalPrice * 0.5;
                    const discountedPriceElement = document.createElement('span');
                    discountedPriceElement.classList.add('discounted-price');
                    discountedPriceElement.style.color = 'red';
                    discountedPriceElement.style.textDecoration = 'line-through';
                    discountedPriceElement.style.marginLeft = '10px';
                    discountedPriceElement.textContent = `${originalPrice} грн`;
                    priceElement.textContent = `Ціна: ${discountedPrice} грн`;
                    priceElement.appendChild(discountedPriceElement);
                }
            });
        } else {
            promoCodeMessage.textContent = 'Невірний промокод. Спробуйте ще раз.';
            promoCodeMessage.style.color = 'red';
        }
    }

    document.getElementById("buyForm").addEventListener("submit", function(event) {
        event.preventDefault();
        document.getElementById("successMessage").style.display = "block";

        // Видаляємо знижку після оформлення замовлення
        const books = document.querySelectorAll('.book-card');
        books.forEach(book => {
            const discountLabel = book.querySelector('.discount-label');
            if (discountLabel) {
                discountLabel.remove();
            }

            const priceElement = book.querySelector('.price');
            const discountedPriceElement = priceElement.querySelector('.discounted-price');
            if (discountedPriceElement) {
                const originalPrice = discountedPriceElement.textContent.replace(' грн', '');
                priceElement.textContent = `Ціна: ${originalPrice} грн`;
            }
        });
    });
</script>
</script>
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.5);
    }

    .modal-content {
        background-color: white;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 10px;
        position: relative;
    }

    .close-btn {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .discount-label {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .book-card {
        position: relative; /* Додаємо відносне позиціонування для батьківського елемента */
        background: linear-gradient(to right, #5900ff, #000000);
        border: 1px solid #000000;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        margin: 5px;
        padding: 5px;
        width: calc(33.333% - 20px);
        box-sizing: border-box;
    }

    .book-card img {
        max-width: 100%;
        border-radius: 10px;
    }

    .book-card h3 {
        margin: 10px 0;
    }

    .book-card p {
        margin: 5px 0;
    }

    .book-card .price {
        font-weight: bold;
        color: #ffffff;
    }

    .book-card .btn {
        display: inline-block;
        margin: 5px 0;
        padding: 10px 15px;
        background: linear-gradient(to right, #000000, #5900ff);
        color: white;
        text-decoration: none;
        border-radius: 10px;
        text-align: center;
        margin-left: -15px;
    }
</style>


<!-- Модальне вікно для Налаштувань -->
<!-- Модальне вікно для Налаштувань -->
<div id="settingsModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('settingsModal')">&times;</span>
        <h2>Налаштування профілю</h2>
        <form>
            <div class="form-group">
                <label for="settingsName">Нове ім'я:</label>
                <input type="text" id="settingsName" name="settingsName" required>
            </div>

            <div class="form-group">
                <label for="settingsEmail">Нова електронна пошта:</label>
                <input type="email" id="settingsEmail" name="settingsEmail" required>
            </div>

            <div class="form-group">
                <label for="settingsPhone">Новий номер телефону:</label>
                <input type="tel" id="settingsPhone" name="settingsPhone" required>
            </div>

            <div class="form-group">
                <label for="currentPassword">Поточний пароль:</label>
                <input type="password" id="currentPassword" name="currentPassword" required>
            </div>

            <div class="form-group">
                <label for="newPassword">Новий пароль:</label>
                <input type="password" id="newPassword" name="newPassword">
            </div>

            <button type="button" class="account-button" onclick="updateProfile()">Зберегти</button>
        </form>
    </div>
</div>
<style>
/* Стиль для модального вікна */



/* Стиль для форми */
.form-group {
    display: flex;
    flex-direction: column;
    text-align: left;
    margin-bottom: 15px;
}

.form-group label {
    margin-bottom: 5px;
    font-size: 14px;


}
#settingsModal .modal-content {
    background: url("https://i.7fon.org/1000/w685897434.jpg")no-repeat;
    padding: 20px;
    border-radius: 10px;
    color: white; /* Зробити текст білим для контрасту */
}

.form-group input {
    width: 100%;
    padding: 8px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
}
#settingsModal .account-button {
    position: relative;  /* Якщо потрібно, можна змінити на absolute */
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80%; /* Або підлаштуй під потрібний розмір */
    margin-top: 15px; /* Щоб відокремити від полів */
    transition: transform 0.2s ease-in-out, width 0.2s ease-in-out;
}
#settingsModal form {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    height: 100%;
}
#settingsModal .account-button:hover {
    transform: translateX(-50%) scale(0.9); /* Зменшує кнопку при наведенні */
    width: 70%;
}
/* Стиль для модального вікна промокоду */
/* Стиль для модального вікна промокоду */
/* Стиль для модального вікна промокоду */
#promoCodeModal {
    display: none;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

#promoCodeModal.active {
    display: flex;
}

#promoCodeModal .modal-content {
    background: url("https://i.7fon.org/1000/w685897434.jpg") no-repeat center;
    background-size: cover;
    padding: 20px;
    border-radius: 10px;
    color: white; /* Зробити текст білим для контрасту */
    text-align: center;
    width: 300px;
    position: relative;
}

#promoCodeModal h2 {
    font-size: 18px;
    margin-bottom: 10px;
}

#promoCodeModal input {
    width: 100%;
    padding: 8px;
    border: none;
    border-radius: 10px;
    font-size: 14px;
    margin-bottom: 10px;
    text-align: center;
    background-color:  linear-gradient(to right, #5900ff, #000000);
    
}

#promoCodeModal button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    background: linear-gradient(to right, #5900ff, #000000);
    color: white;
    cursor: pointer;
    transition: transform 0.2s ease-in-out;
}

#promoCodeModal button:hover {
    transform: scale(0.95);
} 

#promoCodeModal .close-btn {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    cursor: pointer;
    color: white;
}

#promoCodeMessage {
    margin-top: 10px;
    font-size: 14px;
}






</style>
        <script>
            function updateProfile() {
                const newName = document.getElementById('settingsName').value.trim();
                const newEmail = document.getElementById('settingsEmail').value.trim();
                const newPhone = document.getElementById('settingsPhone').value.trim();
                const currentPassword = document.getElementById('currentPassword').value.trim();
                const newPassword = document.getElementById('newPassword').value.trim();
                const user = users.find(user => user.password === currentPassword);

                if (user) {
                    user.name = newName;
                    user.email = newEmail;
                    user.phone = newPhone;
                    if (newPassword) {
                        user.password = newPassword;
                    }
                    alert('Профіль оновлено успішно!');
                    updateAccountButton(newName); // Оновлення кнопки з новим ім'ям
                    closeModal('settingsModal');
                } else {
                    alert('Невірний пароль. Будь ласка, спробуйте ще раз.');
                }
            }
        </script>
    </div>
</div>




<script>
    function openSettings() {
        closeAllDropdowns();
        document.getElementById('settingsModal').style.display = 'block';
    }

   
   

   

    function closeAllDropdowns() {
        const dropdowns = document.querySelectorAll('.category-dropdown');
        dropdowns.forEach(dropdown => {
            dropdown.style.display = 'none';
        });
    }
</script>

<style>
    .menu-item {
        color: #FF6347; /* Теплий червоний колір */
        text-decoration: none;
        font-size: 18px;
        font-weight: bold;
    }

    .menu-item:hover {
        color: #000000; /* Колір при наведенні (фіолетовий) */
        text-decoration: underline; /* Підкреслення при наведенні */
    }

    .category-dropdown {
        display: none;
        position: absolute;
        background-color: white;
        box-shadow: 0px 8px 16px rgba(0, 98, 255, 0.2);
        z-index: 1;
        min-width: 200px;
        top: 40px;
        right: 20px; /* Вирівнювання підкаталогу під кнопку */
    }

    .category-dropdown a {
        padding: 12px 16px;
        display: block;
        background: linear-gradient(to right, #5900ff, #000000);
        text-decoration: none;
        color: white; /* Стандартний колір */
        transition: color 0.3s ease; /* Плавний ефект зміни кольору */
    }

    .category-dropdown a:hover {
        color: rgb(0, 0, 0); /* Колір тексту при наведенні */
        background-color: rgba(0, 30, 255, 0.2); /* Легка підсвітка фону */
    }
</style>

<script>
    const users = [];

    // Відкриття модального вікна
    function openAccountModal() {
        document.getElementById('accountModal').style.display = 'block';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }

    function registerUser(event) {
    event.preventDefault();
    
    const name = document.querySelector('#registerModal input[type="text"]').value.trim();
    const email = document.querySelector('#registerModal input[type="email"]').value.trim();
    const phone = document.querySelector('#registerModal input[type="tel"]').value.trim();
    const password = document.querySelector('#registerModal input[type="password"]').value.trim();

    if (name && email && phone && password) {
        // Відправляємо дані в PHP через fetch()
        fetch('register.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&phone=${encodeURIComponent(phone)}&password=${encodeURIComponent(password)}`
        })
        .then(response => response.text())
        .then(data => {
            if (data === "success") {
                alert('Реєстрація успішна!');
                closeModal('registerModal');
                updateAccountButton(name); // Оновлюємо кнопку з ім'ям користувача
            } else {
                alert('Помилка реєстрації: ' + data);
            }
        })
        .catch(error => console.error('Помилка:', error));
    } else {
        alert('Будь ласка, заповніть всі поля.');
    }
}


// Логин пользователя
    function loginUser(event) {
    event.preventDefault();
    const email = document.querySelector('#accountModal input[type="text"]').value.trim();
    const password = document.querySelector('#accountModal input[type="password"]').value.trim();

    if (!email || !password) {
        alert('Будь ласка, заповніть всі поля.');
        return;
    }

    fetch('login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`Ласкаво просимо, ${data.name}!`);
            closeModal('accountModal');
            updateAccountButton(data.name);
        } else {
            alert('Невірний email або пароль.');
        }
    })
    .catch(error => console.error('Помилка:', error));
}

    function updateAccountButton(username) {
    const accountButton = document.querySelector('.account-button');
    
    if (username) {
        accountButton.innerHTML = `<span class="user-icon">👤</span> ${username} <span class="dropdown-icon">▼</span>`;
        accountButton.setAttribute('onclick', 'toggleDropdown()'); // Відкриває меню
    } else {
        accountButton.innerHTML = 'Мій аккаунт';
        accountButton.setAttribute('onclick', 'openAccountModal()'); // Відкриває модальне вікно входу
    }
}



    // Показати підкаталоги при натисканні на кнопку
    function toggleDropdown() {
        const profileDropdown = document.getElementById('profileDropdown');
        profileDropdown.style.display = (profileDropdown.style.display === 'block') ? 'none' : 'block';
    }

    // Показати форму реєстрації замість логіну
    function showRegisterModal() {
        closeModal('accountModal');
        document.getElementById('registerModal').style.display = 'block';
    }

    // Закриваємо меню профілю, якщо користувач клацає поза ним
    window.onclick = function(event) {
        if (!event.target.matches('.account-button')) {
            const profileDropdown = document.getElementById('profileDropdown');
            if (profileDropdown.style.display === 'block') {
                profileDropdown.style.display = 'none';
            }
        }
    };
</script>


<style>
    .account-button {
        background: linear-gradient(to right, #5900ff, #000000);
        /* Встановлює градієнтний фон для кнопки */
        border: none;
        /* Видаляє рамку кнопки */
        padding: 10px 15px;
        /* Встановлює внутрішні відступи кнопки */
        cursor: pointer;
        /* Змінює курсор на вказівник при наведенні */
        border-radius: 20px;
        /* Закруглює кути кнопки */
        display: flex;
        /* Встановлює флекс-бокс для кнопки */
        align-items: center;
        /* Вирівнює елементи по вертикалі в центрі */
        font-size: 16px;
        /* Встановлює розмір шрифту */
        position: fixed;
        /* Фіксує позицію кнопки на екрані */
        bottom: 650px;
        /* Встановлює відступ від нижнього краю */
        right: 10px;
        /* Встановлює відступ від правого краю */
        box-shadow: 0 2px 5px rgb(85, 0, 255);
        /* Додає тінь до кнопки */
        transition: transform 0.3s ease;
        /* Додає плавний перехід для трансформації */
        color: white;
        /* Встановлює білий колір тексту */
    }
    .account-button:hover {
        transform: scale(1.1);
        /* Збільшує кнопку при наведенні */
    }
    .account-button::before {
        content: "👤";
        /* Додає іконку перед текстом кнопки */
        margin-right: 8px;
        /* Встановлює відступ праворуч від іконки */
    }
    .modal {
        display: none;
        /* Ховає модальне вікно за замовчуванням */
        position: fixed;
        /* Фіксує позицію модального вікна на екрані */
        z-index: 1000;
        /* Встановлює високий рівень накладання */
        left: 0;
        /* Встановлює відступ від лівого краю */
        top: 0;
        /* Встановлює відступ від верхнього краю */
        width: 100%;
        /* Встановлює ширину на 100% */
        height: 100%;
        /* Встановлює висоту на 100% */
        overflow: auto;
        /* Додає прокрутку, якщо вміст перевищує висоту */
        background-color: rgba(0,0,0,0.5);
        /* Встановлює напівпрозорий чорний фон */
    }
    .modal-content {
        background: url('https://png.pngtree.com/background/20210715/original/pngtree-blue-and-white-abstract-gradient-background-picture-image_1266439.jpg') no-repeat;
        /* Встановлює фонове зображення для модального вікна */
        margin: 15% auto;
        /* Встановлює відступи та центрує модальне вікно */
        padding: 40px;
        /* Встановлює внутрішні відступи */
        border: 1px solid #888;
        /* Встановлює рамку */
        width: 80%;
        /* Встановлює ширину на 80% */
        max-width: 400px;
        /* Встановлює максимальну ширину */
        border-radius: 10px;
        /* Закруглює кути */
        position: relative;
        /* Встановлює відносне позиціонування */
        text-align: center;
        /* Вирівнює текст по центру */
        color: white;
        /* Встановлює білий колір тексту */
    }
    .close-btn {
        color: #aaa;
        /* Встановлює колір тексту */
        float: right;
        /* Вирівнює кнопку закриття праворуч */
        font-size: 28px;
        /* Встановлює розмір шрифту */
        font-weight: bold;
        /* Встановлює жирність шрифту */
        cursor: pointer;
        /* Змінює курсор на вказівник при наведенні */
    }
    .close-btn:hover,
    .close-btn:focus {
        color: black;
        /* Змінює колір тексту при наведенні та фокусі */
        text-decoration: none;
        /* Видаляє підкреслення тексту */
        cursor: pointer;
        /* Змінює курсор на вказівник при наведенні */
    }
    .form-control {
        position: relative;
        /* Встановлює відносне позиціонування */
        margin: 20px 0;
        /* Встановлює вертикальні відступи */
        width: 100%;
        /* Встановлює ширину на 100% */
    }
    .form-control input {
        width: 100%;
        /* Встановлює ширину на 100% */
        padding: 10px;
        /* Встановлює внутрішні відступи */
        border: none;
        /* Видаляє рамку */
        border-bottom: 2px solid rgb(255, 255, 255);
        /* Встановлює нижню рамку */
        background: transparent;
        /* Встановлює прозорий фон */
        color: rgb(252, 252, 252);
        /* Встановлює білий колір тексту */
        font-size: 18px;
        /* Встановлює розмір шрифту */
        outline: none;
        /* Видаляє обведення при фокусі */
    }
    .form-control label {
        position: absolute;
        /* Встановлює абсолютне позиціонування */
        top: 50%;
        /* Встановлює відступ від верхнього краю */
        left: 10px;
        /* Встановлює відступ від лівого краю */
        transform: translateY(-50%);
        /* Центрує по вертикалі */
        color: rgb(255, 255, 255);
        /* Встановлює білий колір тексту */
        transition: 0.3s ease-in-out;
        /* Додає плавний перехід */
    }
    .form-control input:focus + label,
    .form-control input:valid + label {
        top: 10px;
        /* Зміщує мітку вгору */
        font-size: 14px;
        /* Зменшує розмір шрифту */
        color: blue;
        /* Змінює колір тексту */
    }
    .short-description, .full-description {
        color: white;
        /* Встановлює білий колір тексту */
    }
    .btn {
        display: block;
        /* Встановлює блочний елемент */
        width: 90%;
        /* Встановлює ширину на 90% */
        padding: 10px;
        /* Встановлює внутрішні відступи */
        background-image: linear-gradient(to right, #5900ff, #000000);
        /* Встановлює градієнтний фон */
        color: white;
        /* Встановлює білий колір тексту */
        border: none;
        /* Видаляє рамку */
        border-radius: 25px;
        /* Закруглює кути */
        font-size: 16px;
        /* Встановлює розмір шрифту */
        cursor: pointer;
        /* Змінює курсор на вказівник при наведенні */
        transition: 0.3s;
        /* Додає плавний перехід */
        text-align: center;
        /* Вирівнює текст по центру */
        margin: 5px auto;
        /* Встановлює вертикальні відступи та центрує */
        position: relative;
        /* Встановлює відносне позиціонування */
        left: 20px;
        /* Зміщує кнопку праворуч */
    }
    .btn:hover {
        background-color: transparent;
        /* Змінює фон на прозорий при наведенні */
        color: blue;
        /* Змінює колір тексту на синій */
        border: 2px solid blue;
        /* Додає синю рамку */
    }
    .text {
        margin-top: 20px;
        /* Встановлює верхній відступ */
    }
    .text a {
        color: blue;
        /* Встановлює синій колір тексту */
        text-decoration: none;
        /* Видаляє підкреслення тексту */
    }
    .text a:hover {
        text-decoration: underline;
        /* Додає підкреслення при наведенні */
    }
    .menu-item {
        color: #FF6347;
        /* Встановлює теплий червоний колір тексту */
        text-decoration: none;
        /* Видаляє підкреслення тексту */
        font-size: 18px;
        /* Встановлює розмір шрифту */
        font-weight: bold;
        /* Встановлює жирність шрифту */
    }
    .menu-item:hover {
        color: #5900ff;
        /* Змінює колір тексту при наведенні */
        text-decoration: underline;
        /* Додає підкреслення при наведенні */
    }
    .dropdown-content {
        display: none;
        /* Ховає випадаюче меню за замовчуванням */
        position: absolute;
        /* Встановлює абсолютне позиціонування */
        background-color: #f9f9f9;
        /* Встановлює світло-сірий фон */
        min-width: 160px;
        /* Встановлює мінімальну ширину */
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        /* Додає тінь */
        z-index: 1;
        /* Встановлює рівень накладання */
    }
    .dropdown-content a {
        color: black;
        /* Встановлює чорний колір тексту */
        padding: 12px 16px;
        /* Встановлює внутрішні відступи */
        text-decoration: none;
        /* Видаляє підкреслення тексту */
        display: block;
        /* Встановлює блочний елемент */
    }
    .dropdown-content a:hover {
        background-color: #f1f1f1;
        /* Змінює фон при наведенні */
    }
    .dropdown:hover .dropdown-content {
        display: block;
        /* Показує випадаюче меню при наведенні */
    }
</style>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пошук книг</title>
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(to right, #000000, #5900ff);
    color: white;
    
}