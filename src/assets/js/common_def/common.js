"use strict";

function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _objectWithoutProperties(source, excluded) { if (source == null) return {}; var target = _objectWithoutPropertiesLoose(source, excluded); var key, i; if (Object.getOwnPropertySymbols) { var sourceSymbolKeys = Object.getOwnPropertySymbols(source); for (i = 0; i < sourceSymbolKeys.length; i++) { key = sourceSymbolKeys[i]; if (excluded.indexOf(key) >= 0) continue; if (!Object.prototype.propertyIsEnumerable.call(source, key)) continue; target[key] = source[key]; } } return target; }

function _objectWithoutPropertiesLoose(source, excluded) { if (source == null) return {}; var target = {}; var sourceKeys = Object.keys(source); var key, i; for (i = 0; i < sourceKeys.length; i++) { key = sourceKeys[i]; if (excluded.indexOf(key) >= 0) continue; target[key] = source[key]; } return target; }

//////////////////////////////////////////////////////////////////////////////
////////////////////////////// объекты/модули ////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
var NAME_OF_PRISE = "export.csv";
var URL_TO_PRISE = "".concat(window.wp.theme_url, "/documents/").concat(NAME_OF_PRISE);
var AJAX_REQUEST_CONTENT_DATA = 'ajax_request_content';
var AJAX_REQUEST_SUBMIT_FORM = 'ajax_submit_form';

var templateForm = function templateForm(obj) {
  var html = "\n    <div class=\"form-block\">\n        <div class=\"form-block__title\">\n            ".concat(obj.title, "\n        </div>\n        <div class=\"form-block__sub-title\">\n            ").concat(obj.subTitle, "\n        </div>\n        <form class=\"form-block__content\">\n            <input type=\"hidden\" name=\"title\">\n            <div class=\"form-block__field\">\n                <label for=\"name\" class=\"form-block__label\">\n                    \u0412\u0430\u0448\u0435 \u0438\u043C\u044F\n                </label>\n                <input type=\"text\" id=\"name\" name=\"name\" class=\"form-block__input name\">\n            </div>\n            <div class=\"form-block__field\">\n                <label for=\"phone\" class=\"form-block__label\">\n                    \u0412\u0430\u0448 \u0442\u0435\u043B\u0435\u0444\u043E\u043D\n                </label>\n                <input type=\"tel\" id=\"phone\" name=\"phone\" class=\"form-block__input phone phonemask\">\n            </div>\n            <div class=\"form-block__field\">\n                <label for=\"email\" class=\"form-block__label\">\n                    \u0412\u0430\u0448 email\n                </label>\n                <input type=\"email\" id=\"email\" name=\"email\" class=\"form-block__input phone\">\n            </div>\n            <button class=\"form-block__button simple-button simple-button_for-form\">\n                \u041E\u0442\u043F\u0440\u0430\u0432\u0438\u0442\u044C\n            </button>\n            <div class=\"form-block__messages\">\n                <div class=\"form-block__success\">\n                    <span>\n                        \u0411\u043B\u0430\u0433\u043E\u0434\u0430\u0440\u0438\u043C \u0437\u0430 \u0437\u0430\u044F\u0432\u043A\u0443!\n                    </span>\n                </div>\n            </div>\n        </form>\n        <a href=\"#\" class=\"modal-content__warning\">\n            \u041D\u0430\u0436\u0438\u043C\u0430\u044F \u043D\u0430 \u043A\u043D\u043E\u043F\u043A\u0443, \u0432\u044B \u0434\u0430\u0435\u0442\u0435 \u0441\u043E\u0433\u043B\u0430\u0441\u0438\u0435 \u043D\u0430 \u043E\u0431\u0440\u0430\u0431\u043E\u0442\u043A\u0443 \u043F\u0435\u0440\u0441\u043E\u043D\u0430\u043B\u044C\u043D\u044B\u0445 \u0434\u0430\u043D\u043D\u044B\u0445 \u0438 \u0441\u043E\u0433\u043B\u0430\u0448\u0430\u0435\u0442\u0435\u0441\u044C c \u043F\u043E\u043B\u0438\u0442\u0438\u043A\u043E\u0439 \u043A\u043E\u043D\u0444\u0438\u0434\u0435\u043D\u0446\u0438\u0430\u043B\u044C\u043D\u043E\u0441\u0442\u0438\n        </a>\n    </div>");
  return html;
};

