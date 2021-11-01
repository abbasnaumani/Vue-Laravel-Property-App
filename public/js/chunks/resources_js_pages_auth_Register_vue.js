"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_pages_auth_Register_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/auth/Register.vue?vue&type=script&lang=js":
/*!**************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/auth/Register.vue?vue&type=script&lang=js ***!
  \**************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _composables_auth__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../composables/auth */ "./resources/js/composables/auth.js");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "Register",
  setup: function setup(props) {
    var _authLogin = (0,_composables_auth__WEBPACK_IMPORTED_MODULE_0__.authLogin)(props),
        first_name = _authLogin.first_name,
        last_name = _authLogin.last_name,
        email = _authLogin.email,
        phone_number = _authLogin.phone_number,
        password = _authLogin.password,
        password_confirmation = _authLogin.password_confirmation,
        handleRegistration = _authLogin.handleRegistration;

    return {
      first_name: first_name,
      last_name: last_name,
      email: email,
      phone_number: phone_number,
      password: password,
      password_confirmation: password_confirmation,
      handleRegistration: handleRegistration
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/auth/Register.vue?vue&type=template&id=2ebeb09e":
/*!******************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/auth/Register.vue?vue&type=template&id=2ebeb09e ***!
  \******************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "hero-static"
};
var _hoisted_2 = {
  "class": "content"
};
var _hoisted_3 = {
  "class": "row justify-content-center"
};
var _hoisted_4 = {
  "class": "col-md-8 col-lg-6 col-xl-4"
};
var _hoisted_5 = {
  "class": "block block-rounded block-themed mb-0"
};

var _hoisted_6 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"block-header bg-primary-dark\"><h3 class=\"block-title\">Create Account</h3><div class=\"block-options\"><a class=\"btn-block-option font-size-sm\" href=\"javascript:void(0)\" data-toggle=\"modal\" data-target=\"#one-signup-terms\">View Terms</a><a class=\"btn-block-option\" href=\"/login\" data-toggle=\"tooltip\" data-placement=\"left\" title=\"Sign In\"><i class=\"fa fa-sign-in-alt\"></i></a></div></div>", 1);

var _hoisted_7 = {
  "class": "block-content"
};
var _hoisted_8 = {
  "class": "p-sm-3 px-lg-4 py-lg-5"
};

var _hoisted_9 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  "class": "h2 mb-1"
}, "KodeStudio", -1
/* HOISTED */
);

var _hoisted_10 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
  "class": "text-muted"
}, " Please fill the following details to create a new account. ", -1
/* HOISTED */
);

var _hoisted_11 = {
  "class": "py-3"
};
var _hoisted_12 = {
  "class": "form-group"
};
var _hoisted_13 = {
  "class": "form-group"
};
var _hoisted_14 = {
  "class": "form-group"
};

var _hoisted_15 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "text-danger",
  id: "result"
})], -1
/* HOISTED */
);

var _hoisted_16 = {
  "class": "form-group"
};
var _hoisted_17 = {
  "class": "form-group"
};
var _hoisted_18 = {
  "class": "form-group"
};

var _hoisted_19 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "form-group row"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "col-md-6 col-xl-5"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
  type: "submit",
  "class": "btn btn-block btn-alt-primary"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fa fa-fw fa-sign-in-alt mr-1"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Sign Up ")])])], -1
/* HOISTED */
);

var _hoisted_20 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "content content-full font-size-sm text-muted text-center"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("strong", null, "KodeStudio.net"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" © "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "data-toggle": "year-copy"
})], -1
/* HOISTED */
);

