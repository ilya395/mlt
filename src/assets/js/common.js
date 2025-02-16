//////////////////////////////////////////////////////////////////////////////
////////////////////////////// объекты/модули ////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

const NAME_OF_PRISE = `export.csv`;
const URL_TO_PRISE = `${window.wp.theme_url}/documents/${NAME_OF_PRISE}`;
const AJAX_REQUEST_CONTENT_DATA = 'ajax_request_content';
const AJAX_REQUEST_SUBMIT_FORM = 'ajax_submit_form';

const templateForm = (obj) => {
    const html =  `
    <div class="form-block">
        <div class="form-block__title">
            ${ obj.title }
        </div>
        <div class="form-block__sub-title">
            ${ obj.subTitle }
        </div>
        <form class="form-block__content">
            <input type="hidden" name="title">
            <div class="form-block__field">
                <label for="name" class="form-block__label">
                    Ваше имя
                </label>
                <input type="text" id="name" name="name" class="form-block__input name">
            </div>
            <div class="form-block__field">
                <label for="phone" class="form-block__label">
                    Ваш телефон
                </label>
                <input type="tel" id="phone" name="phone" class="form-block__input phone phonemask">
            </div>
            <div class="form-block__field">
                <label for="email" class="form-block__label">
                    Ваш email
                </label>
                <input type="email" id="email" name="email" class="form-block__input phone">
            </div>
            <button class="form-block__button simple-button simple-button_for-form">
                Отправить
            </button>
            <div class="form-block__messages">
                <div class="form-block__success">
                    <span>
                        Благодарим за заявку!
                    </span>
                </div>
            </div>
        </form>
        <a href="#" class="modal-content__warning">
            Нажимая на кнопку, вы даете согласие на обработку персональных данных и соглашаетесь c политикой конфиденциальности
        </a>
    </div>`;
    return html;
}

const templateContent = (obj) => {
    const html = `
        <div class="interactive-content">
            <div class="interactive-content__preview">
                <img src="${obj.preview}" >
            </div>
            <div class="interactive-content__title">
                <h3 class="h3 interactive-content__title-wrap ${ obj.title ? '' : 'not-visible' }">
                    ${obj.title}
                </h3>
            </div>
            <div class="interactive-content__sub-title ${ obj.subTitle ? '' : 'not-visible' }">
                ${obj.subTitle}
            </div>
            <div class="interactive-content__body ${ obj.content ? '' : 'not-visible' }">
                ${obj.content}
            </div>
        </div>
    `;
    return html;
}

const templateModal = `
    <div class="modal__wrap">
        <div class="modal__close-btn">
            &times;
        </div>
        <div class="modal__container">
            <div class="content-loader light">
                <div class="loader__wrap">
                    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>
            </div>
        </div>
    </div>
`;

const contentBlock = function(object) {

    const {
        url, // куда кладем
        type, // тип контента
        id, // id контента
    } = object;
    const targetElem = document.querySelector(url);

    function buildContent(object) {
        targetElem.innerHTML = '';
        const html = templateContent(object);
        targetElem.innerHTML = html;
    }

    function fetchForm() {
        
        let sendAjax = function (formData) {
            fetch(
                window.wp.ajax_url, // '/wp-admin/admin-ajax.php', // точка входа
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded', // отправляемые данные 
                    },
                    body: formData
                }
            )
            .then(
                response => {
                    return response.json();
                }
            )
            .then(
                response => {
                    buildContent(response);
                }
            )
            .catch(
                error => {
                    console.error(error)
                }
            )
        }
        let formData = `action=${AJAX_REQUEST_CONTENT_DATA}&type=${type}&id=${id}`;
        if (
            type != '' && id != ''
        ) {
            sendAjax(formData);
        } else {
            console.log('lol kek chrburek');
        }
    }

    const methods = {
        init() {
            fetchForm();
        },
        clear() {
            console.log('clear contentBlock');
        }
    }
    return methods;
}