var templateContent = function templateContent(obj) {
  var html = "\n        <div class=\"interactive-content\">\n            <div class=\"interactive-content__preview\">\n                <img src=\"".concat(obj.preview, "\" >\n            </div>\n            <div class=\"interactive-content__title\">\n                <h3 class=\"h3 interactive-content__title-wrap ").concat(obj.title ? '' : 'not-visible', "\">\n                    ").concat(obj.title, "\n                </h3>\n            </div>\n            <div class=\"interactive-content__sub-title ").concat(obj.subTitle ? '' : 'not-visible', "\">\n                ").concat(obj.subTitle, "\n            </div>\n            <div class=\"interactive-content__body ").concat(obj.content ? '' : 'not-visible', "\">\n                ").concat(obj.content, "\n            </div>\n        </div>\n    ");
  return html;
};

var templateModal = "\n    <div class=\"modal__wrap\">\n        <div class=\"modal__close-btn\">\n            &times;\n        </div>\n        <div class=\"modal__container\">\n            <div class=\"content-loader light\">\n                <div class=\"loader__wrap\">\n                    <div class=\"lds-roller\"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>\n                </div>\n            </div>\n        </div>\n    </div>\n";

var contentBlock = function contentBlock(object) {
  var url = object.url,
      type = object.type,
      id = object.id;
  var targetElem = document.querySelector(url);

  function buildContent(object) {
    targetElem.innerHTML = '';
    var html = templateContent(object);
    targetElem.innerHTML = html;
  }

  function fetchForm() {
    var sendAjax = function sendAjax(formData) {
      fetch(window.wp.ajax_url, // '/wp-admin/admin-ajax.php', // точка входа
      {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded' // отправляемые данные 

        },
        body: formData
      }).then(function (response) {
        return response.json();
      }).then(function (response) {
        buildContent(response);
      })["catch"](function (error) {
        console.error(error);
      });
    };

    var formData = "action=".concat(AJAX_REQUEST_CONTENT_DATA, "&type=").concat(type, "&id=").concat(id);

    if (type != '' && id != '') {
      sendAjax(formData);
    } else {
      console.log('lol kek chrburek');
    }
  }

  var methods = {
    init: function init() {
      fetchForm();
    },
    clear: function clear() {
      console.log('clear contentBlock');
    }
  };
  return methods;
};

