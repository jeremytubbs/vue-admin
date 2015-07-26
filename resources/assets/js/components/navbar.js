module.exports = {
  template: require('./navbar.template.html'),

  props: ['params'],

  data: function () {
    return {
      params: {
        contentId: null,
        currentView: null,
        filename: null,
        files: null
      }
    }
  },
}