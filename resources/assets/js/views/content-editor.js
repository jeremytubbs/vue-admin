module.exports = {
  template: require('./content-editor.template.html'),

  replace: true,

  props: ['params'],

  data: function () {
    return {
      params: {
        currentView: null,
        contentId: null,
        contents: null,
        filename: null
      }
    }
  },

  components: {
    editor: require('../components/editor')
  }

}