var FormInPage = function FormInPage(object) {
  // let readyToDownload = false;
  var url = object.url,
      title = object.title,
      subTitle = object.subTitle,
      formTitle = object.formTitle,
      _object$readyToDownlo = object.readyToDownload,
      readyToDownload = _object$readyToDownlo === void 0 ? false : _object$readyToDownlo;
  var formWrap = document.querySelector(url);

  function buildForm() {
    formWrap.innerHTML = '';
    var html = templateForm({
      title: title,
      subTitle: subTitle
    });
    formWrap.innerHTML = html;
    formWrap.querySelector('form input[name="title"]').value = formTitle;
  }

  function movieSuccessMessage() {
    var successBlock = formWrap.querySelector('.form-block__content .form-block__success');

    function handle() {
      setTimeout(function () {
        function handle() {
          successBlock.classList.remove('active'); //

          successBlock.removeEventListener('transitionend', handle);
        }

        successBlock.addEventListener('transitionend', handle);
        successBlock.classList.remove('movie');
      }, 3000); //

      successBlock.removeEventListener('transitionend', handle);
    }

    successBlock.addEventListener('transitionend', handle);
    successBlock.classList.add('active');
    raf(function () {
      successBlock.classList.add('movie');
    });
  }

  function _makingDownload(url) {
    // console.log('#### download: ', 'download start!');
    var a = document.createElement('a');
    a.style.display = 'none';
    a.href = url ? url : URL_TO_PRISE;
    a.download = url ? 'price' : NAME_OF_PRISE;
    document.body.appendChild(a);
    a.click();
    a.remove();
  }

  function fetchForm() {
    var name = formWrap.querySelector('form input[name="name"]');
    var phone = formWrap.querySelector('form input[name="phone"]');
    var title = formWrap.querySelector('form input[name="title"]');
    var email = formWrap.querySelector('form input[name="email"]');
    var button = formWrap.querySelector('form button');

    var sendAjax = function sendAjax(formData) {
      fetch(window.wp.ajax_url, // '/wp-admin/admin-ajax.php', // точка входа
      {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded' // отправляемые данные 

        },
        body: formData
      }).then(function (response) {
        // console.log('Сообщение отправлено методом fetch')
        return response.json();
      }).then(function (response) {
        // console.log(response)
        movieSuccessMessage();
        name.value = '';
        phone.value = '';
        email.value = '';
        return response;
      }).then(function (response) {
        var download = response.download;
        console.log(download);
        readyToDownload == true ? _makingDownload(download) : console.log('simple form');
      })["catch"](function (error) {
        console.error(error);
      });
    };

    var formData = "action=".concat(AJAX_REQUEST_SUBMIT_FORM, "&name=").concat(name ? name.value : '', "&phone=").concat(phone ? phone.value : '', "&title=").concat(title ? title.value : '', "&email=").concat(email ? email.value : '');

    if (name.value != '' && name.value.length < 25 && phone.value != '' && imOkey(phone.value) == true) {
      sendAjax(formData);
    }
  }

  function _handler(e) {
    e.preventDefault();
    methods.submitForm();
  }

  var methods = {
    buidtMyForm: function buidtMyForm() {
      buildForm();
    },
    makeMasksInMyForm: function makeMasksInMyForm() {
      makeMasks();
    },
    submitForm: function submitForm() {
      fetchForm();
    },
    success: function success() {},
    error: function error() {},
    console: function console() {
      event.preventDefault();
      var formData = "action=ajax_submit_form&name=".concat(name ? name.value : '', "&phone=").concat(phone ? phone.value : '', "&title=").concat(title); // console.log(formData, button);
    },
    init: function init() {
      formWrap.querySelector('button').addEventListener('click', _handler);
    },
    download: function download() {
      _makingDownload();
    },
    clear: function clear() {
      formWrap.querySelector('button').removeEventListener('click', _handler);
    }
  };
  methods.buidtMyForm();
  methods.makeMasksInMyForm(); // formWrap.querySelector('button').addEventListener('click', function(e){
  //     e.preventDefault();
  //     methods.submitForm();
  // });

  return methods;
};