const FormInPage = function(object) {

    // let readyToDownload = false;

    const {
        url, // контейнер для формы
        title, // заголовок формы
        subTitle, //  подзаголовок
        formTitle, // в скрытое поле формы - заголовок формы
        readyToDownload = false, // будем скачивать или нет
    } = object;
    const formWrap = document.querySelector(url);

    function buildForm() {
        formWrap.innerHTML = '';
        const html = templateForm({title, subTitle});
        formWrap.innerHTML = html;
        formWrap.querySelector('form input[name="title"]').value = formTitle;
    }
    
    function movieSuccessMessage() {
        const successBlock = formWrap.querySelector('.form-block__content .form-block__success');
        
        function handle() {
            setTimeout(function(){
                function handle() {
                    successBlock.classList.remove('active');
                    //
                    successBlock.removeEventListener('transitionend', handle);                    
                }
                successBlock.addEventListener('transitionend', handle);
                successBlock.classList.remove('movie');
            }, 3000);
            //
            successBlock.removeEventListener('transitionend', handle);
        }

        successBlock.addEventListener('transitionend', handle);
        
        successBlock.classList.add('active');
        raf(function(){
            successBlock.classList.add('movie');            
        });

    }

    function _makingDownload(url) {
        // console.log('#### download: ', 'download start!');
        const a = document.createElement('a');
        a.style.display = 'none'
        a.href = url ? url : URL_TO_PRISE;
        a.download = url ? 'price' : NAME_OF_PRISE;
        document.body.appendChild(a);
        a.click();
        a.remove();
    }
    
    function fetchForm() {
        
        const name = formWrap.querySelector('form input[name="name"]');
        const phone = formWrap.querySelector('form input[name="phone"]');
        const title = formWrap.querySelector('form input[name="title"]');
        const email = formWrap.querySelector('form input[name="email"]');
        const button = formWrap.querySelector('form button');
        
        let sendAjax = function (formData) {
            fetch(
                window.wp.ajax_url, // '/wp-admin/admin-ajax.php', // точка входа
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded', // отправляемые данные 
                    },
                    body: formData
                }
            )
            .then(
                response => {
                    // console.log('Сообщение отправлено методом fetch')
                    return response.json()
                }
            )
            .then(
                response => {
                    // console.log(response)
                    movieSuccessMessage()
                    name.value = '';
                    phone.value = '';
                    email.value = '';

                    return response;
                }
            )
            .then(
                (response) => {
                    const { download } = response;
                    console.log(download)
                    readyToDownload == true ? _makingDownload(download) : console.log('simple form');
                }
            )
            .catch(
                error => {
                    console.error(error)
                }
            )
        }
        let formData = `action=${AJAX_REQUEST_SUBMIT_FORM}&name=${name ? name.value : ''}&phone=${phone ? phone.value : ''}&title=${title ? title.value : ''}&email=${email ? email.value : ''}`;
        if (
            name.value != '' && name.value.length < 25 && phone.value != '' && imOkey(phone.value) == true
        ) {
            sendAjax(formData);
        }
    }

    function _handler(e) {
        e.preventDefault();
        methods.submitForm();        
    }
    
    const methods = {
        buidtMyForm() {
            buildForm()
        },
        makeMasksInMyForm() {
            makeMasks()
        },
        submitForm() {
            fetchForm();
        },
        success() {
            
        },
        error() {
            
        },
        console() {
            event.preventDefault();
            let formData = `action=ajax_submit_form&name=${name ? name.value : ''}&phone=${phone ? phone.value : ''}&title=${title}`;
            // console.log(formData, button);
        },
        init() {
            formWrap.querySelector('button').addEventListener('click', _handler);
        },
        download() {
            _makingDownload();
        },
        clear() {
            formWrap.querySelector('button').removeEventListener('click', _handler);
        }
    }
    
    methods.buidtMyForm();
    methods.makeMasksInMyForm();

    // formWrap.querySelector('button').addEventListener('click', function(e){
    //     e.preventDefault();
    //     methods.submitForm();
    // });

    return methods;
}

