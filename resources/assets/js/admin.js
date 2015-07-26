window.Moment = require('moment')
var Vue = require('vue')
var Resource = require('vue-resource')
Vue.use(Resource)
Vue.http.headers.common['Authorization'] = 'Bearer '+ document.querySelector('#jwt').getAttribute('content');
Vue.config.debug = true
var Router = require('director').Router
var app = new Vue(require('./app.js'))
var router = new Router()

router.on('/dashboard', function () {
  app.currentView = 'dashboard'
  app.params.contentId = ''
  app.params.currentView = 'dashboard'
})

router.on('/content', function () {
  app.currentView = 'content-index'
  app.params.contentId = ''
  app.params.currentView = 'content-index'
})

router.on('/content/create', function () {
  app.currentView = 'content-create'
  app.params.contentId = ''
  app.params.currentView = 'content-create'
})

router.on('/content/:id', function (id) {
  app.currentView = 'content-show'
  app.params.contentId = (id != app.params.contentId) ? id : app.params.contentId
  app.params.currentView = 'content-show'
})

router.on('/content/:id/settings', function (id) {
  app.currentView = 'content-settings'
  app.params.contentId = (id != app.params.contentId) ? id : app.params.contentId
  app.params.currentView = 'content-settings'
})

router.on('/content/:id/:file/editor/', function (id, file) {
  app.currentView = 'content-editor'
  app.params.contentId = (id != app.params.contentId) ? id : app.params.contentId
  app.params.currentView = 'content-editor'
  app.params.filename = file
})

router.configure({
  notfound: function () {
    router.setRoute('/dashboard')
  }
})

router.init('/dashboard')
