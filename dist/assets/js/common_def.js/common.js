"use strict";

function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

//////////////////////////////////////////////////////////////////////////////
////////////////////////////////// объекты ///////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
var templateForm = function templateForm(obj) {
  html = "\n    <div class=\"form-block\">\n        <div class=\"form-block__title\">\n            ".concat(obj.title, "\n        </div>\n        <div class=\"form-block__sub-title\">\n            ").concat(obj.subTitle, "\n        </div>\n        <form class=\"form-block__content\">\n            <input type=\"hidden\" name=\"title\">\n            <div class=\"form-block__field\">\n                <label for=\"name\" class=\"form-block__label\">\n                    \u0412\u0430\u0448\u0435 \u0438\u043C\u044F\n                </label>\n                <input type=\"text\" id=\"name\" name=\"name\" class=\"form-block__input name\">\n            </div>\n            <div class=\"form-block__field\">\n                <label for=\"phone\" class=\"form-block__label\">\n                    \u0412\u0430\u0448 \u0442\u0435\u043B\u0435\u0444\u043E\u043D\n                </label>\n                <input type=\"tel\" id=\"phone\" name=\"phone\" class=\"form-block__input phone phonemask\">\n            </div>\n            <button class=\"form-block__button simple-button simple-button_for-form\">\n                \u041E\u0442\u043F\u0440\u0430\u0432\u0438\u0442\u044C\n            </button>\n            <div class=\"form-block__messages\">\n                <div class=\"form-block__success\">\n                    <span>\n                        \u0411\u043B\u0430\u0433\u043E\u0434\u0430\u0440\u0438\u043C \u0437\u0430 \u0437\u0430\u044F\u0432\u043A\u0443!\n                    </span>\n                </div>\n            </div>\n        </form>\n        <a href=\"#\" class=\"modal-content__warning\">\n            \u041D\u0430\u0436\u0438\u043C\u0430\u044F \u043D\u0430 \u043A\u043D\u043E\u043F\u043A\u0443, \u0432\u044B \u0434\u0430\u0435\u0442\u0435 \u0441\u043E\u0433\u043B\u0430\u0441\u0438\u0435 \u043D\u0430 \u043E\u0431\u0440\u0430\u0431\u043E\u0442\u043A\u0443 \u043F\u0435\u0440\u0441\u043E\u043D\u0430\u043B\u044C\u043D\u044B\u0445 \u0434\u0430\u043D\u043D\u044B\u0445 \u0438 \u0441\u043E\u0433\u043B\u0430\u0448\u0430\u0435\u0442\u0435\u0441\u044C c \u043F\u043E\u043B\u0438\u0442\u0438\u043A\u043E\u0439 \u043A\u043E\u043D\u0444\u0438\u0434\u0435\u043D\u0446\u0438\u0430\u043B\u044C\u043D\u043E\u0441\u0442\u0438\n        </a>\n    </div>");
  return html;
};

var templateModal = "\n    <div class=\"modal__wrap\">\n        <div class=\"modal__close-btn\">\n            &times;\n        </div>\n        <div class=\"modal__container\">\n            \u0441\u043A\u043E\u043D\u0442\u0435\u043D\u0442\n        </div>\n    </div>\n";

var FormInPage = function FormInPage(object) {
  var formWrap = object.formWrap,
      title = object.title,
      subTitle = object.subTitle,
      formTitle = object.formTitle;

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

  function fetchForm() {
    var name = formWrap.querySelector('form input[name="name"]');
    var phone = formWrap.querySelector('form input[name="phone"]');
    var title = formWrap.querySelector('form input[name="title"]');
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
        console.log('Сообщение отправлено методом fetch');
        return response.json();
      }).then(function (response) {
        console.log(response); // draw(response)

        movieSuccessMessage();
        name.value = '';
        phone.value = '';
      })["catch"](function (error) {
        console.error(error);
      });
    };

    var formData = "action=ajax_submit_form&name=".concat(name ? name.value : '', "&phone=").concat(phone ? phone.value : '', "&title=").concat(title);

    if (name.value != '' && name.value.length < 25 && phone.value != '' && imOkey(phone.value) == true) {
      sendAjax(formData);
    }
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
    console: function (_console) {
      function console() {
        return _console.apply(this, arguments);
      }

      console.toString = function () {
        return _console.toString();
      };

      return console;
    }(function () {
      event.preventDefault();
      var formData = "action=ajax_submit_form&name=".concat(name ? name.value : '', "&phone=").concat(phone ? phone.value : '', "&title=").concat(title);
      console.log(formData, button);
    }),
    init: function init() {
      formWrap.querySelector('button').addEventListener('click', function (e) {
        e.preventDefault();
        methods.submitForm();
      });
    }
  };
  methods.buidtMyForm();
  methods.makeMasksInMyForm();
  formWrap.querySelector('button').addEventListener('click', function (e) {
    e.preventDefault();
    methods.submitForm();
  });
  return methods;
};

