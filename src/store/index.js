"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var vuex_1 = require("vuex");
exports.default = vuex_1.createStore({
    state: {
        authenticated: false,
    },
    mutations: {
        SET_AUTH: function (state, auth) {
            return (state.authenticated = auth);
        },
    },
    actions: {
        setAuth: function (_a, auth) {
            var commit = _a.commit;
            return commit("SET_AUTH", auth);
        },
    },
    modules: {},
});