var popupModal = function popupModal(object) {
  var startElem = object.startElem,
      titleMark = object.titleMark,
      content = object.content;
  var initObj = null;
  var element = null; // instance element

  function pasteModal() {
    var html = templateModal;
    element = document.createElement('div');
    element.classList.add('modal');
    element.innerHTML = html;
    document.querySelector('.work-area').append(element);
  }

  function deleteThisModal() {
    initObj.clear();
    element.remove(); // delete _int;
    // delete nitObj;

    initObj = null;
  }

  var methods = {
    create: function create() {
      // console.log('paste modal');
      pasteModal();
    },
    open: function open() {
      // console.log('open modal');
      var elemForMovie = document.querySelector('.modal');
      elemForMovie.classList.add('active');
      raf(function () {
        elemForMovie.classList.add('movie');
      }); //

      var body = document.querySelector('body');
      body.classList.contains('hidden') ? body.classList.remove('hidden') : body.classList.add('hidden');
    },
    close: function close() {
      // console.log('close modal');
      var elemForMovie = document.querySelector('.modal');

      function handlerCloseModal() {
        elemForMovie.classList.remove('active'); //

        elemForMovie.removeEventListener('transitionend', handlerCloseModal);
      }

      elemForMovie.addEventListener('transitionend', handlerCloseModal);
      elemForMovie.classList.remove('movie'); //

      var body = document.querySelector('body');
      body.classList.contains('hidden') ? body.classList.remove('hidden') : body.classList.add('hidden');
    },
    putListenerForClosing: function putListenerForClosing() {
      // console.log('start: putListenerForClosing');
      function handler(e) {
        // console.log(e.target);
        if (e.target == document.querySelector('.modal .modal__close-btn')) {
          methods.close(); //

          document.querySelector('.modal').removeEventListener('click', handler); // console.log('end: putListenerForClosing'); 
          //

          deleteThisModal();
        }
      }

      document.querySelector('.modal').addEventListener('click', handler);
    },
    makeContent: function makeContent() {
      var data = content.data,
          object = content.object;

      var url = data.url,
          props = _objectWithoutProperties(data, ["url"]);

      initObj = object(_objectSpread({
        url: url
      }, props));
      initObj.init();
    },
    init: function init() {
      if (document.querySelector('.modal')) {
        // console.log('окно есть');
        methods.open(); // listenerForCloseBtn();

        methods.putListenerForClosing(); // methods.makeContent();
      } else {
        // console.log('окна нет, сделаем');
        methods.create();
        methods.open(); // listenerForCloseBtn();

        methods.putListenerForClosing();
        methods.makeContent();
      }
    }
  }; // startElem.addEventListener('click', function(e){
  //     // console.log(e.target);
  //     methods.init();
  //     e.preventDefault();
  // })

  return methods;
};

var dropdown = function dropdown(object) {
  var elemForClick = object.elemForClick,
      elemForMove = object.elemForMove;
  var methods = {
    open: function open() {
      !elemForMove.classList.contains('active') ? elemForMove.classList.add('active') : elemForMove.classList.remove('active');
    },
    close: function close() {
      elemForMove.classList.contains('active') ? elemForMove.classList.remove('active') : elemForMove.classList.add('active');
    },
    toggle: function toggle() {
      elemForMove.classList.toggle('active');
    },
    init: function init() {
      elemForClick.addEventListener('click', function (e) {
        if (elemForClick.contains(e.target) || elemForClick == e.target) {
          methods.toggle();
        }
      });
    },
    initForBurger: function initForBurger() {
      elemForClick.addEventListener('click', function (e) {
        if (elemForClick.contains(e.target) || elemForClick == e.target) {
          methods.toggle(); //

          var elemInHeader = document.querySelector('header');
          elemInHeader.classList.contains('active') ? elemInHeader.classList.remove('active') : elemInHeader.classList.add('active'); //

          var body = document.querySelector('body');
          body.classList.contains('hidden') ? body.classList.remove('hidden') : body.classList.add('hidden');
        }
      });
    }
  };
  return methods;
};