function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" Sign Up Block "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [_hoisted_6, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_8, [_hoisted_9, _hoisted_10, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" Sign Up Form "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" For more info and examples you can check out https://github.com/jzaefferer/jquery-validation "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("form", {
    "class": "js-validation-signup",
    onSubmit: _cache[6] || (_cache[6] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $setup.handleRegistration && $setup.handleRegistration.apply($setup, arguments);
    }, ["prevent"])),
    method: "POST",
    id: "register-form-id"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_11, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_12, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "text",
    "class": "form-control form-control-lg form-control-alt",
    id: "first_name",
    "onUpdate:modelValue": _cache[0] || (_cache[0] = function ($event) {
      return $setup.first_name = $event;
    }),
    placeholder: "First Name",
    autofocus: ""
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.first_name]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_13, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "text",
    "class": "form-control form-control-lg form-control-alt",
    id: "last_name",
    "onUpdate:modelValue": _cache[1] || (_cache[1] = function ($event) {
      return $setup.last_name = $event;
    }),
    placeholder: "Last Name"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.last_name]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_14, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "email",
    "class": "form-control form-control-lg form-control-alt",
    id: "email",
    "onUpdate:modelValue": _cache[2] || (_cache[2] = function ($event) {
      return $setup.email = $event;
    }),
    placeholder: "Email"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.email]]), _hoisted_15]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_16, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "tel",
    "class": "form-control form-control-lg form-control-alt",
    id: "phone",
    "onUpdate:modelValue": _cache[3] || (_cache[3] = function ($event) {
      return $setup.phone_number = $event;
    }),
    placeholder: "Phone Number"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.phone_number]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_17, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "password",
    "class": "form-control form-control-lg form-control-alt",
    id: "password",
    "onUpdate:modelValue": _cache[4] || (_cache[4] = function ($event) {
      return $setup.password = $event;
    }),
    placeholder: "Password"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.password]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_18, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "password",
    "class": "form-control form-control-lg form-control-alt",
    id: "password_confirmation",
    "onUpdate:modelValue": _cache[5] || (_cache[5] = function ($event) {
      return $setup.password_confirmation = $event;
    }),
    placeholder: "Confirm Password"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.password_confirmation]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("                                       <div class=\"form-group\">"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("                                        <div class=\"custom-control custom-checkbox\">"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("                                            <input type=\"checkbox\" class=\"custom-control-input\" id=\"signup-terms\" name=\"signup-terms\">"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("                                            <label class=\"custom-control-label font-w400\" for=\"signup-terms\">I agree to Terms &amp; Conditions</label>"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("                                        </div>"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("                                    </div> ")]), _hoisted_19], 32
  /* HYDRATE_EVENTS */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" END Sign Up Form ")])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" END Sign Up Block ")])])]), _hoisted_20]);
}

/***/ }),

/***/ "./resources/js/pages/auth/Register.vue":
/*!**********************************************!*\
  !*** ./resources/js/pages/auth/Register.vue ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Register_vue_vue_type_template_id_2ebeb09e__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Register.vue?vue&type=template&id=2ebeb09e */ "./resources/js/pages/auth/Register.vue?vue&type=template&id=2ebeb09e");
/* harmony import */ var _Register_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Register.vue?vue&type=script&lang=js */ "./resources/js/pages/auth/Register.vue?vue&type=script&lang=js");
/* harmony import */ var _var_www_html_property_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_var_www_html_property_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Register_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Register_vue_vue_type_template_id_2ebeb09e__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/pages/auth/Register.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/pages/auth/Register.vue?vue&type=script&lang=js":
/*!**********************************************************************!*\
  !*** ./resources/js/pages/auth/Register.vue?vue&type=script&lang=js ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Register_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Register_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Register.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/auth/Register.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/pages/auth/Register.vue?vue&type=template&id=2ebeb09e":
/*!****************************************************************************!*\
  !*** ./resources/js/pages/auth/Register.vue?vue&type=template&id=2ebeb09e ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Register_vue_vue_type_template_id_2ebeb09e__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Register_vue_vue_type_template_id_2ebeb09e__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Register.vue?vue&type=template&id=2ebeb09e */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/pages/auth/Register.vue?vue&type=template&id=2ebeb09e");


/***/ })

}]);