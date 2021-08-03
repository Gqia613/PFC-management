"use strict";
(self["webpackChunkback"] = self["webpackChunkback"] || []).push([["resources_js_components_ListDetail_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/ListDetail.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/ListDetail.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'ListDetail',
  data: function data() {
    return {
      user_id: "",
      physique_id: "",
      list: null
    };
  },
  methods: {
    deleteList: function deleteList() {
      var _this = this;

      axios.post('/api/deletelist', {
        user_id: this.user_id,
        physique_id: this.physique_id
      }).then(function (res) {
        _this.$router.push({
          name: 'List'
        });
      });
    }
  },
  mounted: function mounted() {
    var _this2 = this;

    this.user_id = this.$route.params.user_id;
    this.physique_id = this.$route.params.physique_id;
    axios.get('/api/getlist-detail', {
      params: {
        user_id: this.user_id,
        physique_id: this.physique_id
      }
    }).then(function (res) {
      _this2.list = res.data;
    });
  }
});

/***/ }),

/***/ "./resources/js/components/ListDetail.vue":
/*!************************************************!*\
  !*** ./resources/js/components/ListDetail.vue ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _ListDetail_vue_vue_type_template_id_6327d88c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ListDetail.vue?vue&type=template&id=6327d88c& */ "./resources/js/components/ListDetail.vue?vue&type=template&id=6327d88c&");
/* harmony import */ var _ListDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ListDetail.vue?vue&type=script&lang=js& */ "./resources/js/components/ListDetail.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _ListDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _ListDetail_vue_vue_type_template_id_6327d88c___WEBPACK_IMPORTED_MODULE_0__.render,
  _ListDetail_vue_vue_type_template_id_6327d88c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/ListDetail.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/ListDetail.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/components/ListDetail.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ListDetail.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/ListDetail.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/ListDetail.vue?vue&type=template&id=6327d88c&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/ListDetail.vue?vue&type=template&id=6327d88c& ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListDetail_vue_vue_type_template_id_6327d88c___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListDetail_vue_vue_type_template_id_6327d88c___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListDetail_vue_vue_type_template_id_6327d88c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ListDetail.vue?vue&type=template&id=6327d88c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/ListDetail.vue?vue&type=template&id=6327d88c&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/ListDetail.vue?vue&type=template&id=6327d88c&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/ListDetail.vue?vue&type=template&id=6327d88c& ***!
  \**********************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "container" }, [
    _c(
      "div",
      { staticClass: "mt-3 mb-3" },
      [
        _c(
          "router-link",
          { staticClass: "text-success", attrs: { to: { name: "List" } } },
          [
            _c(
              "svg",
              {
                staticClass: "bi bi-chevron-left",
                attrs: {
                  xmlns: "http://www.w3.org/2000/svg",
                  width: "20",
                  height: "20",
                  fill: "currentColor",
                  viewBox: "0 0 20 20"
                }
              },
              [
                _c("path", {
                  attrs: {
                    "fill-rule": "evenodd",
                    d:
                      "M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"
                  }
                })
              ]
            ),
            _vm._v("\n            戻る\n        ")
          ]
        )
      ],
      1
    ),
    _vm._v(" "),
    _vm.list
      ? _c("div", { staticClass: "card border-success mb-3" }, [
          _c("div", { staticClass: "card-header text-success" }, [
            _vm._v(
              "期間：" +
                _vm._s(_vm.list.first_day) +
                " 〜 " +
                _vm._s(_vm.list.last_day)
            )
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "card-body text-success" }, [
            _c("p", { staticClass: "card-text" }, [
              _vm._v("目標体重：" + _vm._s(_vm.list.goal_weight) + "kg")
            ]),
            _vm._v(" "),
            _c("p", { staticClass: "card-text" }, [
              _vm._v(
                "1日あたりの消費カロリー：" +
                  _vm._s(_vm.list.lost_calorie) +
                  "kcal"
              )
            ]),
            _vm._v(" "),
            _c("p", { staticClass: "card-text" }, [
              _vm._v(
                "1日あたりの摂取カロリー：" +
                  _vm._s(_vm.list.intake_calorie) +
                  "kcal"
              )
            ]),
            _vm._v(" "),
            _c("p", { staticClass: "card-text" }, [
              _vm._v("日数：" + _vm._s(_vm.list.diet_term) + "日")
            ]),
            _vm._v(" "),
            _c("p", { staticClass: "card-text" }, [
              _vm._v("運動量：" + _vm._s(_vm.list.exercise))
            ]),
            _vm._v(" "),
            _c("p", { staticClass: "card-text" }, [
              _vm._v("1日の食事回数：" + _vm._s(_vm.list.meals_number) + "回")
            ]),
            _vm._v(" "),
            _c("p", { staticClass: "card-text" }, [
              _vm._v(
                "1日の必要なタンパク質：" + _vm._s(_vm.list.need_protein) + "g"
              )
            ]),
            _vm._v(" "),
            _c("p", { staticClass: "card-text" }, [
              _vm._v("1日の必要な脂質：" + _vm._s(_vm.list.need_fat) + "g")
            ]),
            _vm._v(" "),
            _c("p", { staticClass: "card-text" }, [
              _vm._v(
                "1日の必要な炭水化物：" +
                  _vm._s(_vm.list.need_carbohydrate) +
                  "g"
              )
            ]),
            _vm._v(" "),
            _c("p", { staticClass: "card-text" }, [
              _vm._v("身長：" + _vm._s(_vm.list.height) + "cm")
            ]),
            _vm._v(" "),
            _c("p", { staticClass: "card-text" }, [
              _vm._v("体重：" + _vm._s(_vm.list.weight) + "kg")
            ]),
            _vm._v(" "),
            _c("p", { staticClass: "card-text" }, [
              _vm._v("年齢：" + _vm._s(_vm.list.age) + "歳")
            ])
          ])
        ])
      : _vm._e(),
    _vm._v(" "),
    _vm.list
      ? _c("div", { staticClass: "row" }, [
          _c(
            "button",
            {
              staticClass: "btn btn-danger col-8 mx-auto",
              attrs: { type: "button" },
              on: { click: _vm.deleteList }
            },
            [_vm._v("\n        削除する\n      ")]
          )
        ])
      : _vm._e(),
    _vm._v(" "),
    !_vm.list
      ? _c(
          "div",
          { staticClass: "alert alert-warning", attrs: { role: "alert" } },
          [
            _vm._v(
              "\n      ※データが正しく読み込めませんでした。再度結果一覧からお願いいたします。\n    "
            )
          ]
        )
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ normalizeComponent)
/* harmony export */ });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ })

}]);