let popupModal = function(object) {

    const {
        startElem, // жми на него
        titleMark, // метка заголовка
        content, // объект с контентом 
    } = object;
    let initObj = null;
    let element = null; // instance element

    function pasteModal() {
        const html = templateModal;
        element = document.createElement('div')
        element.classList.add('modal');
        element.innerHTML = html;
        document.querySelector('.work-area').append(element);        
    }

    function deleteThisModal() {
        initObj.clear();
        element.remove();
        // delete _int;
        
        // delete nitObj;
        initObj = null;
    }
    
    const methods = {
        create() {
            // console.log('paste modal');
            pasteModal();
        },
        open() {
            // console.log('open modal');
            const elemForMovie = document.querySelector('.modal');
            elemForMovie.classList.add('active');
            raf(function(){
                elemForMovie.classList.add('movie');
            });
            //
            const body = document.querySelector('body');
            body.classList.contains('hidden')
                ? body.classList.remove('hidden')
                : body.classList.add('hidden');
        },
        close() {
            // console.log('close modal');
            const elemForMovie = document.querySelector('.modal');
            function handlerCloseModal() {
                elemForMovie.classList.remove('active');
                //
                elemForMovie.removeEventListener('transitionend', handlerCloseModal)
            }
            elemForMovie.addEventListener('transitionend', handlerCloseModal)
            elemForMovie.classList.remove('movie');  
            //
            const body = document.querySelector('body');
            body.classList.contains('hidden')
                ? body.classList.remove('hidden')
                : body.classList.add('hidden');          
        },
        putListenerForClosing() {
            // console.log('start: putListenerForClosing');
            function handler(e) {
                // console.log(e.target);
                if (
                    e.target == document.querySelector('.modal .modal__close-btn')
                ) {
                    methods.close();
                    //
                    document.querySelector('.modal').removeEventListener('click', handler);
                    // console.log('end: putListenerForClosing'); 
                    //
                    deleteThisModal();
                }
            }
            document.querySelector('.modal').addEventListener('click', handler);             
        },
        makeContent() {
            const {data, object} = content;
            const {
                url, 
                ...props
            } = data;
            initObj = object({
                url,
                ...props
            });
            initObj.init();
        },
        init() {
            if (
                document.querySelector('.modal')
            ) {
                // console.log('окно есть');
                methods.open();
                // listenerForCloseBtn();
                methods.putListenerForClosing();
                // methods.makeContent();
            } else {
                // console.log('окна нет, сделаем');
                methods.create();
                methods.open();
                // listenerForCloseBtn();
                methods.putListenerForClosing();
                methods.makeContent();
            }
        }
    }
    
    // startElem.addEventListener('click', function(e){
    //     // console.log(e.target);
    //     methods.init();
    //     e.preventDefault();
    // })
    
    return methods;
}

const dropdown = function(object) {

    const {
        elemForClick,
        elemForMove,
    } = object;

    const methods = {
        open() {
            !elemForMove.classList.contains('active') ? elemForMove.classList.add('active') : elemForMove.classList.remove('active');
        },
        close() {
            elemForMove.classList.contains('active') ? elemForMove.classList.remove('active') : elemForMove.classList.add('active');
        },
        toggle() {
            elemForMove.classList.toggle('active');
        },
        init() {
            elemForClick.addEventListener('click', function(e) {
                if ( elemForClick.contains(e.target) ||  elemForClick == e.target) {
                    methods.toggle();
                }
            });
        },
        initForBurger() {
            elemForClick.addEventListener('click', function(e) {
                if ( elemForClick.contains(e.target) ||  elemForClick == e.target) {
                    methods.toggle();
                    //
                    const elemInHeader = document.querySelector('header');
                    elemInHeader.classList.contains('active') 
                        ? elemInHeader.classList.remove('active') 
                        : elemInHeader.classList.add('active');
                    //
                    const body = document.querySelector('body');
                    body.classList.contains('hidden')
                        ? body.classList.remove('hidden')
                        : body.classList.add('hidden'); 
                }
            });            
        }
    }

    return methods;
}

