module.exports = {
  template: require('./content-editor.template.html'),

  replace: true,

  data: function () {
    return {
      params: {
        currentView: null,
        contentId: null,
        filename: null,
        files: null
      },
      contents: '',
    }
  }

}