var popupModal = function popupModal(object) {
  var startElem = object.startElem,
      titleMark = object.titleMark,
      content = object.content;

  function pasteModal() {
    var html = templateModal;
    var element = document.createElement('div');
    element.classList.add('modal');
    element.innerHTML = html;
    document.querySelector('.work-area').append(element);
  }

  var methods = {
    create: function create() {
      console.log('paste modal');
      pasteModal();
    },
    open: function open() {
      console.log('open modal');
      var elemForMovie = document.querySelector('.modal');
      elemForMovie.classList.add('active');
      raf(function () {
        elemForMovie.classList.add('movie');
      });
    },
    close: function close() {
      console.log('close modal');
      var elemForMovie = document.querySelector('.modal');

      function handlerCloseModal() {
        elemForMovie.classList.remove('active'); //

        elemForMovie.removeEventListener('transitionend', handlerCloseModal);
      }

      elemForMovie.addEventListener('transitionend', handlerCloseModal);
      elemForMovie.classList.remove('movie');
    },
    putListenerForClosing: function putListenerForClosing() {
      console.log('start: putListenerForClosing');

      function handler(e) {
        // console.log(e.target);
        if (e.target == document.querySelector('.modal .modal__close-btn')) {
          methods.close(); //

          document.querySelector('.modal').removeEventListener('click', handler);
          console.log('end: putListenerForClosing');
        }
      }

      document.querySelector('.modal').addEventListener('click', handler);
    },
    makeContent: function makeContent() {
      var data = content.data,
          object = content.object;
      var url = data.url,
          title = data.title,
          subTitle = data.subTitle,
          formTitle = data.formTitle;
      var initObj = object({
        formWrap: document.querySelector(url),
        title: title,
        subTitle: subTitle,
        formTitle: formTitle
      });
      initObj.init(); // const data = {
      //     formWrap: document.querySelector('.modal .modal__container'),
      //     title: titleMark,            
      // }
      // let makeForm = FormInPage(data);
    },
    init: function init() {
      if (document.querySelector('.modal')) {
        console.log('окно есть');
        methods.open(); // listenerForCloseBtn();

        methods.putListenerForClosing(); // methods.makeContent();
      } else {
        console.log('окна нет, сделаем');
        methods.create();
        methods.open(); // listenerForCloseBtn();

        methods.putListenerForClosing();
        methods.makeContent();
      }
    }
  };
  startElem.addEventListener('click', function (e) {
    // console.log(e.target);
    methods.init();
    e.preventDefault();
  });
  return methods;
}; //////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// логика ///////////////////////////////////
//////////////////////////////////////////////////////////////////////////////


window.addEventListener('load', function () {
  var topMenu = new Vue({
    el: "#top-menu",
    data: {
      isActive: false
    },
    methods: {
      visibleElementInHeader: function visibleElementInHeader() {
        // v-on:click="isActive = !isActive"
        this.isActive = !this.isActive; //

        var elemInHeader = document.querySelector('header');
        elemInHeader.classList.contains('active') ? elemInHeader.classList.remove('active') : elemInHeader.classList.add('active'); //

        var body = document.querySelector('body');
        body.classList.contains('hidden') ? body.classList.remove('hidden') : body.classList.add('hidden');
      }
    }
  });
  document.querySelector('.content-block').addEventListener('click', function (e) {
    console.log('#### клик был здесь: ', e.target);
    e.preventDefault();

    if (e.target.dataset.object) {
      // console.log(e.target.dataset.object);
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
            formTitle: element.dataset.title
          }
        }
      });
      modalForFrom.init();
    } else {
      console.log(e.target);
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
    console.log(document.querySelectorAll(".phonemask").lenght);
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