const slider = function(object) {

    const {
        urlToContainer,
        urlToItems,
        urlToDots,
    } = object;

    const container = document.querySelector(urlToContainer);
    const items = document.querySelectorAll(urlToItems);
    const dots = document.querySelectorAll(urlToDots);

    let startX,
        startY,
        distanceX, distanceY,
        minInterval = 150, // минимальное расстояние для swipe
        minTimeMovie = 400, // максимальное время прохождения установленного расстояния  
        startTime, // время контакта с поверхностью сенсора
        elapsedTime // время жизнь swipe

    function _openNewSlide(num) {
        // console.log(num);
        // dots
        dots.forEach((item, index) => {
            index == num ? item.classList.add('active') : item.classList.remove('active');
        });

        // items
        let activeItem = null;
        let activeIndex = 0;
        let nextItem = null;
        let nextIndex = num;
        items.forEach((item, index) => {
            // index == num ? item.classList.add('active', 'movie') : item.classList.remove('active', 'movie');

            //
            if (item.classList.contains('active')) {
                activeItem = item;
                activeIndex = index;
            }
            if (index == nextIndex) {
                nextItem = item;
            }
        });
        //
        function handler() {
            activeItem.classList.remove('active');
            //
            activeItem.removeEventListener('transitionend', handler);
            //
            nextItem.classList.add('active');
            raf(function() {
                nextItem.classList.add('movie');
            });
        }
        activeItem.addEventListener('transitionend', handler);
        activeItem.classList.remove('movie');
    }

    function move(option) {
        // console.log(option);
        let activeItem = 0;
        let activeIndex = 0;
        items.forEach((item, index) => {
            if (item.classList.contains('active')) {
                activeIndex = index;
                // item.classList.remove('active');
            }
        });

        let nextIndex = 0;

        nextIndex = option == 'forward' ? activeIndex + 1 : activeIndex - 1;
        // console.log(activeIndex, nextIndex);
        if (nextIndex > items.length - 1) {
            nextIndex = 0;
        }
        if (nextIndex < 0) {
            nextIndex = items.length - 1;
        }
        // console.log(activeIndex, nextIndex);
        _openNewSlide(nextIndex);
    }

    function _showMustGoOn(  
        distanceX, 
        distanceY
    ){  
            
        if(Math.abs(distanceX) > Math.abs(distanceY)){
            // листай
            if(distanceX > 0){
                // вправо
                // alert('вправо: ' + ' x: ' + distanceX + '; y: ' + distanceY);
                move('forward');
            }else{
                // влево
                // alert('влево: ' + '; x: ' + distanceX + '; y: ' + distanceY);
                move('back');
            }
        }else{
            // скроль
            if(distanceY > 0){
                // вниз
                // alert('вниз: ' + '; x: ' + distanceX + '; y: ' + distanceY);
                move('back');
            }else{
                // вверх
                // alert('вверх: ' + '; x: ' + distanceX + '; y: ' + distanceY);
                move('forward');
            }
        }   
        
    }

    function run() { // для свайпов

        const objectForSwipes = document.querySelector('.special-offer .special-offer__wrap-with-wrapper');

        // свайпы/swipes
        objectForSwipes.addEventListener('touchstart', function(e){

            console.log('### touchstart');
            
            // if (!document.querySelector('.menu-block').contains(event.target)) {
                let touchObject = e.changedTouches[0];
                distanceX = 0;
                distanceY = 0;
                startX = touchObject.pageX
                startY = touchObject.pageY
                startTime = new Date().getTime() // время контакта с поверхностью сенсора
                e.preventDefault();                
            // }

        }, false);
      
        objectForSwipes.addEventListener('touchmove', function(e){
            e.preventDefault() // отключаем стандартную реакцию скроллинга
        }, false)
      
        objectForSwipes.addEventListener('touchend', function(e){

            console.log('#### touchend');

            // if (!document.querySelector('.menu-block').contains(event.target)) {
                let touchObject = e.changedTouches[0];
                distanceX = touchObject.pageX - startX; // получаем пройденную дистанцию
                distanceY = touchObject.pageY - startY;
                elapsedTime = new Date().getTime() - startTime; // узнаем пройденное время
                // проверяем затраченное время,горизонтальное перемещение >= minInterval, и вертикальное перемещение <= 100
                // var swiperightBol = (elapsedTime <= minTimeMovie && dist >= minInterval && Math.abs(touchObject.pageY - startY) <= 100);
                // console.log(elapsedTime, Math.abs(distanceX), distanceX);
                if (
                    elapsedTime <= minTimeMovie
                    && Math.abs(distanceY) <= 100
                    && Math.abs(distanceX) >= minInterval
                ) {
                    // console.log('#### _showMustGoOn: GO!');
                    _showMustGoOn(distanceX, distanceY);
                }
                e.preventDefault();
            // }
            
        }, false)
    }

    function jump() { // для дотов
        function handle(e) {
            const i = this;
            // console.log(e.target, this);

            _openNewSlide(i);
        }

        for (let i = 0; i < dots.length; i++) {
            dots[i].addEventListener('click', handle.bind(i));
        }
    }

    const methods = {
        init() {
            // клики на доты
            jump();
        },
        initWithSwipe() {
            // клики на доты
            jump();
            // свайпы влево-вправо
            run();
        }
    }
    return methods;
}