var slider = function slider(object) {
  var urlToContainer = object.urlToContainer,
      urlToItems = object.urlToItems,
      urlToDots = object.urlToDots;
  var container = document.querySelector(urlToContainer);
  var items = document.querySelectorAll(urlToItems);
  var dots = document.querySelectorAll(urlToDots);
  var startX,
      startY,
      distanceX,
      distanceY,
      minInterval = 150,
      // минимальное расстояние для swipe
  minTimeMovie = 400,
      // максимальное время прохождения установленного расстояния  
  startTime,
      // время контакта с поверхностью сенсора
  elapsedTime; // время жизнь swipe

  function _openNewSlide(num) {
    // console.log(num);
    // dots
    dots.forEach(function (item, index) {
      index == num ? item.classList.add('active') : item.classList.remove('active');
    }); // items

    var activeItem = null;
    var activeIndex = 0;
    var nextItem = null;
    var nextIndex = num;
    items.forEach(function (item, index) {
      // index == num ? item.classList.add('active', 'movie') : item.classList.remove('active', 'movie');
      //
      if (item.classList.contains('active')) {
        activeItem = item;
        activeIndex = index;
      }

      if (index == nextIndex) {
        nextItem = item;
      }
    }); //

    function handler() {
      activeItem.classList.remove('active'); //

      activeItem.removeEventListener('transitionend', handler); //

      nextItem.classList.add('active');
      raf(function () {
        nextItem.classList.add('movie');
      });
    }

    activeItem.addEventListener('transitionend', handler);
    activeItem.classList.remove('movie');
  }

  function move(option) {
    // console.log(option);
    var activeItem = 0;
    var activeIndex = 0;
    items.forEach(function (item, index) {
      if (item.classList.contains('active')) {
        activeIndex = index; // item.classList.remove('active');
      }
    });
    var nextIndex = 0;
    nextIndex = option == 'forward' ? activeIndex + 1 : activeIndex - 1; // console.log(activeIndex, nextIndex);

    if (nextIndex > items.length - 1) {
      nextIndex = 0;
    }

    if (nextIndex < 0) {
      nextIndex = items.length - 1;
    } // console.log(activeIndex, nextIndex);


    _openNewSlide(nextIndex);
  }

  function _showMustGoOn(distanceX, distanceY) {
    if (Math.abs(distanceX) > Math.abs(distanceY)) {
      // листай
      if (distanceX > 0) {
        // вправо
        // alert('вправо: ' + ' x: ' + distanceX + '; y: ' + distanceY);
        move('forward');
      } else {
        // влево
        // alert('влево: ' + '; x: ' + distanceX + '; y: ' + distanceY);
        move('back');
      }
    } else {
      // скроль
      if (distanceY > 0) {
        // вниз
        // alert('вниз: ' + '; x: ' + distanceX + '; y: ' + distanceY);
        move('back');
      } else {
        // вверх
        // alert('вверх: ' + '; x: ' + distanceX + '; y: ' + distanceY);
        move('forward');
      }
    }
  }

  function run() {
    // для свайпов
    var objectForSwipes = document.querySelector('.special-offer .special-offer__wrap-with-wrapper'); // свайпы/swipes

    objectForSwipes.addEventListener('touchstart', function (e) {
      console.log('### touchstart'); // if (!document.querySelector('.menu-block').contains(event.target)) {

      var touchObject = e.changedTouches[0];
      distanceX = 0;
      distanceY = 0;
      startX = touchObject.pageX;
      startY = touchObject.pageY;
      startTime = new Date().getTime(); // время контакта с поверхностью сенсора

      e.preventDefault(); // }
    }, false);
    objectForSwipes.addEventListener('touchmove', function (e) {
      e.preventDefault(); // отключаем стандартную реакцию скроллинга
    }, false);
    objectForSwipes.addEventListener('touchend', function (e) {
      console.log('#### touchend'); // if (!document.querySelector('.menu-block').contains(event.target)) {

      var touchObject = e.changedTouches[0];
      distanceX = touchObject.pageX - startX; // получаем пройденную дистанцию

      distanceY = touchObject.pageY - startY;
      elapsedTime = new Date().getTime() - startTime; // узнаем пройденное время
      // проверяем затраченное время,горизонтальное перемещение >= minInterval, и вертикальное перемещение <= 100
      // var swiperightBol = (elapsedTime <= minTimeMovie && dist >= minInterval && Math.abs(touchObject.pageY - startY) <= 100);
      // console.log(elapsedTime, Math.abs(distanceX), distanceX);

      if (elapsedTime <= minTimeMovie && Math.abs(distanceY) <= 100 && Math.abs(distanceX) >= minInterval) {
        // console.log('#### _showMustGoOn: GO!');
        _showMustGoOn(distanceX, distanceY);
      }

      e.preventDefault(); // }
    }, false);
  }

  function jump() {
    // для дотов
    function handle(e) {
      var i = this; // console.log(e.target, this);

      _openNewSlide(i);
    }

    for (var i = 0; i < dots.length; i++) {
      dots[i].addEventListener('click', handle.bind(i));
    }
  }

  var methods = {
    init: function init() {
      // клики на доты
      jump();
    },
    initWithSwipe: function initWithSwipe() {
      // клики на доты
      jump(); // свайпы влево-вправо

      run();
    }
  };
  return methods;
}; //////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// логика ///////////////////////////////////
//////////////////////////////////////////////////////////////////////////////


