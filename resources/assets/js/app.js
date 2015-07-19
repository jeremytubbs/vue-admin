module.exports = {
  el: '#app',

  data: {
    currentView: '',
    params: {
      contentId: null,
      filename: null,
      files: null
    }
  },

  components: {
    'dashboard': require('./views/dashboard'),
    'content-create': require('./views/content-create'),
    'content-view': require('./views/content-view'),
    'content-settings': require('./views/content-settings')
  }
}
