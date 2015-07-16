var Vue = require('vue')
var Resource = require('vue-resource')
Vue.use(Resource)
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content')
var Router = require('director').Router
var app = new Vue(require('./app.js'))
var router = new Router()

router.on('/dashboard', function () {
  app.currentView = 'dashboard'
})

router.on('/new-content', function () {
  app.currentView = 'content-create'
})

router.on('/content/:id', function (id) {
  app.currentView = 'content-view'
  app.params.contentId = id
})

router.configure({
  notfound: function () {
    router.setRoute('/dashboard')
  }
})

router.init('/dashboard')