window.addEventListener('DOMContentLoaded', function () {});
window.addEventListener('load', function () {
  // большой лоадер
  var loader = document.getElementById('loader');

  function handler() {
    loader.classList.add('not-loader'); //

    loader.removeEventListener('transitionend', handler);
  }

  loader.addEventListener('transitionend', handler);
  loader.classList.add('transparent'); // бургер меню

  var burgerBtn = document.querySelector('.burger-button__wrap');
  var burger = dropdown({
    elemForClick: burgerBtn,
    elemForMove: document.getElementById('top-menu')
  });
  burger.initForBurger();

  if (window.location.pathname == '/') {
    var projects = document.querySelectorAll('article[data-object="content"]');
    projects.forEach(function (item) {
      function handler(e) {
        e.preventDefault();

        if (item == e.target || item.contains(e.target)) {
          var element = e.target;
          var modalForContent = popupModal({
            startElem: element,
            titleMark: '',
            // element.dataset.title,
            content: {
              object: contentBlock,
              data: {
                url: '.modal__wrap .modal__container',
                // title: 'Ваша заявка',
                // subTitle: 'Оставьте Ваши контактные данные, и мы свяжемся с Вами в ближайшее время',
                // formTitle: element.dataset.title,
                // readyToDownload: false,
                type: item.dataset.type,
                id: +item.dataset.id
              }
            }
          });
          modalForContent.init();
        }
      }

      item.addEventListener('click', handler);
    }); //

    if (window.innerWidth >= 1200) {
      var sliderWithProjects = slider({
        urlToContainer: '.our-projects .our-projects__our-project',
        urlToItems: '.our-projects .our-project__container',
        urlToDots: '.our-projects .dots-bar__item'
      });
      sliderWithProjects.init();
    }

    if (window.innerWidth < 768) {
      var sliderWithOffers = slider({
        urlToContainer: '.special-offer .special-offer__wrap-with-offers',
        urlToItems: '.special-offer .special-offer__offer-item',
        urlToDots: '.special-offer .dots-bar__item'
      });
      sliderWithOffers.initWithSwipe();
    }
  }

  if (window.location.pathname == '/contacts/') {
    var formOnContactPage = FormInPage({
      url: '.contacts .contacts__content-part.contacts__form',
      title: 'Ваша заявка',
      // заголовок формы
      subTitle: 'Оставьте Ваши контактные данные, и мы свяжемся с Вами в ближайшее время',
      // подзаголовок
      formTitle: 'Оставлена заявка на странице контактов',
      // в скрытое поле формы - заголовок формы
      readyToDownload: false // будем скачивать или нет            

    });
    formOnContactPage.init(); // formOnContactPage.buidtMyForm();
  }

  if (window.location.pathname == '/product/') {
    var sections = document.querySelectorAll('.inner-catalog .inner-catalog__partition-block');
    sections.forEach(function (item) {
      var btn = item.querySelector('h2');
      var drAndDo = dropdown({
        elemForClick: btn,
        elemForMove: item
      });
      drAndDo.init();
    });
  }

  if (window.location.pathname == '/service/') {
    var _sections = document.querySelectorAll('.offers .inner-catalog__partition-block');

    _sections.forEach(function (item) {
      var btn = item.querySelector('h2');
      var drAndDo = dropdown({
        elemForClick: btn,
        elemForMove: item
      });
      drAndDo.init();
    });
  }

  if (window.location.pathname == '/about/') {
    var _contentBlock = document.querySelector('.inner-about__partition-block');

    var itDontNeed = document.querySelector('.square__azure.square__azure_second');

    if (_contentBlock.offsetHeight < 1100) {
      itDontNeed.style.display = 'none';
    }
  }

  document.querySelector('.content-block').addEventListener('click', function (e) {
    // console.log('#### клик был здесь: ', e.target);
    if (e.target.dataset.object == 'request') {
      e.preventDefault(); // console.log(e.target.dataset.object);

      var element = e.target;
      var modalForFrom = popupModal({
        startElem: element,
        titleMark: element.dataset.title,
        content: {
          object: FormInPage,
          data: {
            url: '.modal__wrap .modal__container',
            title: 'Ваша заявка',
            subTitle: 'Оставьте Ваши контактные данные, и мы свяжемся с Вами в ближайшее время',
            formTitle: element.dataset.title,
            readyToDownload: false
          }
        }
      });
      modalForFrom.init();
    } else if (e.target.dataset.object == 'prise') {
      e.preventDefault(); // console.log(e.target.dataset.object);

      var _element = e.target;

      var _modalForFrom = popupModal({
        startElem: _element,
        titleMark: _element.dataset.title,
        content: {
          object: FormInPage,
          data: {
            url: '.modal__wrap .modal__container',
            title: 'Ваша заявка',
            subTitle: 'Оставьте Ваши контактные данные, и скачайте прайс',
            formTitle: _element.dataset.title,
            readyToDownload: true
          }
        }
      });

      _modalForFrom.init();
    } else if (e.target.dataset.object == 'requisites') {
      e.preventDefault();
    } else {
      console.log('#### clicked');
    }
  });
}); //////////////////////////////////////////////////////////////////////////////
////////////////////////// вспомогательные функции ///////////////////////////
//////////////////////////////////////////////////////////////////////////////