//////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// логика ///////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

window.addEventListener('DOMContentLoaded', function() {

});

window.addEventListener('load', () => {

    // большой лоадер
    const loader = document.getElementById('loader');
    function handler() {
        loader.classList.add('not-loader');
        //
        loader.removeEventListener('transitionend', handler);
    }
    loader.addEventListener('transitionend', handler);
    loader.classList.add('transparent');

    // бургер меню
    const burgerBtn = document.querySelector('.burger-button__wrap');
    const burger = dropdown({
        elemForClick: burgerBtn,
        elemForMove: document.getElementById('top-menu'),            
    });
    burger.initForBurger();

    if (window.location.pathname == '/') {
        const projects = document.querySelectorAll('article[data-object="content"]');

        projects.forEach(item => {
            function handler(e) {
                e.preventDefault();

                if (
                    item == e.target || item.contains(e.target)
                ) {
                    const element = e.target;

                    const modalForContent = popupModal({
                        startElem: element,
                        titleMark: '', // element.dataset.title,
                        content: {
                            object: contentBlock,
                            data: {
                                url: '.modal__wrap .modal__container',
                                // title: 'Ваша заявка',
                                // subTitle: 'Оставьте Ваши контактные данные, и мы свяжемся с Вами в ближайшее время',
                                // formTitle: element.dataset.title,
                                // readyToDownload: false,
                                type: item.dataset.type,
                                id: +item.dataset.id,
                            },
                        },        
                    });
        
                    modalForContent.init();
                }

            }
            item.addEventListener('click', handler);
        });

        //
        if (window.innerWidth >= 1200) {
            const sliderWithProjects = slider({
                urlToContainer: '.our-projects .our-projects__our-project',
                urlToItems: '.our-projects .our-project__container',
                urlToDots: '.our-projects .dots-bar__item',            
            });
            sliderWithProjects.init();
        }
        if (window.innerWidth < 768) {
            const sliderWithOffers = slider({
                urlToContainer: '.special-offer .special-offer__wrap-with-offers',
                urlToItems: '.special-offer .special-offer__offer-item',
                urlToDots: '.special-offer .dots-bar__item', 
            });
            sliderWithOffers.initWithSwipe();
        }

    }

    if (window.location.pathname == '/contacts/') {
        const formOnContactPage = FormInPage({
            url: '.contacts .contacts__content-part.contacts__form',
            title: 'Ваша заявка', // заголовок формы
            subTitle: 'Оставьте Ваши контактные данные, и мы свяжемся с Вами в ближайшее время', // подзаголовок
            formTitle: 'Оставлена заявка на странице контактов', // в скрытое поле формы - заголовок формы
            readyToDownload: false, // будем скачивать или нет            
        });
        formOnContactPage.init();
        // formOnContactPage.buidtMyForm();
    }

    if (window.location.pathname == '/product/') {
        const sections = document.querySelectorAll('.inner-catalog .inner-catalog__partition-block');
        sections.forEach(item => {
            const btn = item.querySelector('h2');
            const drAndDo = dropdown({
                elemForClick: btn,
                elemForMove: item,                
            });
            drAndDo.init();
        });
    }

    if (window.location.pathname == '/service/') {
        const sections = document.querySelectorAll('.offers .inner-catalog__partition-block');
        sections.forEach(item => {
            const btn = item.querySelector('h2');
            const drAndDo = dropdown({
                elemForClick: btn,
                elemForMove: item,                
            });
            drAndDo.init();
        });
    }

    if (window.location.pathname == '/about/') {
        const contentBlock = document.querySelector('.inner-about__partition-block');
        const itDontNeed = document.querySelector('.square__azure.square__azure_second');
        if(contentBlock.offsetHeight < 1100) {
            itDontNeed.style.display = 'none';
        }
    }

    document.querySelector('.content-block').addEventListener('click', (e) => {

        // console.log('#### клик был здесь: ', e.target);

        if (e.target.dataset.object == 'request') {
            e.preventDefault();
            // console.log(e.target.dataset.object);

            const element = e.target;

            const modalForFrom = popupModal({
                startElem: element,
                titleMark: element.dataset.title,
                content: {
                    object: FormInPage,
                    data: {
                        url: '.modal__wrap .modal__container',
                        title: 'Ваша заявка',
                        subTitle: 'Оставьте Ваши контактные данные, и мы свяжемся с Вами в ближайшее время',
                        formTitle: element.dataset.title,
                        readyToDownload: false,
                    },
                },        
            });

            modalForFrom.init();
        }
        else if (e.target.dataset.object == 'prise') {
            e.preventDefault();
            // console.log(e.target.dataset.object);

            const element = e.target;

            const modalForFrom = popupModal({
                startElem: element,
                titleMark: element.dataset.title,
                content: {
                    object: FormInPage,
                    data: {
                        url: '.modal__wrap .modal__container',
                        title: 'Ваша заявка',
                        subTitle: 'Оставьте Ваши контактные данные, и скачайте прайс',
                        formTitle: element.dataset.title,
                        readyToDownload: true,
                    },
                },        
            });

            modalForFrom.init();            
        } else if (e.target.dataset.object == 'requisites') {
            e.preventDefault();
        } else {
            console.log('#### clicked');
        }
    });
    
});

