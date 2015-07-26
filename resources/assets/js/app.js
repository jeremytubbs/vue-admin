module.exports = {
  el: '#app',

  data: {
    currentView: '',
    params: {
      contentId: null,
      currentView: null,
      filename: null,
      files: null,
      file: null,
    }
  },

  components: {
    'dashboard': require('./views/dashboard'),
    'content-index': require('./views/content-index'),
    'content-create': require('./views/content-create'),
    'content-show': require('./views/content-show'),
    'content-settings': require('./views/content-settings'),
    'content-editor': require('./views/content-editor')
  }
}