function raf(fn) {
  window.requestAnimationFrame(function () {
    window.requestAnimationFrame(function () {
      fn();
    });
  });
} // для форма обратной связи


function imOkey(n) {
  if (n != '' && n != null && n != 'undefined') {
    var numbersArray = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    var str = n.split('');
    var countNumber = 0;

    for (var i = 0; i < str.length; i++) {
      if (str[i] == ' ') {
        continue;
      }

      for (var j = 0; j < numbersArray.length; j++) {
        if (str[i] == numbersArray[j]) {
          // console.log(str[i], numbersArray[j]);
          countNumber++;
        }

        ;
      }

      ;
    }

    ;
    var goodOrBadValue = false;
    var badNumbers = ["+7 (911) 111-11-11", "+7 (922) 222-22-22", "+7 (933) 333-33-33", "+7 (944) 444-44-44", "+7 (955) 555-55-55", "+7 (966) 666-66-66", "+7 (977) 777-77-77", "+7 (988) 888-88-88", "+7 (999) 999-99-99"];

    for (var i = 0; i < badNumbers.length; i++) {
      if (n == badNumbers[i]) {
        goodOrBadValue = true;
      }

      ;
    }

    ; // console.log(n, typeof n, countNumber, goodOrBadValue);

    if (countNumber == 11 && goodOrBadValue == false) {
      return true;
    } else {
      return false;
    }

    ;
  }
}

; // инпут для телефона

function makeMasks() {
  if (document.querySelectorAll(".phonemask").length > 0) {
    // console.log(document.querySelectorAll(".phonemask").lenght);
    var inputMask = document.querySelectorAll(".phonemask");
    Inputmask.extendDefinitions({
      'f': {
        "validator": "[9\(\)\.\+/ ]"
      }
    }); //

    var im = new Inputmask("+7(f99)999-99-99"); // 

    var _iterator = _createForOfIteratorHelper(inputMask),
        _step;

    try {
      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        var i = _step.value;

        if (typeof i != 'undefined') {
          im.mask(i);
        }
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }
  } else {
    console.log('нету масок на инпутах');
  }
}