//////////////////////////////////////////////////////////////////////////////
////////////////////////// вспомогательные функции ///////////////////////////
//////////////////////////////////////////////////////////////////////////////

function raf(fn){
    window.requestAnimationFrame(function(){
        window.requestAnimationFrame(function(){
            fn();
        });
    });
}

// для форма обратной связи
function imOkey(n) {
  if (n != '' && n != null && n != 'undefined') {
      var numbersArray = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
      let str = n.split('');
      var countNumber = 0;
      for(var i = 0; i < str.length; i++) {
        if (str[i] == ' ') {
          continue;
        }
          for(var j = 0; j < numbersArray.length; j++) {
              if (str[i] == numbersArray[j]) {
                  // console.log(str[i], numbersArray[j]);
                  countNumber++;
              };
          };
      };
  
      var goodOrBadValue = false;
      var badNumbers = [
          "+7 (911) 111-11-11", 
          "+7 (922) 222-22-22", 
          "+7 (933) 333-33-33",
          "+7 (944) 444-44-44",
          "+7 (955) 555-55-55",
          "+7 (966) 666-66-66",
          "+7 (977) 777-77-77",
          "+7 (988) 888-88-88",
          "+7 (999) 999-99-99"
          ];
      for( var i = 0; i < badNumbers.length; i++) {
          if (n == badNumbers[i]) {
              goodOrBadValue = true;
          };
      }; 
      
      // console.log(n, typeof n, countNumber, goodOrBadValue);
      if (countNumber == 11 && goodOrBadValue == false) {
          return true;
      } else {
          return false;
      };
  }
};

// инпут для телефона
function makeMasks() {
    if(document.querySelectorAll(".phonemask").length > 0){
        // console.log(document.querySelectorAll(".phonemask").lenght);
        let inputMask = document.querySelectorAll(".phonemask");
        Inputmask.extendDefinitions({
          'f': {"validator": "[9\(\)\.\+/ ]"}
        });
        //
        let im = new Inputmask("+7(f99)999-99-99");
        // 
        for (let i of inputMask) {
            if (typeof i != 'undefined') {
                im.mask(i);
            }
        }
    } else {
        console.log('нету масок на инпутах');
    }    
}