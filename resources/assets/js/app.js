module.exports = {
  el: '#app',

  data: {
    currentView: '',
    params: {
      contentId: null
    }
  },

  components: {
    'dashboard': require('./views/dashboard'),
    'content-create': require('./views/content-create'),
    'content-view': require('./views/content-view')
  }
}
